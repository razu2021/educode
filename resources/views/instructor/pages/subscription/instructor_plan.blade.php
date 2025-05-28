@extends('layouts.instructormaster')
@section('instructor_contents')
  <style>
    .card {
      border-radius: 1rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .popular {
      border: 2px solid #0d6efd;
      box-shadow: 0 0 10px rgba(13, 110, 253, 0.2);
      position: relative;
    }

    .popular::before {
      content: 'Most Popular';
      position: absolute;
      top: -12px;
      left: 50%;
      transform: translateX(-50%);
      background: #0d6efd;
      color: #fff;
      padding: 2px 10px;
      border-radius: 12px;
      font-size: 0.75rem;
      font-weight: bold;
    }
  </style>
<div class="container py-5">
    <h2 class="text-center mb-4">Instructor Subscription Plans</h2>
    <div class="row g-4 justify-content-center">
      
      <!-- Free Plan -->
      
        @foreach ($allplan as $data)
                <!-- Popular Plan -->
            <div class="col-md-6 col-lg-4">
                <div class="card text-center p-4 popular">
                <h5 class="card-title">{{$data->name}}</h5>
                <h2 class="card-price mb-3">BDT {{$data->price}}<span class="text-muted fs-6">/{{$data->interval}}</span></h2>
                <ul class="list-unstyled mb-4">
                    <li>✔ 10 Course Uploads</li>
                    <li>✔ Priority Support</li>
                    <li>✔ Analytics Access</li>
                </ul>
                <a href="{{route('instructor_paln_checkout',[$data->id,$data->slug])}}" class="btn btn-primary">Choose Plan</a>
                </div>
            </div>

        @endforeach

     

    </div>
  </div>

@endsection