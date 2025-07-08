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
            $startDate = $data->coursePrice->start_date ?? null ;
            $endDate = $data->coursePrice->end_date ?? null ;
            $currency = $data->coursePrice->currency ?? 'BDT' ;
            $today = \Carbon\Carbon::now();

            $isDiscountActive  = false;

            if(!empty($discount) && $discount > 0){
              if(empty($startDate) && empty($endDate)){
                $isDiscountActive = true ;
              }elseif (!empty($startDate) && empty($endDate)) {
                 $isDiscountActive = $today->gte($startDate) ;
              }elseif (empty($startDate) && !empty($endDate)) {
                $isDiscountActive = $today->lte($endDate) ;
              }elseif (!empty($startDate) && !empty($endDate)) {
                 $isDiscountActive = $today->between($startDate,$endDate) ;
              }
            }
           
          @endphp 

          @if (!$isDiscountActive)
            <h5 class="text-primary mb-3">{{ number_format($price, 2) }} {{ $currency }}</h5>
            <h6 class="text-info text-muted mb-3"><strong> Original Price: </strong>{{ number_format($price, 2) }} {{ $currency }}</h6>
            <h6 class="text-info text-muted mb-3"><strong> Discount Price: </strong>{{ number_format($discount, 2) }} {{ $currency }}</h6>
            <h6 class="text-info text-muted mb-3"><strong>Discount Start at:</strong>  <del class="text-danger">{{ \Carbon\Carbon::parse($startDate)->format('d M, Y') }}</del></h6>
            <h6 class="text-info text-muted mb-3"><strong>Discount end at:</strong>  <del class="text-danger">{{ \Carbon\Carbon::parse($endDate)->format('d M, Y') }} </del></h6>
          @else
            @php 
              $finalprice = $price - $discount ; 
            @endphp 
              <h5 class="text-primary mb-3">
                {{ number_format($finalprice, 2) }} {{ $currency }}
                <span class="text-danger fs-9"><del>{{ number_format($price, 2) }}</del></span>
              </h5>
            <h6 class="text-info text-muted mb-3"><strong> Original Price: </strong>{{ number_format($price, 2) }} {{ $currency }}</h6>
            <h6 class="text-info text-muted mb-3"><strong> Discount Price: </strong>{{ number_format($discount, 2) }} {{ $currency }}</h6>
             <h6 class="text-info text-muted mb-3"><strong>Discount Start at:</strong>  {{ \Carbon\Carbon::parse($startDate)->format('d M, Y') }}</h6>
            <h6 class="text-info text-muted mb-3"><strong>Discount end at:</strong>  {{ \Carbon\Carbon::parse($endDate)->format('d M, Y') }}</h6>
            

          @endif
          @else
              <h5 class="text-primary mb-3">00.00 BDT</h5>
          @endif

          
        @if($data->coursePrice == '')
            <a class="btn btn-sm btn-outline-primary w-100" href="{{route('ins_course_price.add',[$data->id, $data->slug])}}"> Create Price </a>
        @else 
           <div class="d-flex justify-content-around ">
            <a class="btn btn-sm btn-outline-primary w-50 mx-1" href="{{route('ins_course_price.edit',[$data->coursePrice->id, $data->coursePrice->slug])}}"> Edit Price </a>
            <a class="btn btn-sm btn-outline-info w-50  mx-1" href="{{route('ins_course_price.view',[$data->coursePrice->id, $data->coursePrice->slug])}}"> View Details </a>
           </div>
        @endif 
        </div>
      </div>
    </div>

    {{-- col end  --}}
        @endforeach
  </div>
</div>


@endsection