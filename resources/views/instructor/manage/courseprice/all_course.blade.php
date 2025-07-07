@extends('layouts.instructormaster')
@section('instructor_contents')

<div class="container card  py-4" id="recentPurchaseTable" data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;email&quot;,&quot;product&quot;,&quot;payment&quot;,&quot;amount&quot;],&quot;page&quot;:8,&quot;pagination&quot;:true}">
         
  {{-- search end  --}}
  <div class="row flex-between-center mb-4">
      <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
      <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">All Course Infomations </h5>
      </div>
      <div class="col-6 col-sm-auto ms-auto text-end ps-0">
      <div id="table-purchases-replace-element" class="d-flex align-items-center">
          <!-- New Button -->
          <a href="{{route('ins_course.all')}}">
          <button class="btn btn-falcon-default btn-sm" type="button">
              <i class="bi bi-sliders"></i>
              <span class="d-none d-sm-inline-block ms-1">Manage All Prices</span>
          </button>
          </a>
          <!-- Export Button -->
      </div>
      </div>
  </div>
        <hr>
    <div class="row">
    @foreach ($all as $data )
    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mb-4">
      <div class="card h-100 shadow-sm border-0">
        
       
        <img src="{{asset('uploads/website/'.$data->course_image)}}" class="card-img-top" alt="Course Image" style="height: 15rem;padding:0rem 1rem;border-radius:1rem">
        
        <!-- Course Info -->

        <div class="card-body">
           
          <h5 class="card-title">{{$data->course_name}}</h5>
          <p>{{$data->course_desc}}</p>
       
          @if(!empty($data->coursePrice))

          @php 
            $price = $data->coursePrice->original_price ?? 0 ;
            $discount = $data->coursePrice->discounted_price ?? null ;
            $start = $data->coursePrice->start_date ?? null ;
            $end = $data->coursePrice->end_date ?? null ;
            $currency = $data->coursePrice->currency ?? 'BDT' ;
            $today = \Carbon\Carbon::now();

            $isDateValid = false;

           if($startDate && $endDate) {
                $isDateValid = $today->between($startDate, $endDate);
            } elseif(!$startDate && !$endDate) {
                $isDateValid = true;  // Discount without date = always active
            }
          @endphp 

          @if (empty($discount) || $discount == 0)
            <h5 class="text-primary mb-3">{{ number_format($price, 2) }} {{ $currency }}</h5>
          @else
            @php 
              $finalprice = $price - $discount ; 
            @endphp 
              <h5 class="text-primary mb-3">
                {{ number_format($finalprice, 2) }} {{ $currency }}
                <span class="text-danger fs-9"><del>{{ number_format($price, 2) }}</del></span>
              </h5>

          @endif





          
         
          
            {{-- <h5 class="text-primary mb-3">{{ $data->coursePrice->original_price - $data->coursePrice->discounted_price }} {{ $data->coursePrice->currency }} <span class="text-danger fs-9"><del>{{$data->coursePrice->original_price}}</del></span></h5>
            <h6 class="text-info text-muted mb-3"><strong> Original Price: </strong>{{ $data->coursePrice->original_price }} {{ $data->coursePrice->currency }}</h6>
            <h6 class="text-info text-muted mb-3"><strong> Discount Price: </strong>{{ $data->coursePrice->discounted_price }} {{ $data->coursePrice->currency }}</h6>
            <h6 class="text-info text-muted mb-3"><strong> Discount start at: </strong>{{ $data->coursePrice->start_date }} </h6>
            <h6 class="text-info text-muted mb-3"><strong> Discount end at: </strong>{{ $data->coursePrice->end_date }} </h6>
             --}}
          @else
              <h5 class="text-primary mb-3">00.00 BDT</h5>
          @endif

          
        @if($data->coursePrice == '')
            <a class="btn btn-sm btn-outline-primary w-100" href="{{route('ins_course_price.add',[$data->id, $data->slug])}}"> Create Price </a>
        @else 
            <a class="btn btn-sm btn-outline-danger w-100" href="{{route('ins_course_price.edit',[$data->id, $data->slug])}}"> Edit Price </a>
        @endif 
        </div>
      </div>
    </div>

    {{-- col end  --}}
        @endforeach
  </div>
</div>


@endsection