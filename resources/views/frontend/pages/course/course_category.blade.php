@extends('layouts.webmaster')
@section('website_contents')


{{-- breadcrumb --}}
@includeIf('frontend.pages.course.components.course_banner')
{{-- @includeIf('frontend.pages.course.components.category_menu_com',compact('allcategorycourse')) --}}



@includeIf('frontend.pages.course.components.populer_topics_com')
@includeIf('frontend.pages.course.components.populer_teacher_com')


{{-- course and filters --}}
@if (!empty($all))
    <div class="section-padding">
    <div class="container">
          @includeIf('frontend.pages.course.components.count_filter_com',compact('totalcourse')) 
        <div class="row">
            <div class="col-lg-3">
                @includeIf('frontend.pages.course.components.course_filter_com',compact('allcategorycourse'))
            </div>
            <div class="col-lg-9">
                <div id="courseCardData">
                    @includeIf('frontend.pages.course.components.course_card3',compact('all'))
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endif
{{-- course and  design by md razu hossain raj filter end  --}}




{{-- breadcrumb end --}}







@endsection
