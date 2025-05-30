<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Category extends Model
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

    //  sub categoey 
    public Function subcategorys(){
        return $this->hasMany(SubCategory::class);
    }


    // category model 
    public function metaData(){
        return $this->morphOne(Seo::class, 'seoable', 'model_type', 'unique_id');
    }
    
}
