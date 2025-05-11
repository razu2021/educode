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
            <form action="{{route('instructor_request.course_pre_update')}}" method="post" enctype="multipart/form-data">
                @csrf

            <div class="mb-3">
                <label for="can_create_thumbnail" class="form-label"><strong>Can you create course thumbnails?</strong></label>
                <select name="can_create_thumbnail" id="can_create_thumbnail" class="form-control custom_input ">
                    <option value="{{$data->can_create_thumbnail}}">{{$data->can_create_thumbnail ?? 'Select Preferable Answer' }} </option>
                    <option value="Yes,I will Make">Yes, I will able to make Thumbnail </option>
                    <option value="No, I have Expert">No, I will not making , But I  have professional Expert  </option>
                    <option value="No, Support from Authority">No , I would like to Support from Authority </option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>Let us know if you are able to design or upload thumbnail images for your courses.</i></label>
            </div>
            {{-- end  --}}
            <div class="mb-3">
                <label for="can_create_promo_video" class="form-label"><strong>Can you create promotional videos for your course?</strong></label>
                <select name="can_create_promo_video" id="can_create_promo_video" class="form-control custom_input ">
                    <option value="{{$data->can_create_promo_video}}">{{$data->can_create_promo_video ?? 'Select Preferable Answer' }} </option>
                    <option value="Yes,I will Make">Yes, I will able to make promotional Video </option>
                    <option value="No, I have Expert">No, I will not making , But I  have professional Expert  </option>
                    <option value="No, Support from Authority">No , I would like to Support from Authority </option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>Promo videos help attract students. Let us know if you can create one.</i></label>
            </div>
            {{-- end  --}}
            <div class="mb-3">
                <label for="has_course_module" class="form-label"><strong>Do you have a course module or outline prepared?</strong></label>
                <select name="has_course_module" id="has_course_module" class="form-control custom_input ">
                    <option value="{{$data->has_course_module}}">{{$data->has_course_module ?? 'Select Preferable Answer' }} </option>
                    <option value="Yes">Yes </option>
                    <option value="No">No</option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>A structured course module helps learners understand what they'll gain from your course.</i></label>
            </div>
            {{-- end  --}}
            <div class="mb-3">
                <label for="has_course_video_upload" class="form-label"><strong>Do you have course videos ready to upload?</strong></label>
                <select name="has_course_video_upload" id="has_course_video_upload" class="form-control custom_input ">
                    <option value="{{$data->has_course_video_upload}}">{{$data->has_course_video_upload ?? 'Select Preferable Answer' }} </option>
                    <option value="Yes">Yes </option>
                    <option value="No">No</option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>Indicate whether you already have video lectures prepared and ready for upload.</i></label>
            </div>
            {{-- end  --}}
            <div class="mb-3">
                <label for="can_create_assignments" class="form-label"><strong>Can you create assignments for your course?</strong></label>
                <select name="can_create_assignments" id="can_create_assignments" class="form-control custom_input ">
                    <option value="{{$data->can_create_assignments}}">{{$data->can_create_assignments ?? 'Select Preferable Answer' }} </option>
                   <option value="Yes">Yes </option>
                    <option value="No">No  </option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>Assignments enhance student learning. Let us know if you’re able to provide them.</i></label>
            </div>
            {{-- end  --}}






          

            <div class="text-end mt-4">
               <a href="#"  onclick="window.history.back()"><button type="button" class="btn btn-outline-dark"> Go Back </button></a>
               <a href="{{route('instructor_request.technicale_setup')}}"><button type="button" class="btn btn-outline-warning"> Skip </button></a>
               <a href=""><button type="submit" class="btn btn-outline-success"> Save Information </button></a>
               <hr>
            </div>
        </form>
        {{-- form end  --}}

      

        </div>
    </div>
</div>


 
@endsection