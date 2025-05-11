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
            <form action="{{route('instructor_request.ethics_update')}}" method="post" enctype="multipart/form-data">
                @csrf
             <div class="mb-3">
                <label for="no_copyright_violation" class="form-label"><strong> I confirm that my course does not contain any copyrighted materials without permission.</strong></label>
                <select name="no_copyright_violation" id="no_copyright_violation" class="form-control custom_input ">
                    <option value="{{$data->no_copyright_violation}}">{{$data->no_copyright_violation ?? 'Select Preferable Answer' }} </option>
                   <option value="Yes">Yes </option>
                    <option value="No">No  </option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>You must use only original or properly licensed content in your course. No copyright violations are allowed.</i></label>
            </div>
            {{-- end  --}}
             <div class="mb-3">
                <label for="accepts_review_policy" class="form-label"><strong> I accept the course review and approval process policy.</strong></label>
                <select name="accepts_review_policy" id="accepts_review_policy" class="form-control custom_input ">
                    <option value="{{$data->accepts_review_policy}}">{{$data->accepts_review_policy ?? 'Select Preferable Answer' }} </option>
                   <option value="Yes">Yes </option>
                    <option value="No">No  </option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>Your course will be reviewed before publishing. By agreeing, you accept that feedback or revisions may be required.</i></label>
            </div>

            
            {{-- end  --}}
            <div class="text-end mt-4">
               <a href="#"  onclick="window.history.back()"><button type="button" class="btn btn-outline-dark"> Go Back </button></a>
               <a href="{{route('instructor_request.self_promot_course')}}"><button type="button" class="btn btn-outline-warning"> Skip </button></a>
               <a href=""><button type="submit" class="btn btn-outline-success"> Save Information </button></a>
               <hr>
            </div>
        </form>
        {{-- form end  --}}

      

        </div>
    </div>
</div>


 
@endsection