@extends('layouts.webmaster')
@section('website_contents')

{{-- breadcrumb --}}
@includeIf('frontend.pages.course.components.course_banner')
@includeIf('frontend.pages.course.components.category_menu_com')

@includeIf('frontend.pages.course.components.category_course_com')


@includeIf('frontend.pages.course.components.populer_topics_com')
@includeIf('frontend.pages.course.components.populer_teacher_com')

@includeIf('frontend.pages.course.components.all_course_com')





{{-- breadcrumb end --}}

<section>
    <div class="container">
        <div class="row">
            @foreach ($allcategory as $allCate)
            <ul>
                <li>{{$allCate->course_category_name}}</li>
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
