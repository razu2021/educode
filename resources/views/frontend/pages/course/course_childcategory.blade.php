@extends('layouts.webmaster')
@section('website_contents')

{{-- breadcrumb --}}
@includeIf('frontend.pages.course.components.course_banner')
@includeIf('frontend.pages.course.components.category_menu_com')

@includeIf('frontend.pages.course.components.category_course_com')


@includeIf('frontend.pages.course.components.populer_topics_com')
@includeIf('frontend.pages.course.components.populer_teacher_com')

@includeIf('frontend.pages.course.components.all_course_com')



@endsection
