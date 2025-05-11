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
            <form action="{{route('instructor_request.self_promot_course_update')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label for="willing_to_promote_course" class="form-label"><strong> Are you willing to promote your course on your social platforms or network? </strong></label>
                <select name="willing_to_promote_course" id="willing_to_promote_course" class="form-control custom_input ">
                    <option value="{{$data->willing_to_promote_course}}">{{$data->willing_to_promote_course ?? 'Select Preferable Answer' }} </option>
                   <option value="Yes">Yes </option>
                    <option value="No">No  </option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>Promoting your course can help you reach more students. Let us know if you're open to sharing it via social media or your network.</i></label>
            </div>
            {{-- end  --}}
             <div class="mb-3">
                <label for="interested_in_affiliate" class="form-label"><strong>Are you interested in joining our affiliate program?</strong></label>
                <select name="interested_in_affiliate" id="interested_in_affiliate" class="form-control custom_input ">
                    <option value="{{$data->interested_in_affiliate}}">{{$data->interested_in_affiliate ?? 'Select Preferable Answer' }} </option>
                   <option value="Yes">Yes </option>
                    <option value="No">No  </option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>Affiliates can earn extra income by promoting courses. Let us know if you want to be part of it.</i></label>
            </div>
            {{-- end --}}
             <div class="mb-3">
                <label for="plans_more_courses" class="form-label"><strong> Do you have plans to create more courses? </strong></label>
                <select name="plans_more_courses" id="plans_more_courses" class="form-control custom_input ">
                    <option value="{{$data->plans_more_courses}}">{{$data->plans_more_courses ?? 'Select Preferable Answer' }} </option>
                   <option value="Yes">Yes </option>
                    <option value="No">No  </option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>Share your intent about launching more courses so we can better support you in your journey.</i></label>
            </div>
            {{-- end --}}
          

            <div class="text-end mt-4">

               <a href="#"  onclick="window.history.back()"><button type="button" class="btn btn-outline-dark"> Go Back </button></a>
               <a href="{{route('instructor_request.self_motivation')}}"><button type="button" class="btn btn-outline-warning"> Skip </button></a>
               <a href=""><button type="submit" class="btn btn-outline-success"> Save Information </button></a>
               <hr>
            </div>
        </form>
        {{-- form end  --}}

      

        </div>
    </div>
</div>


 
@endsection