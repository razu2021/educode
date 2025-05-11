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
            <h1>Select your skill category.</h1>
           
        {{-- form start  --}}
            <form action="{{route('instructor_request.category_update')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><i>Select one or more categories that match your expertise. This helps learners discover your courses more easily.</i></label>
                <select name="category" id="category" class="form-control custom_input">
                    <option value="{{$data->category}}"> {{$data->category ?? 'Choose your Category'}}</option>
                    @foreach ($category as $allcate)
                       <option value="{{$allcate->course_category_name}}">{{$allcate->course_category_name}}</option>
                    @endforeach
                    <option value="other">Other</option>
                </select>
            </div>
          

            <div class="text-end mt-4">

               <a href="#"  onclick="window.history.back()"><button type="button" class="btn btn-outline-dark"> Go Back </button></a>
               <a href="{{route('instructor_request.education')}}"><button type="button" class="btn btn-outline-warning"> Skip </button></a>
               <a href=""><button type="submit" class="btn btn-outline-success"> Save Information </button></a>
               <hr>
            </div>
        </form>
        {{-- form end  --}}

      

        </div>
    </div>
</div>


 
@endsection