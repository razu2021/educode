@extends('layouts.adminmaster')
@section('admin_contents')
    <main>
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Add new Item </h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="{{route('home_banner.add')}}">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('home_banner.all')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
          <form action="{{route('home_banner.submit')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h6 class="mb-0">Add information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                              
                                <!-- end -->
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="banner_title">Banner Title</label>
                                    <input class="form-control" name="banner_title" id="banner_title" type="text" value="{{old('banner_title')}}">
                                    <label class="text-danger fw-medium">@error('banner_title') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="heading">Banner Heading</label>
                                    <input class="form-control" name="banner_heading" id="heading" type="text" value="{{old('heading')}}">
                                    <label class="text-danger fw-medium">@error('heading') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="heading">Banner Caption</label>
                                    <input class="form-control" name="banner_caption" id="caption" type="text" value="{{old('caption')}}">
                                    <label class="text-danger fw-medium">@error('heading') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="button1">Banner Button 1</label>
                                    <input class="form-control" name="banner_button1" id="button1" type="text" value="{{old('button1')}}">
                                    <label class="text-danger fw-medium">@error('button1') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="button1_url">Banner Button 1 url</label>
                                    <input class="form-control" name="button1_url" id="button1_url" type="text" value="{{old('button1_url')}}">
                                    <label class="text-danger fw-medium">@error('button1_url') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="banner_button2">Banner Button 2</label>
                                    <input class="form-control" name="banner_button2" id="banner_button2" type="text" value="{{old('banner_button2')}}">
                                    <label class="text-danger fw-medium">@error('banner_button2') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="button2_url">Banner Button2 url</label>
                                    <input class="form-control" name="button2_url" id="button2_url" type="text" value="{{old('button2_url')}}">
                                    <label class="text-danger fw-medium">@error('button2_url') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="button2_url">Banner Image</label>
                                    <input class="form-control" name="images" id="button2_url" type="file" accept="image">
                                    <label class="text-danger fw-medium">@error('button2_url') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->



                         
                               
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
                            <h4 class="p-2"> Total Categorie's</h4>
                        </div>
                        <div class="card-body">
                          <div class="row  justify-content-center g-0">                       
                            <div class="col-auto position-relative">
                              <div class="echart-product-share" _echarts_instance_="ec_1743616191403" style="user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;">
                                <div style="position: relative; width: 106px; height: 106px; padding: 0px; margin: 0px; border-width: 0px; cursor: pointer;">
                                  <canvas data-zr-dom-id="zr_0" width="106" height="106" style="position: absolute; left: 0px; top: 0px; width: 106px; height: 106px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; background-color: rgb(249, 250, 253); border-width: 1px; border-radius: 4px; color: rgb(11, 23, 39); font: 14px / 21px ; padding: 7px 10px; top: 0px; left: 0px; transform: translate3d(-68px, 11px, 0px); border-color: rgb(216, 226, 239); pointer-events:none; visibility: hidden; opacity: 0"><strong>Sparrow:</strong> 20.65%</div></div>
                              <div class="position-absolute top-50 start-50 translate-middle text-1100 fs-7">{{ $totalpost}} N</div> 
                            </div>
                          </div>
                        </div>
                        <div class=" bg-body-tertiary text-center">
                          @if(!empty($latestPost->created_at))
                            <h6 class="p-2">Last Created At : {{ $latestPost->created_at->format('d M, Y - h:i A') }}</h6>
                          @else
                          <h6 class="p-2">Post is not Available </h6>
                          @endif
                        </div>
                      </div>
                      {{-- card end --}}
       

                      </div>
                    {{-- card end  --}}
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