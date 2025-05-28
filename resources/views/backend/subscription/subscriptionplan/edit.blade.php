@extends('layouts.adminmaster')
@section('admin_contents')
    <main>
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Update a Categorie</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="{{route('subscriptionplan.add')}}">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('subscriptionplan.all')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
          <form action="{{route('subscriptionplan.update')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h6 class="mb-0">Update Categorie information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                                {{-- input hidden --}}
                                <input class="form-control" name="id" id="id" type="hidden" value="{{$data->id}}">
                                <input class="form-control" name="slug" id="slug" type="hidden" value="{{$data->slug}}">
                                {{-- input hidden --}}
                              
                                <!-- end -->
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="plan_for"> Plan for : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <select class="form-control" name="plan_for" id="plan_for">
                                      <option value="{{$data->plan_for}}">{{$data->plan_for}}</option>
                                      <option value="instructor" {{ old('plan_for') == 'instructor' ? 'selected' : '' }}>Instructor</option>
                                      <option value="student"  {{ old('plan_for') == 'student' ? 'selected' : '' }}>Student</option>
                                    </select>
                                    <label class="text-danger fw-medium">@error('plan_for') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-4 mb-1">
                                    <label class="form-label" for="title">Plan Name : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="name" id="name" type="text" value="{{$data->name}}">
                                    <label class="text-danger fw-medium">@error('name') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                                <div class="col-4 mb-1">
                                    <label class="form-label" for="price">Plan Price : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="price" id="price" type="text" value="{{$data->price}}">
                                    <label class="text-danger fw-medium">@error('price') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                                <div class="col-4 mb-1">
                                    <label class="form-label" for="interval">Plan Interval : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="interval" id="interval" type="text" value="{{$data->interval}}">
                                    <label class="text-danger fw-medium">@error('interval') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="course_limit">Course Limit : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="course_limit" id="course_limit" type="number" value="{{$data->course_limit}}">
                                    <label class="text-danger fw-medium">@error('course_limit') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="plan_type">Plan Type : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <select class="form-control" name="plan_type" id="plan_type">
                                      <option value="{{$data->plan_type}}">{{$data->plan_type}}</option>
                                      <option value="0" {{ old('plan_type') == '0' ? 'selected' : '' }}>Free Subscription</option>
                                      <option value="1" {{ old('plan_type') == '1' ? 'selected' : '' }}>Paid Subscription</option>
                                    </select>
                                    <label class="text-danger fw-medium">@error('plan_type') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                               <div class="col-12 mb-1">
                                    <label class="form-label" for="features">Plan Features : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <textarea class="form-control" name="features" id="description" cols="10" value="{{$data->features}}">{!! $data->features !!}</textarea>
                                    <label class="text-danger fw-medium">@error('features') {{$message}} @enderror</label>
                                </div>
                                {{-- end  --}}
                                
                                
                            </div>
                        </div>
                      </div>
                </div>
                {{-- card end --}}
                <div class="col-lg-4 ">
                  <div class="sidebar_wrapper">
                    <div class="sidebar_card">
                        <div class="card mb-4">
                          <div class="sidebar_header bg-body-tertiary">
                            <h4 class="p-2"> Categorie's information</h4>
                        </div>
                        <div class="card-body">
                          <div class="row  justify-content-center g-0">                       
                            <div class="col-auto position-relative">
                              <div class="echart-product-share" _echarts_instance_="ec_1743616191403" style="user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"><div style="position: relative; width: 106px; height: 106px; padding: 0px; margin: 0px; border-width: 0px; cursor: pointer;"><canvas data-zr-dom-id="zr_0" width="106" height="106" style="position: absolute; left: 0px; top: 0px; width: 106px; height: 106px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; background-color: rgb(249, 250, 253); border-width: 1px; border-radius: 4px; color: rgb(11, 23, 39); font: 14px / 21px Microsoft YaHei; padding: 7px 10px; top: 0px; left: 0px; transform: translate3d(-68px, 11px, 0px); border-color: rgb(216, 226, 239); pointer-events: none; visibility: hidden; opacity: 0;"><strong>Sparrow:</strong> 20.65%</div></div>
                              <div class="position-absolute top-50 start-50 translate-middle text-1100 fs-7">{{ $data->id}} </div> 
                            </div>
                          </div>
                        </div>
                        <div class=" bg-body-tertiary text-center">
                          @if(!empty($data->updated_at))
                            <h6 class="p-2">Last Updated At : {{ $data->updated_at->format('d M, Y - h:i A') }}</h6>
                          @else
                          <h6 class="p-2">Not Update Data !</h6>
                          @endif
                        </div>
                      </div>

                  </div>
                </div>
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