<?php
namespace App\Http\Controllers\backend\category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Barryvdh\DomPDF\Facade\Pdf; //-------------Export --------
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportData\CategoryExport;
use ZipArchive;
use Illuminate\Support\Facades\Response; 
use Carbon\Carbon; //----------  defualt -------
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Seo;
use App\Models\Seo_image;


class categoryController extends Controller
{
   /**
     * =============================================================
     * ==============================================================================================  SHOW FUNCTION START HERE ========================================================
     * =============================================================
     */
    public function index(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
            $all = Category::where('status',1)->where('category_name','LIKE',"%$search%")
            ->orWhere('category_title','LIKE',"%$search%")->orWhere('category_des','LIKE',"%$search%")->get();
        }else{
            $all = Category::where('status',1)->get();
        }
        return view('backend.categorys.category.index',compact('all'));
    }


   /**
    * ---------  add page functionality --------
    **/
    public function add(){
        $totalpost  = Category::get()->count();
        $latestPost = Category::latest()->first();
        return view('backend.categorys.category.add',compact('totalpost','latestPost'));
    }


   /**
    * ---------  view page functionality --------
    **/
    public function view($id,$slug){
        $data= Category::with(['metaData'=>function($query){
            $query->where('model_type','App\Models\Category'); // metaData filter   
        },
        'metaData.images' // ✅ nested eager load (Seo -> Seo_image
        ])->where('status',1)->where('id',$id)->where('slug',$slug)->firstOrFail();
        
        return view('backend.categorys.category.view',compact('data'));
    }


   /**
    * ---------  edit page functionality --------
    **/
    public function edit($id,$slug){
        $totalpost  = Category::get()->count();
        $latestPost = Category::latest()->first();
        $data= Category::with(['metaData'=>function($query){
            $query->where('model_type','App\Models\Category'); // metaData filter   
        },
        'metaData.images' // ✅ nested eager load (Seo -> Seo_image
        ])->where('status',1)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('backend.categorys.category.edit',compact('totalpost','latestPost','data'));
    }


   /**
     * =======================================================================
     * ==============================================================================================  CREATE FUNCTION START HERE ========================================================
     * =======================================================================
     */
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
        $insert = Category::create([
            'category_name'=>$request->category_name,
            'category_title'=>$request->category_title,
            'category_des'=>$request->category_desc,
            'slug'=>$slug,
            'url'=>$url,
            'creator_id' => $creator,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

      
       
        $insert->metaData()->create([
            'unique_id'=>$insert->id,
            'creator_id'=>$creator,
            'slug'=>$slug,
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
            'category_name'=> 'required',
            
            'category_desc'=> 'required',
            ],[
                'category_name.required'=> 'Category Name is Required !',
                
                'category_desc.required'=> 'Category Description is Required !',
            ]
        );

    //--- get specific Credential for update record & editor id --------
    $id = $request->id;
    $slug = $request->slug;
    $editor = Auth::guard('admin')->user()->id;


    // -------  update custom url --------//
    $categoryname = strtolower($request->category_name) ;
    $user_input_url  = strtolower($request->custom_url) ;
    if(!empty($user_input_url)){
        $url = Str::slug($user_input_url); // Output: "my-new-category-name"
    }else{
        $url = Str::slug($categoryname); // Output: "my-new-category-name"
    }

    //---------category update -------//
    $update = Category::where('id',$id)->where('slug',$slug)->update([
        'category_name'=>$request->category_name,
        'category_title'=>$request->category_title,
        'category_des'=>$request->category_desc,
        'slug'=>$slug,
        'url'=>$url,
        'editor_id' => $editor,
        'updated_at' => Carbon::now()->toDateTimeString(),
    ]);
    

    // ------insert Successfully--------// 
    if($update){
        flash()->success('Information Update Successfuly');
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
        $data= Category::where('id',$id)->first();
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
        $data = Category::withTrashed()->where('id', $id)->first();
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
        $data = Category::onlyTrashed()->where('id', $id)->first();
    
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
    


   /**
    * ---------  Published post  functionality --------//
    **/
    public function public_status($id,$slug){
        $published = Category::where('id',$id)->where('slug',$slug)->where('public_status',0)->update([
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
        $private = Category::where('id',$id)->where('slug',$slug)->where('public_status',1)->update([
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
        $all = Category::onlyTrashed()->get();
        return view('backend.categorys.category.recycle',compact('all'));
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
            Category::whereIn('id', $ids)->delete();
            return response()->json(['success' => true, 'message' => 'Selected categories deleted.']);
        }
        //--- for multiple items heard delete -------//
        if ($action === 'heard_delete') {
            $categories = Category::onlyTrashed()->whereIn('id', $ids)->get();
        
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
            $categories = Category::onlyTrashed()->whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    $data->restore();
                }
            }
            return response()->json(['success' => true, 'message' => 'Selected categories archived.']);
        }
        //----- for multiple items active ----//
        if ($action === 'active') {
            $categories = Category::whereIn('id', $ids)->get();

            if($categories){
                foreach($categories as $data){

                    Category::whereIn('id',$ids)->where('public_status',0)->update([
                        'public_status'=>1,
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Refund process started.']);
        }

        //--  for multiple items deactive ----- //
        if ($action === 'deactive') {
            $categories = Category::whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    Category::whereIn('id',$ids)->where('public_status',1)->update([
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
        $categories = Category::get();
       // return view('backend.categorys.category.export_pdf', compact('categories'));
        $pdf = Pdf::loadView('backend.categorys.category.export_pdf', compact('categories')); // get database record 
        $filename = 'categories_'.rand(100000,100000000) . Carbon::now()->format('Y_m_d_His') . '.pdf'; // make pdf file name 
        return $pdf->download($filename); // download file 
    }

    /**
     * ---------  export single pdf functionality ------
     */
    public function export_single_pdf($id,$slug){
        $data = Category::where('id',$id)->where('slug',$slug)->firstOrFail();
       // return view('backend.categorys.category.export_pdf', compact('categories'));
        $pdf = Pdf::loadView('backend.categorys.category.export_single_pdf', compact('data'));
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
        $pdf = Pdf::loadView('backend.categorys.category.export_pdf', ['categories' => Category::all()]);
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

  






//-----------  controller end here ------------- //
}
//--------  controller end here ------------- //
