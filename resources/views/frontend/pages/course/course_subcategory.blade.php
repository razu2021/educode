@extends('layouts.webmaster')
@section('website_contents')
{{-- search route --}}
@php
    $courseFilterURL = route('coursesubcategory', [
        $category_url,
        $subcategory_url,
    ]);
@endphp


@push('scriptssearch')
<script>
  const courseFilterURL = @json($courseFilterURL);
  const csrfToken = @json(csrf_token());
</script>
@endpush
{{-- search url end  --}}
{{-- breadcrumb --}}
@includeIf('frontend.pages.course.components.category_menu_com',compact('allcategorycourse'))
@includeIf('frontend.pages.course.components.course_banner',compact('bannerdata'))

@includeIf('frontend.pages.course.components.populer_topics_com',compact('populerTopics','category_url','subcategory_url'))


{{-- course and filters --}}
@if (!empty($all))
    <div class="section-padding">
    <div class="container">
          @includeIf('frontend.pages.course.components.count_filter_com',compact('totalcourse')) 
        <div class="row">
            <div class="col-lg-3">
                @includeIf('frontend.pages.course.components.course_filter_com',compact('allcategorycourse','CourseSubCategory','allchildCategory'))
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

{{-- @includeIf('frontend.pages.course.components.category_course_com')


@includeIf('frontend.pages.course.components.populer_topics_com')
@includeIf('frontend.pages.course.components.populer_teacher_com')

@includeIf('frontend.pages.course.components.all_course_com') --}}




@endsection
