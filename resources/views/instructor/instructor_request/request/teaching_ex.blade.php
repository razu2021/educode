@extends('dashboard')
@section('instructor_request_content')
<!-- Main Content Start -->
@php 
    use App\Models\InstructoreRequest;
    $auth_id = auth()->id();
    $data = InstructoreRequest::where('user_id',$auth_id)->first();
@endphp 

<div class="section">
    <div class="container">
        <div class="col-lg-8 offset-lg-2">
            <h1>Welcome to Your Instructor Dashboard</h1>
            <p>Start creating your first course and share your knowledge with the world.</p>
        {{-- form start  --}}
            <form action="{{route('instructor_request.teaching_ex_update')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label for="has_teaching_experience" class="form-label"><strong><i>Do you have teaching experience?</i></strong></label>
                <input type="text"  class="form-control custom_input " name="has_teaching_experience" id="has_teaching_experience" value="{{ $data->has_teaching_experience ?? '' }}">
                <label for="has_teaching_experience" class="form-label"><i>Let us know if you have any prior teaching experience. This helps us understand your background.</i></label>
            </div>
          
            <div class="mb-3">
                <label for="experience_year" class="form-label"><strong>How many years of teaching experience do you have?</strong></label>
                <input type="text"  class="form-control custom_input " name="experience_year" id="experience_year" value="{{ $data->experience_year ?? '' }}">
                <label for="has_teaching_experience" class="form-label"><i>lease provide the total number of years you have been teaching. If applicable, specify your experience in teaching relevant subjects.</i></label>
            </div>
          
            <div class="mb-3">
                <label for="daily_available_hours" class="form-label"><strong>What student level do you prefer to teach?</strong></label>
                <select name="preferred_student_level" id="preferred_student_level" class="form-control custom_input ">
                    <option value="{{$data->preferred_student_level}}">{{$data->preferred_student_level ?? 'Select Preferred Student Level' }} </option>
                    <option value="all type">I will Preferred All Type of Student</option>
                    <option value="Beginner">I will Preferred Beginner Level Student </option>
                    <option value="Intermediate">I will Preferred Intermediate level Student</option>
                    <option value="Advanced">I will Preferred Advanced Level Student</option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>Let us know the level of students you are comfortable teaching. Examples: Beginner, Intermediate, Advanced, etc.</i></label>
               
            </div>
          

            <div class="text-end mt-4">

               <a href="#"  onclick="window.history.back()"><button type="button" class="btn btn-outline-dark"> Go Back </button></a>
               <a href="{{route('instructor_request.course_pre')}}"><button type="button" class="btn btn-outline-warning"> Skip </button></a>
               <a href=""><button type="submit" class="btn btn-outline-success"> Save Information </button></a>
               <hr>
            </div>
        </form>
        {{-- form end  --}}

      

        </div>
    </div>
</div>


 
@endsection