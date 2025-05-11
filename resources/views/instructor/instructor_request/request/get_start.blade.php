@extends('dashboard')
@section('instructor_request_content')
<!-- Main Content Start -->

<form action="{{route('instructor_request.submit')}}" method="post" enctype="multipart/form-data">
    @csrf
<section class="main-section container">
    <h1>Welcome to Your Instructor Dashboard</h1>
    <p>Start creating your first course and share your knowledge with the world.</p>
    <button class="btn-get-started" type="submit">+ Get Started</button>
</section>
</form>


@endsection