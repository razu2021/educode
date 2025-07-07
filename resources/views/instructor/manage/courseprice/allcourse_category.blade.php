@extends('layouts.instructormaster')
@section('instructor_contents')
<div class="container py-4">
    <div class="row">
        @foreach($all as $category)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card shadow-sm border-0 h-100 text-center p-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="bi bi-folder2-open display-4 text-primary"></i>
                        </div>
                        <h5 class="card-title mb-2">{{ $category->course_category_name }}</h5>
                        <p class="text-muted small mb-3">
                            {{ Str::limit($category->description, 60) ?? 'No description available.' }}
                        </p>
                        <span class="badge bg-primary mb-2">
                            {{ $category->courses_count }} {{ Str::plural('Course', $category->courses_count) }}
                        </span>
                        <a href="" class="btn btn-sm btn-outline-primary w-100 mt-2">
                            View Courses
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection


