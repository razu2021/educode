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
            <form action="{{route('instructor_request.technicale_setup_update')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label for="able_tolive_class" class="form-label"><strong>Are you able to take live classes?</strong></label>
                <select name="able_tolive_class" id="able_tolive_class" class="form-control custom_input ">
                    <option value="{{$data->able_tolive_class}}">{{$data->able_tolive_class ?? 'Select Preferable Answer' }} </option>
                   <option value="Yes">Yes </option>
                    <option value="No">No  </option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>Let us know if you're confident and equipped to conduct live, real-time classes with students.</i></label>
            </div>
            {{-- end  --}}
            <div class="mb-3">
                <label for="has_webcam" class="form-label"><strong>Do you have a webcam?</strong></label>
                <select name="has_webcam" id="has_webcam" class="form-control custom_input ">
                    <option value="{{$data->has_webcam}}">{{$data->has_webcam ?? 'Select Preferable Answer' }} </option>
                   <option value="Yes">Yes </option>
                    <option value="No">No  </option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>A webcam is important for live interaction with students. Please confirm if you have one.</i></label>
            </div>
            {{-- end  --}}
            <div class="mb-3">
                <label for="can_use_video_call_tools" class="form-label"><strong>Are you comfortable using video conferencing tools?</strong></label>
                <select name="can_use_video_call_tools" id="can_use_video_call_tools" class="form-control custom_input ">
                    <option value="{{$data->can_use_video_call_tools}}">{{$data->can_use_video_call_tools ?? 'Select Preferable Answer' }} </option>
                   <option value="Yes">Yes </option>
                    <option value="No">No  </option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>Indicate if you're familiar with platforms like Zoom, Google Meet, or Microsoft Teams for conducting live sessions.</i></label>
            </div>
            {{-- end  --}}
           

            <div class="text-end mt-4">

               <a href="#"  onclick="window.history.back()"><button type="button" class="btn btn-outline-dark"> Go Back </button></a>
               <a href="{{route('instructor_request.comiunication_skil')}}"><button type="button" class="btn btn-outline-warning"> Skip </button></a>
               <a href=""><button type="submit" class="btn btn-outline-success"> Save Information </button></a>
               <hr>
            </div>
        </form>
        {{-- form end  --}}

      

        </div>
    </div>
</div>


 
@endsection