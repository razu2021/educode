@extends('layouts.webmaster')
@section('website_contents')
{{-- search route --}}
@push('scriptssearch')
<script>
  const courseFilterURL = @json(route('allcoursecategory'));
  const csrfToken = @json(csrf_token());
</script>
@endpush
{{-- search url end  --}}
{{-- breadcrumb --}}
@includeIf('frontend.pages.course.components.category_menu_com',compact('allcategorycourse'))
@includeIf('frontend.pages.course.components.course_banner')
{{-- course and filters --}}
<div class="section-padding">
    <div class="container">
          @includeIf('frontend.pages.course.components.count_filter_com',compact('totalcourse')) 
        <div class="row">
            <div class="col-lg-3">
                @includeIf('frontend.pages.course.components.course_filter_com',compact('allcategorycourse','CourseSubCategory'))
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
{{-- course and  design by md razu hossain raj filter end  --}}
@endsection
