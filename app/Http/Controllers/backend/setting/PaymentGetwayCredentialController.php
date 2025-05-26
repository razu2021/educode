<?php

namespace App\Http\Controllers\backend\setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\File; 
use Barryvdh\DomPDF\Facade\Pdf; //-------------Export --------
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportData\PaymentGetwaycredentialExport;
use ZipArchive;
use Illuminate\Support\Facades\Response; 
use Carbon\Carbon; //----------  defualt -------
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PaymentGateway;

class PaymentGetwayCredentialController extends Controller
{

/**
     * =============================================================
     * ==============================================================================================  SHOW FUNCTION START HERE ========================================================
     * =============================================================
     */
    public function index(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
            $all = PaymentGateway::where('status',1)->where('address','LIKE',"%$search%")
           ->get();
        }else{
            $all = PaymentGateway::where('status',1)->get();
        }
        return view('backend.setting.pgcredential.index',compact('all'));
    }


   /**
    * ---------  add page functionality --------
    **/
    public function add(){
        $totalpost  = PaymentGateway::get()->count();
        $latestPost = PaymentGateway::latest()->first();
        return view('backend.setting.pgcredential.add',compact('totalpost','latestPost'));
    }


   /**
    * ---------  view page functionality --------
    **/
    public function view($id,$slug){
        $data= PaymentGateway::where('status',1)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('backend.setting.pgcredential.view',compact('data'));
    }


   /**
    * ---------  edit page functionality --------
    **/
    public function edit($id,$slug){
        $totalpost  = PaymentGateway::get()->count();
        $latestPost = PaymentGateway::latest()->first();
        $data= PaymentGateway::where('status',1)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('backend.setting.pgcredential.edit',compact('totalpost','latestPost','data'));
    }


   /**
     * =======================================================================
     * ==============================================================================================  CREATE FUNCTION START HERE ========================================================
     * =======================================================================
     */
    public function insert(Request $request){
        /**--- validation code -- */
        $request->validate([
                'gateway_type'=> 'required',
                'gateway_name'=> 'required',
               
            ],[
               
                'gateway_type.required'=> ' Geteway type is Required !',
                'gateway_name.required'=> ' Gateway Name is Required !',
            ]
        );

        // ------  create a slug & get creator id -------
        $slug = uniqid('20').Str::random(20) . '_'.mt_rand(10000, 100000).'-'.time();;
        $creator = Auth::guard('admin')->user()->id;

       

        //-------  insert category record --------
        $insert = PaymentGateway::create([
            'gateway_type'=>$request->gateway_type,
            'gateway_name'=>$request->gateway_name,
            'api_key'=>$request->api_key,
            'api_secret'=>$request->api_secret,
            'client_id'=>$request->client_id,
            'client_secret'=>$request->client_secret,
            'webhook_secret'=>$request->webhook_secret,
            'merchant_id'=>$request->merchant_id,
            'merchant_id'=>$request->merchant_id,
            'username'=>$request->username,
            'password'=>$request->password,
            'store_id'=>$request->store_id,
            'store_password'=>$request->store_password,
            'access_token'=>$request->access_token,
            'slug'=>$slug,
            'creator_id' => $creator,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        // insert Successfully 
        if($insert){
            flash()->success('Information Added Successfuly');
        }else{
            flash()->error('Informatin Added Faild !');
        }
        return redirect()->back();
    }


   /**
     * ===========================================================
     * ==============================================================================================  UPDATE FUNCTION START HERE ========================================================
     * ===========================================================
     */
    public function update(Request $request){
        /**--- validation code -- */
        $request->validate([
            'gateway_type'=> 'required',
            'gateway_name'=> 'required',
           
        ],[
           
            'gateway_type.required'=> ' Geteway type is Required !',
            'gateway_name.required'=> ' Gateway Name is Required !',
        ]
    );


    //--- get specific Credential for update record & editor id --------
    $id = $request->id;
    $slug = $request->slug;
    $editor = Auth::guard('admin')->user()->id;

    //---------category update -------//
    $update = PaymentGateway::where('id',$id)->where('slug',$slug)->update([
        'gateway_type'=>$request->gateway_type,
        'gateway_name'=>$request->gateway_name,
        'api_key'=>$request->api_key,
        'api_secret'=>$request->api_secret,
        'client_id'=>$request->client_id,
        'client_secret'=>$request->client_secret,
        'webhook_secret'=>$request->webhook_secret,
        'merchant_id'=>$request->merchant_id,
        'merchant_id'=>$request->merchant_id,
        'username'=>$request->username,
        'password'=>$request->password,
        'store_id'=>$request->store_id,
        'store_password'=>$request->store_password,
        'access_token'=>$request->access_token,
        'editor_id' => $editor,
        'updated_at' => Carbon::now()->toDateTimeString(),
    ]);
    

    // ------insert Successfully--------// 
    if($update){
        flash()->success('Information Update Successfuly');
        return redirect()->route('pgcredential.view',[$id,$slug]);
    }else{
        flash()->error('Informatin Update Faild !');
    }
    return redirect()->back();

    } // update end 





   /**
     * =================================================
     * =========================================================================== SOFT,HEARD DELETE, RESTORE ,RECYCLE,ACTIVE ,DEACTIVE FUNCTION START HERE ========================================================
     * =================================================
     */
    public function softdelete($id){
        $data= PaymentGateway::where('id',$id)->first();
        $data->delete();
        // ----Delete Successfully ----//
        if($data){
            flash()->success('Information Delete Successfuly');
        }else{
            flash()->error('Informatin Delete Faild !');
        }
        return redirect()->back();
    }

   /**
    * ---------  restore  page functionality --------
    **/
    public function restore($id){
        $data = PaymentGateway::withTrashed()->where('id', $id)->first();
        $data->restore();
        // Delete Successfully 
        if($data){
            flash()->success('Information Restore Successfuly');
        }else{
            flash()->error('Informatin Restore Faild !');
        }
        return redirect()->back();
    }


   /**
    * ---------  Heard Delete  functionality --------
    **/
    public function delete($id){
        $data = PaymentGateway::onlyTrashed()->where('id', $id)->first();
        if($data) {
            $data->forceDelete();
        flash()->success('Record Deleted Successfully');
        } else {
            flash()->error('Delete Record Failed!');
        }
        return redirect()->back();
    }
    


   /**
    * ---------  Published post  functionality --------//
    **/
    public function public_status($id,$slug){
        $published = PaymentGateway::where('id',$id)->where('slug',$slug)->where('public_status',0)->update([
            'public_status'=>1,
        ]);
        // Delete Successfully 
        if($published){
            flash()->success('Information Published Successfully !');
        }else{
            flash()->error('Informatin Published Faild !');
        }
        return redirect()->back();
    }


   /**
    * ---------  Private post  functionality --------//
    **/
    public function private_status($id,$slug){
        $private = PaymentGateway::where('id',$id)->where('slug',$slug)->where('public_status',1)->update([
            'public_status'=>0,
        ]);
        // Delete Successfully 
        if($private){
            flash()->success('Information Private Successfully !');
        }else{
            flash()->error('Informatin Private Faild !');
        }
        return redirect()->back();
    }



   /**
    * ---------  Recycle  page functionality --------//
    **/
    public function recycle(){
        $all = PaymentGateway::onlyTrashed()->get();
        return view('backend.setting.pgcredential.recycle',compact('all'));
    }





   /**
     * =====================================================
     * ==============================================================================================  BULK ACTION FUNCTION START HERE ========================================================
     * =====================================================
     */

    public function bulkAction(Request $request)
    {
        //----- get multiple items id or bulk record -----//
        $ids = $request->input('ids', []);
        $action = $request->input('action');
    
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No IDs selected.']);
        }
    
        //----- for multiple items soft delete ----//
        if ($action === 'delete') {
            PaymentGateway::whereIn('id', $ids)->delete();
            return response()->json(['success' => true, 'message' => 'Selected categories deleted.']);
        }
        //--- for multiple items heard delete -------//
        if ($action === 'heard_delete') {
            $categories = PaymentGateway::onlyTrashed()->whereIn('id', $ids)->get();
        
            foreach ($categories as $category) {
                // 4. Category force delete
                $category->forceDelete();
            }
        
            return response()->json(['success' => true, 'message' => 'Selected categories permanently deleted with SEO and images.']);
        }
        
    
        //---- for multiple items resotre --------//
        if ($action === 'restore') {
            $categories = PaymentGateway::onlyTrashed()->whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    $data->restore();
                }
            }
            return response()->json(['success' => true, 'message' => 'Selected categories archived.']);
        }
        //----- for multiple items active ----//
        if ($action === 'active') {
            $categories = PaymentGateway::whereIn('id', $ids)->get();

            if($categories){
                foreach($categories as $data){

                    PaymentGateway::whereIn('id',$ids)->where('public_status',0)->update([
                        'public_status'=>1,
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Refund process started.']);
        }

        //--  for multiple items deactive ----- //
        if ($action === 'deactive') {
            $categories = PaymentGateway::whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    PaymentGateway::whereIn('id',$ids)->where('public_status',1)->update([
                        'public_status'=>0,
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Refund process started.']);
        }
        return response()->json(['success' => false, 'message' => 'Invalid action.']);
    } // bulk action end here 
    


    /**
     * ==========================================================
     * ==============================================================================================  EXPORT FUNCTION START HERE ========================================================
     * ===========================================================
     */

    public function export_pdf(){
        $categories = PaymentGateway::get();
       // return view('backend.setting.pgcredential.export_pdf', compact('categories'));
        $pdf = Pdf::loadView('backend.setting.pgcredential.export_pdf', compact('categories')); // get database record 
        $filename = rand(100000,100000000) . Carbon::now()->format('Y_m_d_His') . '.pdf'; // make pdf file name 
        return $pdf->download($filename); // download file 
    }

    /**
     * ---------  export single pdf functionality ------
     */
    public function export_single_pdf($id,$slug){
        $data = PaymentGateway::where('id',$id)->where('slug',$slug)->firstOrFail();
       // return view('backend.setting.pgcredential.export_pdf', compact('categories'));
        $pdf = Pdf::loadView('backend.setting.pgcredential.export_single_pdf', compact('data'));
        $filename = rand(100000,100000000) . Carbon::now()->format('Y_m_d_His') . '.pdf';
        return $pdf->download($filename);
    }


    /**
     * ---------  export Excel or xlsx file functionality ------
     */
    public function export_excel(){
        return Excel::download(new PaymentGetwaycredentialExport, 'info.xlsx');
    }

    /**
     * ---------  export csv file functionality ------
     */
    public function export_csv(){
        return Excel::download(new PaymentGetwaycredentialExport, 'info.csv');
    }

    public function export_zip()
    {
        // File paths for CSV, XLSX, and PDF
        $csvFilePath = storage_path('app/public/info.csv');
        $xlsxFilePath = storage_path('app/public/info.xlsx');
        $pdfFilePath = storage_path('app/public/info.pdf');

        // Export CSV file
        Excel::store(new PaymentGetwaycredentialExport, 'info.csv', 'public');
        
        // Export XLSX file
        Excel::store(new PaymentGetwaycredentialExport, 'info.xlsx', 'public');
        
        // Export PDF file
        $pdf = Pdf::loadView('backend.setting.pgcredential.export_pdf', ['categories' => PaymentGateway::all()]);
        $pdf->save($pdfFilePath);

        // Create a zip file
        $zip = new ZipArchive;
        $zipFilePath = storage_path('app/public/information.zip');
        
        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            $zip->addFile($csvFilePath, 'info.csv');
            $zip->addFile($xlsxFilePath, 'info.xlsx');
            $zip->addFile($pdfFilePath, 'info.pdf');
            $zip->close();
        }

        // Return the zip file for download
       $response = Response::download($zipFilePath)->deleteFileAfterSend(true);

            // Manually delete the CSV, XLSX, and PDF files after the zip file is downloaded
            unlink($csvFilePath);
            unlink($xlsxFilePath);
            unlink($pdfFilePath);
            return $response;
    } // export zip end here 




}
