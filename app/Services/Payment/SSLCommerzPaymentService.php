<?php 

namespace App\Services\Payment;
use App\Services\Payment\PaymentInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payment;


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
        $post_data['cus_add1'] = $data['address'] ?? 'Dhaka'; // ✅ add this line (required)
        $post_data['cus_city'] = 'Dhaka';
        $post_data['cus_country'] = 'Bangladesh';

        
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

//         $response = json_decode($content, true);
// dd($response); // এটাতে সম্পূর্ণ SSLCommerz API response দেখতে পারবেন

        if (isset($response['GatewayPageURL']) && $response['GatewayPageURL'] != "") {
            return redirect($response['GatewayPageURL']);
        } else {
            return response()->json(['error' => 'Payment gateway error.']);
        }


    }



public function handleWebhook(Request $request)
{
    Log::info('SSLCommerz IPN Data:', $request->all());

    $tran_id = $request->input('tran_id');
    $status  = strtoupper($request->input('status'));

    if (!$tran_id) {
        Log::warning('No tran_id in IPN');
        return false;
    }

    $payment = Payment::where('tran_id', $tran_id)->first();

    if (!$payment) {
        Log::warning("Payment not found for tran_id: $tran_id");
        return false;
    }

    if (in_array($payment->payment_status, ['success', 'failed', 'cancelled'])) {
        Log::info('Already processed payment for tran_id: ' . $tran_id);
        return true;
    }

    if ($status === 'VALID' || $status === 'SUCCESS') {
        $payment->update([
            'val_id'        => $request->input('val_id'),
            'store_amount'  => $request->input('store_amount'),
            'currency'      => $request->input('currency'),
            'payment_status'=> 'VALID',
            'status'        => 1,
            'payload'       => json_encode($request->all()),
        ]);
    } elseif ($status === 'FAILED') {
        $payment->update([
            'payment_status' => 'FAILED',
            'status'         => 0,
            'payload'        => json_encode($request->all()),
        ]);
    } elseif ($status === 'CANCELLED') {
        $payment->update([
            'payment_status' => 'CANCELLED',
            'status'         => 0,
            'payload'        => json_encode($request->all()),
        ]);
    } else {
        $payment->update([
            'payment_status' => 'PENDING',
            'status'         => 0,
            'payload'        => json_encode($request->all()),
        ]);
    }

    return true;
}














}



