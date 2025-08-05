<?php

namespace App\Http\Controllers\frontend\home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\File; 
use Barryvdh\DomPDF\Facade\Pdf; //-------------Export --------
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportData\BanneExport;
use ZipArchive;
use Illuminate\Support\Facades\Response; 
use Carbon\Carbon; //----------  defualt -------
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\homebanner;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File; 


class BannerController extends Controller
{
    
    /**
     * =============================================================
     * ==============================================================================================  SHOW FUNCTION START HERE ========================================================
     * =============================================================
     */
    public function index(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
            $all = homebanner::where('status',1)->where('banner_title','LIKE',"%$search%")
           ->get();
        }else{
            $all = homebanner::where('status',1)->get();
        }
        return view('backend.frontend.banner.index',compact('all'));
    }


   /**
    * ---------  add page functionality --------
    **/
    public function add(){
        $totalpost  = homebanner::get()->count();
        $latestPost = homebanner::latest()->first();
        return view('backend.frontend.banner.add',compact('totalpost','latestPost'));
    }


   /**
    * ---------  view page functionality --------
    **/
    public function view($id,$slug){
        $data= homebanner::where('status',1)->where('id',$id)->where('slug',$slug)->firstOrFail();
        
        return view('backend.frontend.banner.view',compact('data'));
    }


   /**
    * ---------  edit page functionality --------
    **/
    public function edit($id,$slug){
        $totalpost  = homebanner::get()->count();
        $latestPost = homebanner::latest()->first();
        $data= homebanner::where('status',1)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('backend.frontend.banner.edit',compact('totalpost','latestPost','data'));
    }


   /**
     * =======================================================================
     * ==============================================================================================  CREATE FUNCTION START HERE ========================================================
     * =======================================================================
     */
    public function insert(Request $request){
        /**--- validation code -- */
       
        // ------  create a slug & get creator id -------
        $slug = uniqid('20').Str::random(20) . '_'.mt_rand(10000, 100000).'-'.time();;
        $creator = Auth::guard('admin')->user()->id;

       

        //-------  insert category record --------
        $insert = homebanner::create([
            'banner_title'=>$request->banner_title,
            'banner_heading'=>$request->banner_heading,
            'banner_caption'=>$request->banner_caption,
            'banner_button1'=>$request->banner_button1,
            'banner_button2'=>$request->banner_button2,
            'button1_url'=>$request->button1_url,
            'button2_url'=>$request->button2_url,
            'slug'=>$slug,
            'creator_id' => $creator,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        /**  ------- upload image using image intervention -------- use image top */
        if($request->hasFile('images')){
            $file = $request->file('images'); // get actual image 
            $imageName= time().'_'.rand(10000,100000).'.webp'; // make image name with webp extension
            $manager= new ImageManager(new Driver()); // image driver use 
            $realPath = 'uploads/banner/';  // make real path for store name in database
            $fullPath = $realPath.$imageName; // make full path realpath and imagename 
            $publicPath =  public_path($realPath); // hard file save directory 
            if (!File::exists($publicPath)) {
                File::makeDirectory($publicPath, 0755, true);  // create a directory if the  directory not exist 
            }
            /** image manupulate  */
            $image = $manager->read($file)
            ->scaleDown(1000)
            ->cover(1000, 1000)
            ->toWebp(90)
            ->save($publicPath . $imageName);
            /**-- save image name in  database */
            homebanner::where('id',$insert->id)->where('slug',$slug)->update([
                'banner_image'=>  $fullPath,
            ]);
        }
        // ----  image upload end here 

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
    //     $request->validate([
          
    //         'address'=> 'required',
    //     ],[
           
    //         'address.required'=> ' phone  is Required !',
    //     ]
    // );


    //--- get specific Credential for update record & editor id --------
    $id = $request->id;
    $slug = $request->slug;
    $editor = Auth::guard('admin')->user()->id;

    //---------category update -------//
    $update = homebanner::where('id',$id)->where('slug',$slug)->update([
        'banner_title'=>$request->banner_title,
        'banner_heading'=>$request->banner_heading,
        'banner_caption'=>$request->banner_caption,
        'banner_button1'=>$request->banner_button1,
        'banner_button2'=>$request->banner_button2,
        'button1_url'=>$request->button1_url,
        'button2_url'=>$request->button2_url,
        'editor_id' => $editor,
        'updated_at' => Carbon::now()->toDateTimeString(),
    ]);
  /**  ------- upload image using image intervention -------- use image top */
    if($request->hasFile('images')){
        $file = $request->file('images'); // get actual image 
        $imageName= time().'_'.rand(10000,100000).'.webp'; // make image name with webp extension
        $manager= new ImageManager(new Driver()); // image driver use 
        $realPath = 'uploads/banner/';  // make real path for store name in database
        $fullPath = $realPath.$imageName; // make full path realpath and imagename 
        $publicPath =  public_path($realPath); // hard file save directory 
        if (!File::exists($publicPath)) {
            File::makeDirectory($publicPath, 0755, true);  // create a directory if the  directory not exist 
        }
        /** image manupulate  */
        $image = $manager->read($file)
        ->scaleDown(1000)
        ->cover(1000, 1000)
        ->toWebp(90)
        ->save($publicPath . $imageName);
        /** --- Delete old image from directories ------  */
        $old_data = homebanner::where('id', $id)->first();
        $file_paths = public_path($old_data->banner_image);
        if (file_exists($file_paths)) {
            File::delete($file_paths);
            flash()->success('Old File Deleted Successfully!');
        }
        /** --- Delete old image from directories ------ END --- */
        /**-- save image name in  database */
        homebanner::where('id',$id)->where('slug',$slug)->update([
            'banner_image'=>  $fullPath,
        ]);
    }
    // ----  image upload end here 
    

    // ------insert Successfully--------// 
    if($update){
        flash()->success('Information Update Successfuly');
        return redirect()->route('home_banner.view',[$id,$slug]);
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
        $data= homebanner::where('id',$id)->first();
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
        $data = homebanner::withTrashed()->where('id', $id)->first();
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
        $data = homebanner::onlyTrashed()->where('id', $id)->first();
        if($data) {

            if(!empty($data->banner_image)){
            $file_paths = public_path($data->image);
            if (file_exists($file_paths)) {
                File::delete($file_paths);
                
             }
            }

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
        $published = homebanner::where('id',$id)->where('slug',$slug)->where('public_status',0)->update([
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
        $private = homebanner::where('id',$id)->where('slug',$slug)->where('public_status',1)->update([
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
        $all = homebanner::onlyTrashed()->get();
        return view('backend.frontend.banner.recycle',compact('all'));
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
            homebanner::whereIn('id', $ids)->delete();
            return response()->json(['success' => true, 'message' => 'Selected categories deleted.']);
        }
        //--- for multiple items heard delete -------//
        if ($action === 'heard_delete') {
            $categories = homebanner::onlyTrashed()->whereIn('id', $ids)->get();
        
            foreach ($categories as $category) {

            // -- delete all image 
            if(!empty($category->banner_image)){
                $file_paths = public_path($category->banner_image);
                if (file_exists($file_paths)) {
                    File::delete($file_paths);
                }
            }   
            // image delete end here 
                // 4. Category force delete
                $category->forceDelete();
                 flash()->success('Old File Deleted Successfully!');
            }
        
            return response()->json(['success' => true, 'message' => 'Selected categories permanently deleted with SEO and images.']);
        }
        
    
        //---- for multiple items resotre --------//
        if ($action === 'restore') {
            $categories = homebanner::onlyTrashed()->whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    $data->restore();
                }
            }
            return response()->json(['success' => true, 'message' => 'Selected categories archived.']);
        }
        //----- for multiple items active ----//
        if ($action === 'active') {
            $categories = homebanner::whereIn('id', $ids)->get();

            if($categories){
                foreach($categories as $data){

                    homebanner::whereIn('id',$ids)->where('public_status',0)->update([
                        'public_status'=>1,
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Refund process started.']);
        }

        //--  for multiple items deactive ----- //
        if ($action === 'deactive') {
            $categories = homebanner::whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    homebanner::whereIn('id',$ids)->where('public_status',1)->update([
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
        $categories = homebanner::get();
       // return view('backend.frontend.banner.export_pdf', compact('categories'));
        $pdf = Pdf::loadView('backend.frontend.banner.export_pdf', compact('categories')); // get database record 
        $filename = rand(100000,100000000) . Carbon::now()->format('Y_m_d_His') . '.pdf'; // make pdf file name 
        return $pdf->download($filename); // download file 
    }

    /**
     * ---------  export single pdf functionality ------
     */
    public function export_single_pdf($id,$slug){
        $data = homebanner::where('id',$id)->where('slug',$slug)->firstOrFail();
       // return view('backend.frontend.banner.export_pdf', compact('categories'));
        $pdf = Pdf::loadView('backend.frontend.banner.export_single_pdf', compact('data'));
        $filename = rand(100000,100000000) . Carbon::now()->format('Y_m_d_His') . '.pdf';
        return $pdf->download($filename);
    }


    /**
     * ---------  export Excel or xlsx file functionality ------
     */
    public function export_excel(){
        return Excel::download(new BanneExport, 'info.xlsx');
    }

    /**
     * ---------  export csv file functionality ------
     */
    public function export_csv(){
        return Excel::download(new BanneExport, 'info.csv');
    }

    public function export_zip()
    {
        // File paths for CSV, XLSX, and PDF
        $csvFilePath = storage_path('app/public/info.csv');
        $xlsxFilePath = storage_path('app/public/info.xlsx');
        $pdfFilePath = storage_path('app/public/info.pdf');

        // Export CSV file
        Excel::store(new BanneExport, 'info.csv', 'public');
        
        // Export XLSX file
        Excel::store(new BanneExport, 'info.xlsx', 'public');
        
        // Export PDF file
        $pdf = Pdf::loadView('backend.frontend.banner.export_pdf', ['categories' => homebanner::all()]);
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
