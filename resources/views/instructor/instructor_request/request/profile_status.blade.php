@extends('layouts.instructormaster')
@section('instructor_contents')

<div class="card">
<div class="card-body overflow-hidden p-lg-6">
    <div class="row align-items-center">
    <div class="col-lg-6"><img class="img-fluid" src="{{asset('contents/backend/instructor/img/21.png')}}" alt="image"></div>
    <div class="col-lg-6 ps-lg-4 my-5 text-center text-lg-start">
        <h3 class="text-primary">Edit me!</h3>
        <p class="lead">Create Something Beautiful.</p><a class="btn btn-falcon-primary" href="{{route('instructor_documents.upload')}}">Getting started</a>
    </div>
    </div>
</div>
</div>

@endsection