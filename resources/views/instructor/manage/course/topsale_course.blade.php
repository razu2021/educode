@extends('layouts.instructormaster')
@section('instructor_contents')



@if (!empty($all) && $all->count() > 0)
<div class="container  py-4" id="recentPurchaseTable" data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;email&quot;,&quot;product&quot;,&quot;payment&quot;,&quot;amount&quot;],&quot;page&quot;:8,&quot;pagination&quot;:true}">
 {{-- search end  --}}
<div class="row flex-between-center mb-4">
    <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
    <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">All Top Sale Course </h5>
    </div>
    <div class="col-6 col-sm-auto ms-auto text-end ps-0">
    <div id="table-purchases-replace-element" class="d-flex align-items-center">
        <!-- New Button -->
        <a href="{{route('ins_course.all')}}">
        <button class="btn btn-falcon-default btn-sm" type="button">
            <i class="bi bi-sliders"></i>
            <span class="d-none d-sm-inline-block ms-1">Manage All Course's</span>
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
        <!-- Optional Dropdown -->
        <div class="card-header bg-white d-flex justify-content-between align-items-center pb-0 pt-2 border-0">

          
        </div>
        <!-- Course Image -->
        <img src="{{asset('uploads/website/'.$data->course_image)}}" class="card-img-top" alt="Course Image" style="height: 20rem;padding:0rem 1rem;border-radius:1rem">
        
        <!-- Course Info -->

        <div class="card-body">
           
          <h5 class="card-title">{{$data->course_name}}</h5>
          <p></p>
        @if (!empty($data->username))
            <p class="card-text mb-1 text-muted">{{$data->username->name}}</p>
        @endif
          

          <div class="d-flex align-items-center mb-2">
            <span class="text-warning me-1">&#9733;&#9733;&#9733;&#9733;&#189;</span>
            <small class="text-muted">(4.7)</small>
          </div>
          <h6 class="text-primary mb-3">$12.99</h6>
            <a class="btn btn-sm btn-outline-primary w-100" href="{{route('ins_course.view',[$data->id, $data->slug])}}"> View Details</a>
        </div>
      </div>
    </div>

    {{-- col end  --}}
    @endforeach




  </div>
</div>
@else
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm border-0 text-center p-4">
                <div class="card-body">
                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076508.png" alt="No Data" class="img-fluid mb-4" style="max-width: 150px;">
                    <h5 class="card-title mb-3">No Active Course Available</h5>
                    <p class="card-text text-muted mb-4">
                        Sorry! There are no courses currently available for display. Please check back later or create a new course.
                    </p>
                    {{-- <a href="{{ route('ins_course.add') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Create New Course
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endif






@endsection