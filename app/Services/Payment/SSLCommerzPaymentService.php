<?php 

namespace App\Services\Payment;
use App\Services\Payment\PaymentInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payment;
use App\Models\CourseEnroment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; //----------  defualt -------
use Illuminate\Support\Str;


class SSLCommerzPaymentService implements  PaymentInterface 
{

    public function createPaymentIntent($amount){
         return null;
    }

    public function makePayment(array $data){
       // dd($data); // এখানেই দেখো কন্ট্রোলার থেকে ঠিক কী পাঠানো হচ্ছে
      
        $post_data = [];
        $post_data['store_id'] =config('payment.gateways.sslcommerz.store_id');
        $post_data['store_passwd'] = config('payment.gateways.sslcommerz.store_password');
        $post_data['total_amount'] = $data['amount'];
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $data['tran_id']; // unique transaction id

        // Success, Fail, Cancel URLs
        $post_data['success_url'] = $data['success_url'];
        $post_data['fail_url'] = $data['fail_url'];
        $post_data['cancel_url'] = $data['cancel_url'];

        // Customer information
        $post_data['cus_name'] = $data['customer_name'];
        $post_data['cus_email'] = $data['email'];
        $post_data['cus_phone'] = $data['phone'];
        $post_data['cus_add1'] = $data['division'] ?? 'Dhaka'; // ✅ add this line (required)
        $post_data['cus_city'] = $data['city'] ?? 'Dhaka';
        $post_data['cus_country'] = $data['country'] ?? 'Bangladesh';

        
        // Shipping info (SSLCommerz requires this)
        $post_data['shipping_method'] = 'NO'; // ✅ Either: NO / YES / Courier / Truck / etc.
        $post_data['product_name'] = $data['product_name'] ?? 'Online Course'; // ✅ Required
        $post_data['product_category'] = $data['product_category'] ?? 'Education'; // ✅ Required
        $post_data['product_profile'] = $data['product_profile'] ?? 'non-physical-goods'; // ✅ Require

        // Hit the SSLCommerz API
        $url = "https://sandbox.sslcommerz.com/gwprocess/v4/api.php"; // live হলে URL পরিবর্তন করুন
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($post_data));
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec($handle);
        $response = json_decode($content, true);
 
    //$response = json_decode($content, true);
    // dd($response); // এটাতে সম্পূর্ণ SSLCommerz API response দেখতে পারবেন

        if (isset($response['GatewayPageURL']) && $response['GatewayPageURL'] != "") {
            return redirect($response['GatewayPageURL']);
        } else {
            return response()->json(['error' => 'Payment gateway error.']);
        }


    }



public function handleWebhook(Request $request)
{
    $tran_id = $request->input('tran_id');
    $status  = strtoupper($request->input('status'));

    if (!$tran_id) {
        return false;
    }

    $payment = Payment::where('tran_id', $tran_id)->first();

    if (!$payment) {
        return false;
    }

    if (in_array($payment->payment_status, ['success', 'failed', 'cancelled'])) {
        return true;
    }

    if ($status === 'VALID' || $status === 'SUCCESS') {

         $slug = uniqid('20').Str::random(20) . '_'.mt_rand(10000, 100000).'-'.time();


        try{
        // Signature Validation
            if (!$this->isValidSignature($request)) {
                Log::warning("Invalid Signature from SSLCommerz", $request->all());
                return response()->json(['error' => 'Invalid signature.'], 403);
            }

        DB::beginTransaction();

        $payment->update([
            'val_id'        => $request->input('val_id'),
            'store_amount'  => $request->input('store_amount'),
            'currency'      => $request->input('currency'),
            'payment_status'=> 'VALID',
            'payment_gateway'  => 'SSLCommerz',

            // These should be actual values if available
            'payment_id'             => null,
            'payment_date'           => Carbon::now()->toDateTimeString(),
            'payment_mode'           => 'Online',

            // Card / bank info
            'card_type'              => $request->input('card_type') ?? null,
            'card_brand'             => $request->input('card_brand') ?? null,
            'card_issuer'            => $request->input('card_issuer') ?? null,
            'card_no'                => $request->input('card_number') ?? null,
            'bank_tran_id'           => $request->input('bank_tran_id') ?? null,
            'verify_sign'            => $request->input('verify_sign') ?? null,
            'verify_sign_sha2'       => $request->input('verify_sign_sha2') ?? null,
            'verify_key'             => $request->input('verify_key') ?? null,
            'risk_title'             => $request->input('risk_title') ?? null,
            'risk_level'             => $request->input('risk_level') ?? null,

            // Refund Info: set later if refunded, not immediately
            'is_refunded'            => false,
            'refunded_amount'        => null,
            'refund_date'            => null, // OR $response['tran_date'],

            // Metadata
            'ip_address'             => request()->ip(),
            'user_agent'             =>  request()->userAgent(),
            'payload'       => json_encode($request->all()),
        ]);
        //  ---- payment data end 

        CourseEnroment::create([
             'user_id'  =>$payment->user_id,
             'course_id'  =>$payment->course_id,
             'enrolled_at'  =>Carbon::now()->toDateTimeString(),
             'enrollment_type'  =>'paid',
             'payment_id'  =>$payment->id,
             'slug'  =>$slug,
        ]);


          DB::commit();

        }catch(\Exception $e){
            DB::rollBack();

            return response()->json(['error' => 'Payment failed, please contact support.'], 500);

        }



    } elseif ($status === 'FAILED') {
        $payment->update([
            'payment_status' => 'FAILED',
            'payload'        => json_encode($request->all()),
        ]);
    } elseif ($status === 'CANCELLED') {
        $payment->update([
            'payment_status' => 'CANCELLED',
            'payload'        => json_encode($request->all()),
        ]);
    } else {
        $payment->update([
            'payment_status' => 'PENDING',
            'payload'        => json_encode($request->all()),
        ]);
    }

    return true;
}



// --- signature verification -------

    private function isValidSignature(Request $request)
    {
        //------ get the webhook request from sslcomerze 
        $input = $request->all();

        //---- get the store password and make hash 
        $store_password_plain = config('payment.gateways.sslcommerz.store_password');
        $store_password_hashed = md5($store_password_plain);

        // Remove unnecessary keys from input
        unset($input['verify_sign'], $input['verify_sign_sha2']);

        // Sort the parameters
        ksort($input);

        // -- 
        $query = "";

        // --- get the actual value 
        foreach ($input as $key => $value) {
            if ($key != "verify_sign" && $key != "verify_sign_sha2") {
                $query .= "$key=$value&";
            }
        }

        // ---- append hash password with final verify key 
        $query .= "store_passwd=$store_password_hashed";

        // Hash the final string
        $generated_verify_sign = md5($query);
        $generated_sha2 = hash('sha256', $query);

        if ($generated_verify_sign === $request->input('verify_sign') || $generated_sha2 === $request->input('verify_sign_sha2')) {
            return true;
            Log::info('payment varification successfuly');
        } else {
            return "Verification Failed";  
        }
    }




}



