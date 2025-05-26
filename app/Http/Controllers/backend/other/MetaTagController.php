<?php

namespace App\Http\Controllers\backend\other;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Barryvdh\DomPDF\Facade\Pdf; //-------------Export --------
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportData\CategoryExport;
use ZipArchive;
use Illuminate\Support\Facades\Response; 
use Carbon\Carbon; //----------  defualt -------
use Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Seo;
use App\Models\Seo_image;
class MetaTagController extends Controller
{

    /**
     * =============================================================
     * ==============================================================================================  SHOW FUNCTION START HERE ========================================================
     * =============================================================
     */
    public function index(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
            $all = Seo::where('status',1)->where('model_type','LIKE',"%$search%")->get();
        }else{
            $all = Seo::where('status',1)->get();
        }
        return view('backend.other.metatag.index',compact('all'));
    }


   /**
    * ---------  add page functionality --------
    **/
    public function add(){
        $totalpost  = Seo::get()->count();
        $latestPost = Seo::latest()->first();
        return view('backend.other.metatag.add',compact('totalpost','latestPost'));
    }


   /**
    * ---------  view page functionality --------
    **/
    public function view($id,$model_type,$slug){
        $data = Seo::with([
            'metaData',
            'images'
        ])
        ->where('status', 1)
        ->where('id', $id)
        ->where('model_type',$model_type)
        ->where('slug', $slug)
        ->firstOrFail();
       // dd($data);
        
        return view('backend.other.metatag.view',compact('data'));
    }





   /**
    * ---------  edit page functionality --------
    **/
    public function edit($id,$slug){
        $totalpost  = Seo::get()->count();
        $latestPost  = Seo::latest()->first();
        $data = Seo::with([
            'Category',
            'images'
        ])
        ->where('status', 1)
        ->where('id', $id)
        ->where('slug', $slug)
        ->firstOrFail();
       // dd($data);
        return view('backend.other.metatag.edit',compact('totalpost','latestPost','data'));
    }


   /**
     * =======================================================================
     * ==============================================================================================  CREATE FUNCTION START HERE ========================================================
     * =======================================================================
     */
    
     // just upload a seo image 
    public function  add_seo_image(Request $request){
            // ------ uploads image for seo --------- 
           if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {  // --- foreach use for store multiple image 
                    $fileName = time() . '_' . $file->getClientOriginalName(); // ---- make image name 
                    $file->storeAs('uploads/seo', $fileName, 'public'); // ---- stor image in public folder ---
                    $seo_id = $request->seo_id;
                    $model_type = $request->model_type;
                    //------ store image name in into the database ----
                  $insert =  Seo_image::create([
                        'seo_id'     => $seo_id,
                        'model_type' => $model_type,
                        'image_name' => $fileName, 
                    ]);
                }
            }
            // insert Successfully 
            if($insert){
                flash()->success('Information Added Successfuly');
            }else{
                flash()->error('Informatin Added Faild !');
            }
            return redirect()->back();
    }


     // just upload a seo image 
    public function  update_seo_image(Request $request){
            // ------ uploads image for seo --------- 
           if ($request->hasFile('images')) {
                $file = $request->file('images');
                    $fileName = time() . '_' . $file->getClientOriginalName(); // ---- make image name 
                    $file->storeAs('uploads/seo', $fileName, 'public'); // ---- stor image in public folder ---
                    $id = $request->id;
                    $seo_id = $request->seo_id;
                    $model_type = $request->model_type;


               /** --- Delete old image from directories ------  */
                $old_path = Seo_image::where('id', $id)->first();
                $file_paths = public_path('storage/uploads/seo/' .$old_path->image_name);

                if (file_exists($file_paths)) {
                    File::delete($file_paths);
                    flash()->success('Old File Deleted Successfully!');
                }
                /** --- Delete old image from directories ------ END --- */


                    //------ store image name in into the database ----//
                   $update = Seo_image::where('id',$id)->update([
                    'image_name'=>$fileName,
                   ]);
                
            }
            // insert Successfully 
            if($update){
                flash()->success('Information Added Successfuly');
            }else{
                flash()->error('Informatin Added Faild !');
            }
            return redirect()->back();
    }








    public function insert(Request $request){
        /**--- validation code -- */
        $request->validate([
                'category_name'=> 'required',
                'category_desc'=> 'required',
            ],[
                'category_name.required'=> 'Category Name is Required !',
                
                'category_desc.required'=> 'Category Description is Required !',
            ]
        );

        // ------  create a slug & get creator id -------
        $slug = uniqid('20').Str::random(20) . '_'.mt_rand(10000, 100000).'-'.time();;
        $creator = Auth::guard('admin')->user()->id;

        //------- make a custom url for -------
        $categoryname = strtolower($request->category_name) ;
        $user_input_url  = strtolower($request->custom_url) ;
        if(!empty($user_input_url)){
            $url = Str::slug($user_input_url); // Output: "my-new-category-name"
        }else{
            $url = Str::slug($categoryname); // Output: "my-new-category-name"
        }

        //-------  insert category record --------
        $insert = Seo::create([
            'category_name'=>$request->category_name,
            'category_title'=>$request->category_title,
            'category_des'=>$request->category_desc,
            'slug'=>$slug,
            'url'=>$url,
            'creator_id' => $creator,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        // --------- insert SEO Record ------------
        $metadat = Seo::create([
            // defualt
            'unique_id'=> $insert->id,
            'model_type'=>'Category',
            // genrel feilds 
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'meta_keywords'=>$request['meta_keywords'],
            'meta_robots'=>$request->meta_robots,
            'canonical_url'=>$request->canonical_url,
            'hreflang_tags' => json_encode($request->hreflang_tags, JSON_UNESCAPED_UNICODE),
            'structured_data' => json_encode($request->structured_data, JSON_UNESCAPED_UNICODE),
            // open graph 
            'og_title'=>$request->og_title,
            'og_description'=>$request->og_description,
            'og_url'=>$request->og_url,
            'og_type'=>$request->og_type,
            'og_locale'=>$request->og_locale,
            // twitter card
            'twitter_card'=>$request->twitter_card,
            'twitter_title'=>$request->twitter_title,
            'twitter_description'=>$request->twitter_description,
            'twitter_site'=>$request->twitter_site,
            // whatsapp 
            'whatsapp_title'=>$request->whatsapp_title,
            'whatsapp_description'=>$request->whatsapp_description,
            // pinterest
            'pinterest_description'=>$request->pinterest_description,
            'pinterest_rich_pin'=>$request->pinterest_rich_pin,
            // image
            'seo_image'=>'seo_image',
            'slug'=>$slug,
            'creator_id' => $creator,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        // ------ uploads image for seo --------- 
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {  // --- foreach use for store multiple image 
                $fileName = time() . '_' . $file->getClientOriginalName(); // ---- make image name 
                $file->storeAs('uploads/seo', $fileName, 'public'); // ---- stor image in public folder ---
                //------ store image name in into the database ----
                Seo_image::create([
                    'seo_id'     => $metadat->id,
                    'model_type' => 'Seo',
                    'image_name' => $fileName, 
                ]);
            }
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
    $model_type = $request->model_type;
    $editor = Auth::guard('admin')->user()->id;

    // ------------update metaData ------------//
    $update = Seo::where('unique_id',$id)->where('slug',$slug)->where('model_type',$model_type)->update([
    
        // genrel feilds 
        'meta_title'=>$request->meta_title,
        'meta_description'=>$request->meta_description,
        'meta_keywords'=>$request['meta_keywords'],
        'meta_robots'=>$request->meta_robots,
        'canonical_url'=>$request->canonical_url,
        'hreflang_tags' => json_encode($request->hreflang_tags, JSON_UNESCAPED_UNICODE),
        'structured_data' => json_encode($request->structured_data, JSON_UNESCAPED_UNICODE),
        // open graph 
        'og_title'=>$request->og_title,
        'og_description'=>$request->og_description,
        'og_url'=>$request->og_url,
        'og_type'=>$request->og_type,
        'og_locale'=>$request->og_locale,
        // twitter card
        'twitter_card'=>$request->twitter_card,
        'twitter_title'=>$request->twitter_title,
        'twitter_description'=>$request->twitter_description,
        'twitter_site'=>$request->twitter_site,
        // whatsapp 
        'whatsapp_title'=>$request->whatsapp_title,
        'whatsapp_description'=>$request->whatsapp_description,
        // pinterest
        'pinterest_description'=>$request->pinterest_description,
        'pinterest_rich_pin'=>$request->pinterest_rich_pin,
        // image
        'seo_image'=>'seo_image',
        'editor_id' => $editor,
        'updated_at' => Carbon::now()->toDateTimeString(),
    ]);



    // -----update seo image ------//
    $seoId = Seo::where('unique_id', $id)->where('slug', $slug)->where('model_type',$model_type)->first(); 
    if ($seoId) {
        $seoId = $seoId->id;  // seoId পাওয়ার পর, সেটা সেভ করবো
    } else {
        return back()->withErrors('No SEO data found for this ID'); // যদি SEO data না পাওয়া যায়, তাহলে ত্রুটি দেখানো হবে
    }

    // -------  get seo image -------//
    if($request->hasFile('images')){
        $images = $request->file('images');
        foreach($images as $key => $file){
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/seo', $fileName, 'public');

            // ফর্ম থেকে unique_id এবং seo_id গুলি আনার জন্য
            $table_ids = $request->input('table_ids');  // এটা হবে table_ids এর array
            $seo_ids = $request->input('seo_ids');  // এটা হবে seo_ids এর array

            if($table_ids &&  $seo_ids){

            // প্রতিটি ছবির জন্য seo_id এবং table_id বের করা
            $seo_id = isset($seo_ids[$key]) ? $seo_ids[$key] : null;
            $table_id = isset($table_ids[$key]) ? $table_ids[$key] : null;

            /**--------- Multiple file delete when you update new file ----------- */
            $old_files =  Seo_image::where('id',$table_id)->where('seo_id',$seo_id)->get();

            foreach ($old_files as $old_file) {
                $file_path = public_path('storage/uploads/seo/'.$old_file->image_name);
                if (file_exists($file_path)) {
                    File::delete($file_path);
                }
            }
            //---------- multiple file delete end ---------- //

            Seo_image::where('id',$table_id)->where('seo_id',$seo_id)->update([
                'image_name' =>$fileName,
            ]);
            }else{
                Seo_image::create([
                    'seo_id'=>$seoId,
                    'model_type'=>$model_type,
                    'image_name' =>$fileName,
                ]);
               
            }
        }
    } // end if 


    // ------insert Successfully--------// 
    if($update){
        flash()->success('Information Update Successfuly');
        return redirect()->route('metatag.view',[$id,$model_type,$slug]);
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
        $data= Seo::where('id',$id)->first();
        $data->delete();
        // ----Delete Successfully ----//
        if($data){
            flash()->success('Information Update Successfuly');
        }else{
            flash()->error('Informatin Update Faild !');
        }
        return redirect()->back();
    }

   /**
    * ---------  restore  page functionality --------
    **/
    public function restore($id){
        $data = Seo::withTrashed()->where('id', $id)->first();
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
        $data = Seo::onlyTrashed()->where('id', $id)->first();
    
        if($data) {
            // Delete all associated seo_image records first
            /**--------- Multiple file delete when you update new file ----------- */
            $SeoData =  Seo::where('unique_id',$data->id)->first()->id;
            $seoImage = Seo_image::where('seo_id',$SeoData)->get();
           // dd($seoImage);

            foreach ($seoImage as $images) {
                $file_path = public_path('storage/uploads/seo/'.$images->image_name);
                if (file_exists($file_path)) {
                    File::delete($file_path);
                }
                $images->delete(); 
            }

            /**---------- multiple file delete end ---------- */
         
            // Force delete the category record
            $data->forceDelete();
    
        flash()->success('Record Deleted Successfully');
        } else {
            flash()->error('Delete Record Failed!');
        }
        return redirect()->back();
    }
    
    public function delete_image($id){
        $data = Seo_image::where('id', $id)->first();
    
        if($data) {
            // Delete all associated seo_image records first
            
          
         
                $file_path = public_path('storage/uploads/seo/'.$data->image_name);
                if (file_exists($file_path)) {
                    File::delete($file_path);
                }
                $data->delete(); 
         
         
            // Force delete the category record
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
        $published = Seo::where('id',$id)->where('slug',$slug)->where('public_status',0)->update([
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
        $private = Seo::where('id',$id)->where('slug',$slug)->where('public_status',1)->update([
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
        $all = Seo::onlyTrashed()->get();
        return view('backend.other.metatag.recycle',compact('all'));
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
            Seo::whereIn('id', $ids)->delete();
            return response()->json(['success' => true, 'message' => 'Selected categories deleted.']);
        }
        //--- for multiple items heard delete -------//
        if ($action === 'heard_delete') {
            $categories = Seo::onlyTrashed()->whereIn('id', $ids)->get();
        
            foreach ($categories as $category) {
                // 1. Related SEO খোঁজো
                $seo = Seo::where('unique_id', $category->id)->first();
        
                if ($seo) {
                    // 2. Related SEO Images খোঁজো
                    $seoImages = Seo_image::where('seo_id', $seo->id)->get();
        
                    foreach ($seoImages as $image) {
                        $file_path = public_path('storage/uploads/seo/' . $image->image_name);
                        if (file_exists($file_path)) {
                            File::delete($file_path);
                        }
                        $image->delete(); // DB থেকে image রেকর্ড ডিলিট
                    }
        
                    // 3. SEO রেকর্ড ডিলিট করো
                    $seo->delete();
                }
        
                // 4. Category force delete
                $category->forceDelete();
            }
        
            return response()->json(['success' => true, 'message' => 'Selected categories permanently deleted with SEO and images.']);
        }
        
    
        //---- for multiple items resotre --------//
        if ($action === 'restore') {
            $categories = Seo::onlyTrashed()->whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    $data->restore();
                }
            }
            return response()->json(['success' => true, 'message' => 'Selected categories archived.']);
        }
        //----- for multiple items active ----//
        if ($action === 'active') {
            $categories = Seo::whereIn('id', $ids)->get();

            if($categories){
                foreach($categories as $data){

                    Seo::whereIn('id',$ids)->where('public_status',0)->update([
                        'public_status'=>1,
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Refund process started.']);
        }

        //--  for multiple items deactive ----- //
        if ($action === 'deactive') {
            $categories = Seo::whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    Seo::whereIn('id',$ids)->where('public_status',1)->update([
                        'public_status'=>0,
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Refund process started.']);
        }

        
        // Delete Seo image if you want 
        if ($action === 'delete_images') {
            $deleteImages = Seo_image::whereIn('id', $ids)->get(); // whereIn যদি multiple id থাকে
        
            if ($deleteImages) {
                foreach ($deleteImages as $data) {
                    $file_path = public_path('storage/uploads/seo/' . $data->image_name);
                    if (file_exists($file_path)) {
                        File::delete($file_path);
                    }
                    $data->forceDelete(); // 👉 হার্ড ডিলিট
                }
            }
            return response()->json(['success' => true, 'message' => 'Selected images deleted successfully.']);
        }
        



        return response()->json(['success' => false, 'message' => 'Invalid action.']);
    } 
    
    // bulk action end here 
    


    /**
     * ==========================================================
     * ==============================================================================================  EXPORT FUNCTION START HERE ========================================================
     * ===========================================================
     */

    public function export_pdf(){
        $categories = Seo::get();
       // return view('backend.other.metatag.export_pdf', compact('categories'));
        $pdf = Pdf::loadView('backend.other.metatag.export_pdf', compact('categories')); // get database record 
        $filename = 'categories_'.rand(100000,100000000) . Carbon::now()->format('Y_m_d_His') . '.pdf'; // make pdf file name 
        return $pdf->download($filename); // download file 
    }

    /**
     * ---------  export single pdf functionality ------
     */
    public function export_single_pdf($id,$slug){
        $data = Seo::where('id',$id)->where('slug',$slug)->firstOrFail();
       // return view('backend.other.metatag.export_pdf', compact('categories'));
        $pdf = Pdf::loadView('backend.other.metatag.export_single_pdf', compact('data'));
        $filename = 'categories_'.rand(100000,100000000) . Carbon::now()->format('Y_m_d_His') . '.pdf';
        return $pdf->download($filename);
    }


    /**
     * ---------  export Excel or xlsx file functionality ------
     */
    public function export_excel(){
        return Excel::download(new CategoryExport, 'Category.xlsx');
    }

    /**
     * ---------  export csv file functionality ------
     */
    public function export_csv(){
        return Excel::download(new CategoryExport, 'Category.csv');
    }

    public function export_zip()
    {
        // File paths for CSV, XLSX, and PDF
        $csvFilePath = storage_path('app/public/categories.csv');
        $xlsxFilePath = storage_path('app/public/categories.xlsx');
        $pdfFilePath = storage_path('app/public/categories.pdf');

        // Export CSV file
        Excel::store(new CategoryExport, 'categories.csv', 'public');
        
        // Export XLSX file
        Excel::store(new CategoryExport, 'categories.xlsx', 'public');
        
        // Export PDF file
        $pdf = Pdf::loadView('backend.other.metatag.export_pdf', ['categories' => Seo::all()]);
        $pdf->save($pdfFilePath);

        // Create a zip file
        $zip = new ZipArchive;
        $zipFilePath = storage_path('app/public/categories.zip');
        
        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            $zip->addFile($csvFilePath, 'categories.csv');
            $zip->addFile($xlsxFilePath, 'categories.xlsx');
            $zip->addFile($pdfFilePath, 'categories.pdf');
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



// controller end 
}
// controller end here 
