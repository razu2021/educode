<?php

namespace App\Http\Controllers\backend\setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\File; 
use Barryvdh\DomPDF\Facade\Pdf; //-------------Export --------
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportData\EmbedMapExport;
use ZipArchive;
use Illuminate\Support\Facades\Response; 
use Carbon\Carbon; //----------  defualt -------
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EmbedMap;

class EmbedGooglemapController extends Controller
{

/**
     * =============================================================
     * ==============================================================================================  SHOW FUNCTION START HERE ========================================================
     * =============================================================
     */
    public function index(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
            $all = EmbedMap::where('status',1)->where('address_line1','LIKE',"%$search%")
            ->orWhere('city','LIKE',"%$search%")->get();
        }else{
            $all = EmbedMap::where('status',1)->get();
        }
        return view('backend.setting.embedmap.index',compact('all'));
    }


   /**
    * ---------  add page functionality --------
    **/
    public function add(){
        $totalpost  = EmbedMap::get()->count();
        $latestPost = EmbedMap::latest()->first();
        return view('backend.setting.embedmap.add',compact('totalpost','latestPost'));
    }


   /**
    * ---------  view page functionality --------
    **/
    public function view($id,$slug){
        $data= EmbedMap::where('status',1)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('backend.setting.embedmap.view',compact('data'));
    }


   /**
    * ---------  edit page functionality --------
    **/
    public function edit($id,$slug){
        $totalpost  = EmbedMap::get()->count();
        $latestPost = EmbedMap::latest()->first();
        $data= EmbedMap::where('status',1)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('backend.setting.embedmap.edit',compact('totalpost','latestPost','data'));
    }


   /**
     * =======================================================================
     * ==============================================================================================  CREATE FUNCTION START HERE ========================================================
     * =======================================================================
     */
    public function insert(Request $request){
      

        // ------  create a slug & get creator id -------
        $slug = uniqid('20').Str::random(20) . '_'.mt_rand(10000, 100000).'-'.time();;
        $creator = Auth::guard('admin')->user()->id;

       

        //-------  insert category record --------
        $insert = EmbedMap::create([
            'address_line1'=>$request->address_line1,
            'address_line2'=>$request->address_line2,
            'city'=>$request->city,
            'state'=>$request->state,
            'postal_code'=>$request->postal_code,
            'country'=>$request->country,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'static_map'=>$request->static_map,
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
    //--- get specific Credential for update record & editor id --------
    $id = $request->id;
    $slug = $request->slug;
    $editor = Auth::guard('admin')->user()->id;

    //---------category update -------//
    $update = EmbedMap::where('id',$id)->where('slug',$slug)->update([
        'address_line1'=>$request->address_line1,
        'address_line2'=>$request->address_line2,
        'city'=>$request->city,
        'state'=>$request->state,
        'postal_code'=>$request->postal_code,
        'country'=>$request->country,
        'latitude'=>$request->latitude,
        'longitude'=>$request->longitude,
        'static_map'=>$request->static_map,
        'editor_id' => $editor,
        'updated_at' => Carbon::now()->toDateTimeString(),
    ]);
    

    // ------insert Successfully--------// 
    if($update){
        flash()->success('Information Update Successfuly');
        return redirect()->route('embedmap.view',[$id,$slug]);
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
        $data= EmbedMap::where('id',$id)->first();
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
        $data = EmbedMap::withTrashed()->where('id', $id)->first();
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
        $data = EmbedMap::onlyTrashed()->where('id', $id)->first();
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
        $published = EmbedMap::where('id',$id)->where('slug',$slug)->where('public_status',0)->update([
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
        $private = EmbedMap::where('id',$id)->where('slug',$slug)->where('public_status',1)->update([
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
        $all = EmbedMap::onlyTrashed()->get();
        return view('backend.setting.embedmap.recycle',compact('all'));
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
            EmbedMap::whereIn('id', $ids)->delete();
            return response()->json(['success' => true, 'message' => 'Selected categories deleted.']);
        }
        //--- for multiple items heard delete -------//
        if ($action === 'heard_delete') {
            $categories = EmbedMap::onlyTrashed()->whereIn('id', $ids)->get();
        
            foreach ($categories as $category) {
                // 4. Category force delete
                $category->forceDelete();
            }
        
            return response()->json(['success' => true, 'message' => 'Selected categories permanently deleted with SEO and images.']);
        }
        
    
        //---- for multiple items resotre --------//
        if ($action === 'restore') {
            $categories = EmbedMap::onlyTrashed()->whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    $data->restore();
                }
            }
            return response()->json(['success' => true, 'message' => 'Selected categories archived.']);
        }
        //----- for multiple items active ----//
        if ($action === 'active') {
            $categories = EmbedMap::whereIn('id', $ids)->get();

            if($categories){
                foreach($categories as $data){

                    EmbedMap::whereIn('id',$ids)->where('public_status',0)->update([
                        'public_status'=>1,
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Refund process started.']);
        }

        //--  for multiple items deactive ----- //
        if ($action === 'deactive') {
            $categories = EmbedMap::whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    EmbedMap::whereIn('id',$ids)->where('public_status',1)->update([
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
        $categories = EmbedMap::get();
       // return view('backend.setting.embedmap.export_pdf', compact('categories'));
        $pdf = Pdf::loadView('backend.setting.embedmap.export_pdf', compact('categories')); // get database record 
        $filename = rand(100000,100000000) . Carbon::now()->format('Y_m_d_His') . '.pdf'; // make pdf file name 
        return $pdf->download($filename); // download file 
    }

    /**
     * ---------  export single pdf functionality ------
     */
    public function export_single_pdf($id,$slug){
        $data = EmbedMap::where('id',$id)->where('slug',$slug)->firstOrFail();
       // return view('backend.setting.embedmap.export_pdf', compact('categories'));
        $pdf = Pdf::loadView('backend.setting.embedmap.export_single_pdf', compact('data'));
        $filename = rand(100000,100000000) . Carbon::now()->format('Y_m_d_His') . '.pdf';
        return $pdf->download($filename);
    }


    /**
     * ---------  export Excel or xlsx file functionality ------
     */
    public function export_excel(){
        return Excel::download(new EmbedMapExport, 'info.xlsx');
    }

    /**
     * ---------  export csv file functionality ------
     */
    public function export_csv(){
        return Excel::download(new EmbedMapExport, 'info.csv');
    }

    public function export_zip()
    {
        // File paths for CSV, XLSX, and PDF
        $csvFilePath = storage_path('app/public/info.csv');
        $xlsxFilePath = storage_path('app/public/info.xlsx');
        $pdfFilePath = storage_path('app/public/info.pdf');

        // Export CSV file
        Excel::store(new EmbedMapExport, 'info.csv', 'public');
        
        // Export XLSX file
        Excel::store(new EmbedMapExport, 'info.xlsx', 'public');
        
        // Export PDF file
        $pdf = Pdf::loadView('backend.setting.embedmap.export_pdf', ['categories' => EmbedMap::all()]);
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




    //
}
