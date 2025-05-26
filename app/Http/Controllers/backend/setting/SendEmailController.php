<?php

namespace App\Http\Controllers\backend\setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf; //-------------Export --------
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportData\SendmailExport;
use App\Jobs\SendEmailJob;
use ZipArchive;
use Illuminate\Support\Facades\Response; 
use Carbon\Carbon; //----------  defualt -------
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SendEmail;
use Illuminate\Support\Facades\Log;



class SendEmailController extends Controller
{
    
    /**
     * =============================================================
     * ==============================================================================================  SHOW FUNCTION START HERE ========================================================
     * =============================================================
     */
    public function index(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
            $all = SendEmail::where('status',1)->where('mail_to','LIKE',"%$search%")
           ->get();
        }else{
            $all = SendEmail::where('status',1)->get();
        }
        return view('backend.setting.sendemail.index',compact('all'));
    }


   /**
    * ---------  add page functionality --------
    **/
    public function add(){
        $totalpost  = SendEmail::get()->count();
        $latestPost = SendEmail::latest()->first();
        return view('backend.setting.sendemail.add',compact('totalpost','latestPost'));
    }


   /**
    * ---------  view page functionality --------
    **/
    public function view($id,$slug){
        $data= SendEmail::where('status',1)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('backend.setting.sendemail.view',compact('data'));
    }


   /**
    * ---------  edit page functionality --------
    **/
    public function edit($id,$slug){
        $totalpost  = SendEmail::get()->count();
        $latestPost = SendEmail::latest()->first();
        $data= SendEmail::where('status',1)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('backend.setting.sendemail.edit',compact('totalpost','latestPost','data'));
    }


   /**
     * =======================================================================
     * ==============================================================================================  CREATE FUNCTION START HERE ========================================================
     * =======================================================================
     */
   public function insert(Request $request)
    {
        

        $request->validate([
            'mail_to'=> 'required|email',
            'mail_subject'=> 'required',
            'mail_body'=> 'required',
        ],[
            'mail_to.required'=> 'Mail to is Required !',
            'mail_subject.required'=> 'Mail Subject is Required !',
            'mail_body.required'=> 'Mail Body is Required !',
            'mail_to.email'=> 'Mail to must be a valid email address!',
        ]);

        $slug = uniqid('20').Str::random(20) . '_'.mt_rand(10000, 100000).'-'.time();
        $creator = Auth::guard('admin')->user()->id;
        $attachments = [];
        // ফাইল অ্যাটাচমেন্টগুলো পাওয়া গেছে কি না চেক করো
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                    $fileName = time() . '.'.mt_rand(10000, 100000). '.'. $file->getClientOriginalExtension();
                    $file->storeAs('uploads/email/attachments', $fileName, 'public'); // storage/app/public/attachments/
                    $attachments [] = $fileName;
            }
        }
        // ফাইল অ্যাটাচমেন্টগুলো পাওয়া গেছে কি না চেক করো
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $fileName = time() . '.'.mt_rand(10000, 100000).'.'.$file->getClientOriginalExtension();
                    $file->storeAs('uploads/email/attachments', $fileName, 'public'); // storage/app/public/attachments/
                    $attachments [] = $fileName;
            }
        }

        try {
            $insert = SendEmail::create([
                'mail_to'=>$request->mail_to,
                'mail_subject'=>$request->mail_subject,
                'mail_body'=>$request->mail_body,
                'mail_attachment'=>json_encode($attachments),
                'slug'=>$slug,
                'creator_id' => $creator,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);

           

            /**-------  send email with queue ---------- */
            if($insert){
                
               $decodeattachments = json_decode($insert->mail_attachment, true);
                $data= [
                    'mail_to' => $request->mail_to,
                    'mail_subject' => $request->mail_subject,
                    'mail_body' => $request->mail_body,
                    'mail_attachments' => $decodeattachments
                ];

                Log::info('Decoded attachment array in controller:', $decodeattachments);

                $emailsend = dispatch(new SendEmailJob($data));  
                if($emailsend){
                    SendEmail::where('id',$insert->id)->where('public_status',0)->update([
                        'public_status'=>1,
                    ]);
                }
            }
            
            /**-------  send email with queue ---------- */



            if($emailsend){
                return response()->json(['status'=>'success', 'message' => 'Email sent successfully!']);
            }else{
                return response()->json(['status'=>'error', 'message' => 'Insertion failed!']);
            }
        } catch(\Exception $e) {
            return response()->json(['status'=>'error', 'message' => 'Exception: '.$e->getMessage()]);
        }
    }



   /**
     * ===========================================================
     * ==============================================================================================  UPDATE FUNCTION START HERE ========================================================
     * ===========================================================
     */
    public function update(Request $request){
        /**--- validation code -- */
        $request->validate([
            'mail_to'=> 'required',
            'mail_subject'=> 'required',
            'mail_body'=> 'required',
        ],[
            'mail_to.required'=> 'Mail to is Required !',
            'mail_subject.required'=> 'Mail Subject is Required !',
            'mail_body.required'=> 'Mail Body is Required !',
        ]
        );


    //--- get specific Credential for update record & editor id --------
    $id = $request->id;
    $slug = $request->slug;
    $editor = Auth::guard('admin')->user()->id;

    //---------category update -------//
    $update = SendEmail::where('id',$id)->where('slug',$slug)->update([
        'mail_to'=>$request->mail_to,
        'mail_subject'=>$request->mail_subject,
        'mail_body'=>$request->mail_body,
        'editor_id' => $editor,
        'updated_at' => Carbon::now()->toDateTimeString(),
    ]);
    

    // ------insert Successfully--------// 
    if($update){
        flash()->success('Information Update Successfuly');
        return redirect()->route('sendemail.view',[$id,$slug]);
    }else{
        flash()->error('Informatin Update Faild !');
    }
    return redirect()->back();

    } // update end 





   /**
     * =================================================
     * =========================================================================== SOFT,HEARD DELETE, RESTORE ,RECYCLE,ACTIVE ,DEACTIVE FUNCTION START HERE ========================================================
     * ================================================
     */
    public function softdelete($id){
        $data= SendEmail::where('id',$id)->first();
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
        $data = SendEmail::withTrashed()->where('id', $id)->first();
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
        $data = SendEmail::onlyTrashed()->where('id', $id)->first();
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
        $published = SendEmail::where('id',$id)->where('slug',$slug)->where('public_status',0)->update([
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
        $private = SendEmail::where('id',$id)->where('slug',$slug)->where('public_status',1)->update([
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
        $all = SendEmail::onlyTrashed()->get();
        return view('backend.setting.sendemail.recycle',compact('all'));
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
            SendEmail::whereIn('id', $ids)->delete();
            return response()->json(['success' => true, 'message' => 'Selected categories deleted.']);
        }
        //--- for multiple items heard delete -------//
        if ($action === 'heard_delete') {
            $categories = SendEmail::onlyTrashed()->whereIn('id', $ids)->get();
        
            foreach ($categories as $category) {
                // 4. Category force delete
                $category->forceDelete();
            }
        
            return response()->json(['success' => true, 'message' => 'Selected categories permanently deleted with SEO and images.']);
        }
        
    
        //---- for multiple items resotre --------//
        if ($action === 'restore') {
            $categories = SendEmail::onlyTrashed()->whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    $data->restore();
                }
            }
            return response()->json(['success' => true, 'message' => 'Selected categories archived.']);
        }
        //----- for multiple items active ----//
        if ($action === 'active') {
            $categories = SendEmail::whereIn('id', $ids)->get();

            if($categories){
                foreach($categories as $data){

                    SendEmail::whereIn('id',$ids)->where('public_status',0)->update([
                        'public_status'=>1,
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Refund process started.']);
        }

        //--  for multiple items deactive ----- //
        if ($action === 'deactive') {
            $categories = SendEmail::whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    SendEmail::whereIn('id',$ids)->where('public_status',1)->update([
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
        $categories = SendEmail::get();
       // return view('backend.setting.sendemail.export_pdf', compact('categories'));
        $pdf = Pdf::loadView('backend.setting.sendemail.export_pdf', compact('categories')); // get database record 
        $filename = rand(100000,100000000) . Carbon::now()->format('Y_m_d_His') . '.pdf'; // make pdf file name 
        return $pdf->download($filename); // download file 
    }

    /**
     * ---------  export single pdf functionality ------
     */
    public function export_single_pdf($id,$slug){
        $data = SendEmail::where('id',$id)->where('slug',$slug)->firstOrFail();
       // return view('backend.setting.sendemail.export_pdf', compact('categories'));
        $pdf = Pdf::loadView('backend.setting.sendemail.export_single_pdf', compact('data'));
        $filename = rand(100000,100000000) . Carbon::now()->format('Y_m_d_His') . '.pdf';
        return $pdf->download($filename);
    }


    /**
     * ---------  export Excel or xlsx file functionality ------
     */
    public function export_excel(){
        return Excel::download(new SendmailExport, 'info.xlsx');
    }

    /**
     * ---------  export csv file functionality ------
     */
    public function export_csv(){
        return Excel::download(new SendmailExport, 'info.csv');
    }

    public function export_zip()
    {
        // File paths for CSV, XLSX, and PDF
        $csvFilePath = storage_path('app/public/info.csv');
        $xlsxFilePath = storage_path('app/public/info.xlsx');
        $pdfFilePath = storage_path('app/public/info.pdf');

        // Export CSV file
        Excel::store(new SendmailExport, 'info.csv', 'public');
        
        // Export XLSX file
        Excel::store(new SendmailExport, 'info.xlsx', 'public');
        
        // Export PDF file
        $pdf = Pdf::loadView('backend.setting.sendemail.export_pdf', ['categories' => SendEmail::all()]);
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
