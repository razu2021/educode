@extends('layouts.instructormaster')
@section('instructor_contents')

<div class="container card  py-4" id="recentPurchaseTable" data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;email&quot;,&quot;product&quot;,&quot;payment&quot;,&quot;amount&quot;],&quot;page&quot;:8,&quot;pagination&quot;:true}">
         
  {{-- search end  --}}
  <div class="row flex-between-center mb-4">
      <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
      <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">All Course Price Infomations </h5>
      </div>
      <div class="col-6 col-sm-auto ms-auto text-end ps-0">
      <div id="table-purchases-replace-element" class="d-flex align-items-center">
          <!-- New Button -->
          <a href="{{route('ins_course_content.all')}}">
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

          {{-- coupon section --}}
         @if(!empty($data->CourseModule))
            <div>
              <h6>{{$data->CourseModule->title ?? 'No Title'}}</h6>
              <p> .... </p>
            </div>
          @else
            <h6 class="text-info mb-3">No Data Available </h6>
          @endif
          {{-- coupon section  --}}

          
        @if($data->CourseModule == '')
            <a class="btn btn-sm btn-outline-primary w-100" href="{{route('ins_course_content.add',[$data->id, $data->slug])}}"> Create Module </a>
        @else 
          <div class="d-flex justify-content-around ">
          <a class="btn btn-sm btn-outline-primary w-50 mx-1" href="{{route('ins_course_content.edit',[$data->CourseModule->id, $data->CourseModule->slug])}}"> Edit  </a>
          <a class="btn btn-sm btn-outline-info w-50  mx-1" href="{{route('ins_course_content.view',[$data->CourseModule->id, $data->CourseModule->slug])}}"> View  </a>
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