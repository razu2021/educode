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
         
        {{-- form start  --}}
            <form action="{{route('instructor_request.education_update')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label for="last_education" class="form-label"><i>What is the highest degree or course you have completed? Example: B.Sc in Computer Science, Diploma in Graphic Design, etc.</i></label>
                <input type="text"  class="form-control custom_input " name="last_education" id="last_education" value="{{ $data->last_education ?? '' }}">
            </div>
          
            <div class="mb-3">
                <label for="location" class="form-label"><i>Where are you currently based (city and country)? This helps us communicate effectively and provide relevant location-based support.</i></label>
                <input type="text"  class="form-control custom_input " name="location" id="location" value="{{ $data->location ?? '' }}">
            </div>
          
            <div class="mb-3">
                <label for="daily_available_hours" class="form-label"><i>Please mention how many hours per day you can commit to preparing courses or assisting students. (e.g., 2–3 hours in the evening)</i></label>
                <input type="text"  class="form-control custom_input " name="daily_available_hours" id="daily_available_hours" value="{{ $data->daily_available_hours ?? '' }}">
            </div>
          

            <div class="text-end mt-4">

               <a href="#"  onclick="window.history.back()"><button type="button" class="btn btn-outline-dark"> Go Back </button></a>
               <a href="{{route('instructor_request.teaching_ex')}}"><button type="button" class="btn btn-outline-warning"> Skip </button></a>
               <a href=""><button type="submit" class="btn btn-outline-success"> Save Information </button></a>
               <hr>
            </div>
        </form>
        {{-- form end  --}}

      

        </div>
    </div>
</div>


 
@endsection