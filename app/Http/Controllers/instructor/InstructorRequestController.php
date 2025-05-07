<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\InstructoreRequest;
use Illuminate\Http\Request;


class InstructorRequestController extends Controller
{

    public function index(){

        return view('instructor.instructor_request.index');
    }

    public function find_us(){

        return view('instructor.instructor_request.request.find_us');
    }





    public function insert(Request $request){
        $user_id = auth()->id();
        $insert = InstructoreRequest::create([
            'user_id' => $user_id,
        ]);
        return redirect()->route('instructor_request.find_us');
    
    }


    public function update(Request $request){
        $user_id = auth()->id();
        $insert = InstructoreRequest::create([
            'user_id' => $user_id,
        ]);
        return redirect()->back();
    
    }










}
