<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SubCategory extends Model
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
    public function Category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    //child category 
    public function childcategories(){
        return $this->hasMany(ChildCategory::class ,'subcategory_id','id');
    }

    // category model 
    public function metaData(){
        return $this->morphOne(Seo::class, 'seoable', 'model_type', 'unique_id');
    }
}
