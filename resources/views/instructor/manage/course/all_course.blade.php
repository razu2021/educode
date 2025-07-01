@extends('layouts.instructormaster')
@section('instructor_contents')

<div class="container  py-4" id="recentPurchaseTable" data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;email&quot;,&quot;product&quot;,&quot;payment&quot;,&quot;amount&quot;],&quot;page&quot;:8,&quot;pagination&quot;:true}">
          <div class="searchess mb-4 ">
          <div class="row">
            <div class="col-md-12 ">
                <form action="" method="get">
                  <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    <a href="{{route('ins_course.all')}}"><button class="btn btn-outline-primary" type="button">Reset</button></a>
                  </div>
                </form>
            </div>
            {{-- col end --}}
          </div>
          <!-- ক্যাটেগরি ডেটা টেবিল -->
        </div>
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
                    <span class="d-none d-sm-inline-block ms-1">Manage All Course's</span>
                </button>
                </a>
                <!-- Export Button -->
            </div>
            </div>
        </div>
        <hr>
    <div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mb-4">
        <a href="{{ route('ins_course.add') }}" class="text-decoration-none">
        <div class="card h-100 border-0 shadow-sm hover-shadow bg-light text-center p-4 d-flex flex-column justify-content-center align-items-center" style="transition: 0.3s ease;">
            <div class="mb-3">
            <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                <i class="fas fa-plus fa-lg"></i>
            </div>
            </div>
            <h5 class="mb-1 text-dark">Add New Course</h5>
            <p class="text-muted small">Click here to create and publish a new course</p>
        </div>
        </a>
    </div>

    @foreach ($all as $data )
    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mb-4">
      <div class="card h-100 shadow-sm border-0">
        <!-- Optional Dropdown -->
        <div class="card-header bg-white d-flex justify-content-between align-items-center pb-0 pt-2 border-0">

          <h6 class="mb-0"><td class="align-middle" style="width: 28px;">Manage  </h6>
          <div class="dropdown">
            <button class="btn btn-link text-muted btn-sm dropdown-toggle dropdown-caret-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-ellipsis-h"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">View</a></li>
              <li><a class="dropdown-item" href="#">Export</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="#">Remove</a></li>
            </ul>
          </div>
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

           <p>Public Status : <strong> Public </strong> </p>
          
        @if($data->public_status === 0)
            <a class="btn btn-sm btn-outline-primary w-100" href="{{route('ins_course.public',[$data->id, $data->slug])}}"> Publish</a>
        @else 
            <a class="btn btn-sm btn-outline-danger w-100" href="{{route('ins_course.private',[$data->id, $data->slug])}}"> Private</a>
        @endif 
        </div>
      </div>
    </div>

    {{-- col end  --}}
        @endforeach
  </div>
</div>


@endsection