@extends('layouts.webmaster')
@section('website_contents')




  <!-- **************** MAIN CONTENT START **************** -->
  <main>

    

  {{--  Breadcrumb --}}
  @include('frontend/pages/course/components/index/banner1',compact('bannerdata'))
    {{-- section heading  --}}
  @include('frontend/pages/course/components/index/section_heading',[
      'heading' => 'All the skills you need in one place',
      'title' => "Empower yourself with in-demand skills, taught by industry experts. Whether you're starting fresh or advancing your career, everything you need is right here — in one powerful platform.",
      'section'=>'section1'
 ])
  {{-- section heading  --}}

  @include('frontend/pages/course/components/index/why_chose')
  {{-- info card end  --}}




{{-- course start here  --}}
@include('frontend/pages/course/components/index/course1',compact('topcourses','trandingcourses','latestcourse','freecourse'))
{{-- --- course end here  --}}

@include('frontend/pages/course/components/index/category_section',compact('allcategorys'))
{{-- course category section end --}}


{{--   instructor card design  --}}
@include('frontend/pages/course/components/index/profile1',compact('instructors'))

{{--  testimonila end here  --}}
@include('frontend/pages/course/components/index/review1',compact('reviews'))

{{--  testimonila end here  --}}
@include('frontend/pages/course/components/index/post1',compact('posts'))




{{--  faq use start here  --}}
@include('frontend/pages/course/components/index/faq1',compact('faqs'))


@include('frontend/pages/course/components/index/signup1')
@include('frontend/pages/course/components/index/subscriber1')


{{-- instructor and student join end here  --}}




  </main>


    <!-- **************** MAIN CONTENT END **************** -->





















@endsection
