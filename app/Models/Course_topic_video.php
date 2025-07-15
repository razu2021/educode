<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Course_topic_video extends Model
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

    public function course(){
        return $this->belongsTo(Course::class ,'course_id','id');
    }

    public function topic(){
        return $this->belongsTo(Course_topic::class ,'topic_id','id');
    }
}
