<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Stripe\Coupon;

class Course extends Model
{
    use SoftDeletes;
    protected $primaryKey = "id";
    protected $guarded=[];



    /** ---- course price ---- */
    public function coursePrice()
    {
        return $this->hasOne(Course_price::class, 'course_id', 'id');
    }
    /** ---- course coupon ---- */
    public function courseCoupon()
    {
        return $this->hasOne(DiscountCoupon::class, 'course_id', 'id');
    }
    /** ---- course module ---- */
    public function courseModule()
    {
        return $this->hasOne(CourseModule::class, 'course_id', 'id');
    }
    /** ---- course module ---- */
    public function courseTopic()
    {
        return $this->hasMany(Course_topic::class, 'course_id', 'id');
    }
    //  total video count 
    public function getTotalVideosAttribute()
    {
        return $this->courseTopic->sum(function ($topic) {
            return $topic->videos->count();
        });
    }

    // course attachment 
    public function courseAttachment()
    {
        return $this->hasMany(CourseAttchment::class, 'course_id', 'id');
    }
    public function getTotalAttachmentsAttribute()
    {
        return $this->courseAttachment->count();
    }


    // course assignment ---------
    public function courseAssignment()
    {
        return $this->hasMany(ClassAssignment::class, 'course_id', 'id');
    }
    public function getTotalAssignmentsAttribute()
    {
        return $this->courseAssignment->count();
    }
 

    // course Quize  ---------
        // ✅ Relationship method
        public function courseQuizzes()
        {
            return $this->hasMany(courseQuize::class, 'course_id', 'id');
        }

        // ✅ Accessor for total quizzes
        public function getTotalQuizzesAttribute()
        {
            return $this->courseQuizzes->count();
        }

        // ✅ Accessor for total questions in all quizzes
        public function getTotalQuizQuestionsAttribute()
        {
            return $this->courseQuizzes->sum(function ($quiz) {
                return $quiz->quizeQustions->count(); // spelling must be correct
            });
        }











    public function creator() {
        return $this->belongsTo(Admin::class, 'creator_id', 'id');
    }
    
    public function editor() {
        return $this->belongsTo(Admin::class, 'editor_id', 'id');
    }
    public function username() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

   
    // category model 
    public function metaData(){
        return $this->morphOne(Seo::class, 'seoable', 'model_type', 'unique_id');
    }


    /**  category model  join for filter  */
    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id','id');
    }
    /**  category model  join for filter  */
    public function subcategory()
    {
        return $this->belongsTo(CourseSubCategory::class, 'course_subcategory_id','id');
    }





}
