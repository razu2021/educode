<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CourseChildCategory extends Model
{
    use SoftDeletes;
    protected $primaryKey = "id";
    protected $guarded=[];


    public function creator() {
        return $this->belongsTo(Admin::class, 'creator_id', 'id');
    }
    
    public function editor() {
        return $this->belongsTo(Admin::class, 'editor_id', 'id');
    }

    // join course category model 



    // get all Subcategory course 
    public function course(){
        return $this->hasMany(Course::class,'course_subcategory_id','id');
    }

   

    // category model 
    public function metaData(){
        return $this->morphOne(Seo::class, 'seoable', 'model_type', 'unique_id');
    }
}
