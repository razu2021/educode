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
    public function courseContent()
    {
        return $this->hasOne(CourseModule::class, 'course_id', 'id');
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
}
