<?php

namespace App\Http\Controllers\backend\setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Barryvdh\DomPDF\Facade\Pdf; //-------------Export --------
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportData\PreLoaderExport;
use ZipArchive;
use Illuminate\Support\Facades\Response; 
use Carbon\Carbon; //----------  defualt -------
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Preloader;
use Illuminate\Validation\Rules\Exists;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PreloaderController extends Controller
{
    /**
     * =============================================================
     * ==============================================================================================  SHOW FUNCTION START HERE ========================================================
     * =============================================================
     */
    public function index(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
            $all = Preloader::where('status',1)->where('custom_css','LIKE',"%$search%")
           ->get();
        }else{
            $all = Preloader::where('status',1)->get();
        }
        return view('backend.setting.preloader.index',compact('all'));
    }


   /**
    * ---------  add page functionality --------
    **/
    public function add(){
        $totalpost  = Preloader::get()->count();
        $latestPost = Preloader::latest()->first();
        return view('backend.setting.preloader.add',compact('totalpost','latestPost'));
    }


   /**
    * ---------  view page functionality --------
    **/
    public function view($id,$slug){
        $data= Preloader::where('status',1)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('backend.setting.preloader.view',compact('data'));
    }


   /**
    * ---------  edit page functionality --------
    **/
    public function edit($id,$slug){
        $totalpost  = Preloader::get()->count();
        $latestPost = Preloader::latest()->first();
        $data= Preloader::where('status',1)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('backend.setting.preloader.edit',compact('totalpost','latestPost','data'));
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
        $insert = Preloader::create([
            'text'=>$request->text,
            'slug'=>$slug,
            'creator_id' => $creator,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        /**  ------- upload image using image intervention -------- use image top */
        if($request->hasFile('images')){
            $file = $request->file('images'); // get actual image 
            $imageName= time().'_'.rand(10000,100000).'.webp'; // make image name with webp extension
            $manager= new ImageManager(new Driver()); // image driver use 
            $realPath = 'uploads/website/preloader/';  // make real path for store name in database
            $fullPath = $realPath.$imageName; // make full path realpath and imagename 
            $publicPath =  public_path($realPath); // hard file save directory 
            if (!File::exists($publicPath)) {
                File::makeDirectory($publicPath, 0755, true);  // create a directory if the  directory not exist 
            }
            /** image manupulate  */
            $image = $manager->read($file)
            ->scaleDown(1000)
            ->cover(100, 100)
            ->toWebp(90)
            ->save($publicPath . $imageName);

            /**-- save image name in database */
            Preloader::where('id',$insert->id)->update([
                'image'=>  $fullPath,
            ]);

        }
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
    $update = Preloader::where('id',$id)->where('slug',$slug)->update([
        'text'=>$request->text,
        'editor_id' => $editor,
        'updated_at' => Carbon::now()->toDateTimeString(),
    ]);
    

    /**  ------- upload image using image intervention -------- use image top */
    if($request->hasFile('images')){
        $file = $request->file('images'); // get actual image 
        $imageName= time().'_'.rand(10000,100000).'.webp'; // make image name with webp extension
        $manager= new ImageManager(new Driver()); // image driver use 
        $realPath = 'uploads/website/preloader/';  // make real path for store name in database
        $fullPath = $realPath.$imageName; // make full path realpath and imagename 
        $publicPath =  public_path($realPath); // hard file save directory 
        if (!File::exists($publicPath)) {
            File::makeDirectory($publicPath, 0755, true);  // create a directory if the  directory not exist 
        }
        /** image manupulate  */
        $image = $manager->read($file)
        ->scaleDown(1000)
        ->cover(100, 100)
        ->toWebp(90)
        ->save($publicPath . $imageName);


        /** --- Delete old image from directories ------  */
        $old_path = Preloader::where('id', $id)->first();
        $file_paths = public_path($old_path->image);

        if (file_exists($file_paths)) {
            File::delete($file_paths);
            flash()->success('Old File Deleted Successfully!');
        }
        /** --- Delete old image from directories ------ END --- */

        /**-- save image name in database */
        Preloader::where('id',$id)->where('slug',$slug)->update([
            'image'=>  $fullPath,
        ]);

    }

    // ------insert Successfully--------// 
    if($update){
        flash()->success('Information Update Successfuly');
        return redirect()->route('preloader.view',[$id,$slug]);
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
        $data= Preloader::where('id',$id)->first();
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
        $data = Preloader::withTrashed()->where('id', $id)->first();
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
        $data = Preloader::onlyTrashed()->where('id', $id)->first();
        if($data) {

        /** --- Delete old image from directories ------  */
        $file_paths = public_path($data->image);
        if (file_exists($file_paths)) {
            File::delete($file_paths);
        }
        /** --- Delete old image from directories ------ END --- */


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
        $published = Preloader::where('id',$id)->where('slug',$slug)->where('public_status',0)->update([
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
        $private = Preloader::where('id',$id)->where('slug',$slug)->where('public_status',1)->update([
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
        $all = Preloader::onlyTrashed()->get();
        return view('backend.setting.preloader.recycle',compact('all'));
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
            Preloader::whereIn('id', $ids)->delete();
            return response()->json(['success' => true, 'message' => 'Selected categories deleted.']);
        }
        //--- for multiple items heard delete -------//
        if ($action === 'heard_delete') {
            $categories = Preloader::onlyTrashed()->whereIn('id', $ids)->get();
        
            foreach ($categories as $category) {

                /** --- Delete old image from directories ------  */
                $file_paths = public_path($category->image);
                if (file_exists($file_paths)) {
                    File::delete($file_paths);
                }
                
                /** --- Delete old image from directories ------ END --- */


                // 4. Category force delete
                $category->forceDelete();
            }
        
            return response()->json(['success' => true, 'message' => 'Selected categories permanently deleted with SEO and images.']);
        }
        
    
        //---- for multiple items resotre --------//
        if ($action === 'restore') {
            $categories = Preloader::onlyTrashed()->whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    $data->restore();
                }
            }
            return response()->json(['success' => true, 'message' => 'Selected categories archived.']);
        }
        //----- for multiple items active ----//
        if ($action === 'active') {
            $categories = Preloader::whereIn('id', $ids)->get();

            if($categories){
                foreach($categories as $data){

                    Preloader::whereIn('id',$ids)->where('public_status',0)->update([
                        'public_status'=>1,
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Refund process started.']);
        }

        //--  for multiple items deactive ----- //
        if ($action === 'deactive') {
            $categories = Preloader::whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    Preloader::whereIn('id',$ids)->where('public_status',1)->update([
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
        $categories = Preloader::get();
       // return view('backend.setting.preloader.export_pdf', compact('categories'));
        $pdf = Pdf::loadView('backend.setting.preloader.export_pdf', compact('categories')); // get database record 
        $filename = rand(100000,100000000) . Carbon::now()->format('Y_m_d_His') . '.pdf'; // make pdf file name 
        return $pdf->download($filename); // download file 
    }

    /**
     * ---------  export single pdf functionality ------
     */
    public function export_single_pdf($id,$slug){
        $data = Preloader::where('id',$id)->where('slug',$slug)->firstOrFail();
       // return view('backend.setting.preloader.export_pdf', compact('categories'));
        $pdf = Pdf::loadView('backend.setting.preloader.export_single_pdf', compact('data'));
        $filename = rand(100000,100000000) . Carbon::now()->format('Y_m_d_His') . '.pdf';
        return $pdf->download($filename);
    }


    /**
     * ---------  export Excel or xlsx file functionality ------
     */
    public function export_excel(){
        return Excel::download(new PreLoaderExport, 'info.xlsx');
    }

    /**
     * ---------  export csv file functionality ------
     */
    public function export_csv(){
        return Excel::download(new PreLoaderExport, 'info.csv');
    }

    public function export_zip()
    {
        // File paths for CSV, XLSX, and PDF
        $csvFilePath = storage_path('app/public/info.csv');
        $xlsxFilePath = storage_path('app/public/info.xlsx');
        $pdfFilePath = storage_path('app/public/info.pdf');

        // Export CSV file
        Excel::store(new PreLoaderExport, 'info.csv', 'public');
        
        // Export XLSX file
        Excel::store(new PreLoaderExport, 'info.xlsx', 'public');
        
        // Export PDF file
        $pdf = Pdf::loadView('backend.setting.preloader.export_pdf', ['categories' => Preloader::all()]);
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
