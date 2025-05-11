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
            <h1>How did you hear about us?</h1>
        {{-- form start  --}}
            <form action="{{route('instructor_request.find_us_update')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><i>This helps us understand how instructors discover us and improve our outreach. We'd appreciate knowing where you heard about us.</i></label>
                <input type="text"  class="form-control custom_input " name="sourcing" id="sourcing" value="{{ $data->sourcing ?? '' }}">
            </div>
          

            <div class="text-end mt-4">

               <a href="#" onclick="window.history.back()"><button type="button" class="btn btn-outline-dark"> Go Back </button></a>
               <a href="{{route('instructor_request.category')}}"><button type="button" class="btn btn-outline-warning"> Skip </button></a>
               <a href=""><button type="submit" class="btn btn-outline-success"> Save Information </button></a>
               <hr>
            </div>
        </form>
        {{-- form end  --}}

      

        </div>
    </div>
</div>


 
@endsection