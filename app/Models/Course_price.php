<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Course_price extends Model
{
    use SoftDeletes;
    protected $primaryKey = "id";
    protected $guarded=[];

    public function courseinfo(){
       return  $this->belongsTo(Course::class,'course_id','id');
    }


}
