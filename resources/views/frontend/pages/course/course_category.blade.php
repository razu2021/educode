@extends('layouts.webmaster')
@section('website_contents')

<h1>Course categor paage </h1>


<section>
    <div class="container">
        <div class="row">
            @foreach ($allcategory as $allCate)
            <ul>
                <li>{{$allCate->}}</li>
            </ul>
                @foreach ($allCate->CourseCategorys as $allCourse)
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{$allCourse->course_name}}</h5>
                    <p class="card-text">{{$allCourse->course_des}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                @endforeach
               

            @endforeach
           

        </div>
    </div>
</section>





@endsection
