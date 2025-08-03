<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CourseQuizQuestion extends Model
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

    public function quize(){
        return $this->belongsTo(courseQuize::class ,'quize_id','id');
    }

   public function quizAnswers()
    {
        return $this->hasMany(QuizeAnswer::class, 'question_id','id');
    }
    // -------  quiz qustions  relationship 

}
