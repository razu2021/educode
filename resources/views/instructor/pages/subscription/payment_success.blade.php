@extends('layouts.instructormaster')
@section('instructor_contents')
  

<div class="text-center p-5">
    <h2 class="text-success">Payment Successful!</h2>
    <p>Your subscription was successful. Welcome aboard!</p>
    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Go to Dashboard</a>
</div>

@endsection