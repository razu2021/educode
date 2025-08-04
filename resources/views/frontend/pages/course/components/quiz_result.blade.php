@extends('layouts.webmaster')
@section('website_contents')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg result-box p-4">
                <div class="text-center">
                    <img src="{{ asset('contents/frontend/assets/assetss/images/course/i1.jpg') }}" alt="Profile" class="rounded-circle mb-3" style="width: 8rem; height: 8rem; object-fit: cover;">
                    @if($isResult > $wrong && $correct > $wrong)
                        <h2 class="text-success fw-bold">Congratulations!</h2>
                         <h4>{{Auth::user()->name ?? 'No Name Found !'}}</h4>
                        <p class="lead text-muted">You've completed the quiz successfully.</p>
                    @else 
                        <h2 class="text-danger fw-bold">Opps! So Sad </h2>
                         <h4>{{Auth::user()->name ?? 'No Name Found !'}}</h4>
                        <p class="lead text-muted">You'r Faild the quiz. Please try Again Letter</p>
                    @endif
                   
                </div>

                <div class="result-summary my-4 px-3">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="p-3 border rounded bg-light">
                                <h4 class="text-success fw-bold">Correct</h4>
                                <p class="fs-3 fw-bold text-dark">{{$correct ?? '0'}}</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 border rounded bg-light">
                                <h4 class="text-danger fw-bold">Wrong</h4>
                                <p class="fs-3 fw-bold text-dark">{{$wrong ?? '0' }}</p>
                            </div>
                        </div>
                    </div>
                </div>


                @if($isResult > $wrong && $correct > $wrong)
                <div class="text-center mt-4">
                    <a href="{{route('quize.test_again',[$data->id,$data->slug])}}" class="btn btn-outline-warning px-4 py-2 rounded-pill shadow-sm">
                        Test Again 
                    </a>
                    <a href="{{route('quize.result_download',[$data->id,$data->slug])}}" class="btn btn-outline-primary px-4 py-2 rounded-pill shadow-sm">
                        Result Download 
                    </a>
                </div>
                @else 
                <div class="text-center mt-4">
                    <a href="{{route('quize.test_again',[$data->id,$data->slug])}}" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
                         Test Again 
                    </a>
                </div>
                @endif


              

            </div>

        </div>
    </div>
</div>
@endsection