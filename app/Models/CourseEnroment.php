<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseEnroment extends Model
{
    use SoftDeletes;
    protected $guarded = [];


    public function creator() {
        return $this->belongsTo(Admin::class, 'creator_id', 'id');
    }
    
    public function editor() {
        return $this->belongsTo(Admin::class, 'editor_id', 'id');
    }
    public function username() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    // -----------  course enrolment ----

    public function course(){
        return $this->belongsTo(Course::class , 'course_id' ,'id');
    }

    public function payment() {
        return $this->belongsTo(Payment::class);
    }



    
}
