<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserSocial;
use App\Models\UserSupportingDocument;

class InstructorController extends Controller
{
    public function index(){
         $user_id = auth()->id();
         $userverify = UserSupportingDocument::with('userSocial')->where('user_id',$user_id)->first();
        
        return view('instructor.instructor-dashboard',compact('userverify'));
    }


}
