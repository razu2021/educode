@extends('layouts.instructormaster')
@section('instructor_contents')
    <main>
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Update a Categorie</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="#" onclick="window.history.back()">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('ins_course_price.all_course_price')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
          <form action="{{route('ins_course_price.update')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h6 class="mb-0">Update Price Information </h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                                {{-- category end --}}
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="course_name">Course Name: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="course_name" id="course_name" type="text" value="{{$data->courseinfo->course_name ?? 'No Data Available'}}" disabled>
                                     <input class="form-control" name="id" id="id" type="hidden" value="{{$data->id}}">
                                     <input class="form-control" name="slug" id="slug" type="hidden" value="{{$data->slug}}">
                                    <input class="form-control" name="course_id" id="course_id" type="hidden" value="{{$data->id}}" >
                                    <label class="text-danger fw-medium">@error('course_name') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="original_price">Original Price: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="original_price" id="original_price" type="text" value="{{$data->original_price}}">
                                    <label class="text-danger fw-medium">@error('original_price') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="discounted_price">Discount Price: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="discounted_price" id="discounted_price" type="text" value="{{$data->discounted_price ?? ''}}">
                                    <label class="text-danger fw-medium">@error('discounted_price') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="pricing_type">Pricing Type: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <select name="pricing_type" id="pricing_type" class="form-control">
                                      <option value="{{$data->pricing_type}}">{{$data->pricing_type}}</option>
                                      <option value="subscription">Subscription</option>
                                      <option value="one_time">One Time</option>
                                    </select>
                                    <label class="text-danger fw-medium">@error('pricing_type') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="pricing_type">Currency Type: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <select name="currency" id="currency" class="form-control">
                                      <option value="{{$data->currency}}">{{$data->currency}}</option>
                                      <hr>
                                      <option value="BDT">BDT</option>
                                      <option value="USD">USD</option>
                                    </select>
                                    <label class="text-danger fw-medium">@error('currency') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                               
                                {{-- end --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="start_date">Discount Start Date  <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="start_date" id="start_date" type="date" value="{{$data->start_date ?? ''}}">
                                    <label class="text-danger fw-medium">@error('start_date') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="end_date">Discount End Date  <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="end_date" id="end_date" type="date" value="{{$data->end_price}}"">
                                    <label class="text-danger fw-medium">@error('end_date') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                            </div>
                        </div>
                      </div>
                </div>
                {{-- card end --}}
            </div> 
            {{-- row end  --}}
            <div class="row mx-2">
              <div class="card mt-3 ">
                <div class="card-body mx-4">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Your're Almost Done</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary " role="button"> Submit information </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
            {{-- form end --}}
        </div>
    </main>

  
@endsection