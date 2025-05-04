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
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="{{route('coursecategory.add')}}">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('coursecategory.all')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
          <form action="{{route('coursecategory.update')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h6 class="mb-0">Update Categorie information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                             
                                <input class="form-control" name="id" id="id" type="hidden" value="{{$data->id}}">
                                <input class="form-control" name="slug" id="slug" type="hidden" value="{{$data->slug}}">
                                {{-- input hidden --}}
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="course_category_name">Categorie Name:</label>
                                    <input class="form-control" name="course_category_name" id="course_category_name" type="text" value="{{$data->course_category_name}}">
                                    <label class="text-danger fw-medium">@error('course_category_name') {{$message}} @enderror</label>
                                </div>
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="course_category_title">Categorie Title:</label>
                                    <input class="form-control" name="course_category_title" id="course_category_title" type="text" value="{{$data->course_category_title}}">
                                    <label class="text-danger fw-medium">@error('course_category_title') {{$message}} @enderror</label>
                                </div>
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="course_category_desc">Categorie Descriptions:</label>
                                    <input class="form-control" name="course_category_desc" id="course_category_desc" type="text" value="{{$data->course_category_des}}">
                                    <label class="text-danger fw-medium" >@error('course_category_desc') {{$message}} @enderror</label>
                                </div>
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
                              <div class="echart-product-share" _echarts_instance_="ec_1743616191403" style="user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"><div style="position: relative; width: 106px; height: 106px; padding: 0px; margin: 0px; border-width: 0px; cursor: pointer;"><canvas data-zr-dom-id="zr_0" width="106" height="106" style="position: absolute; left: 0px; top: 0px; width: 106px; height: 106px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; background-color: rgb(249, 250, 253); border-width: 1px; border-radius: 4px; color: rgb(11, 23, 39); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 7px 10px; top: 0px; left: 0px; transform: translate3d(-68px, 11px, 0px); border-color: rgb(216, 226, 239); pointer-events: none; visibility: hidden; opacity: 0;"><strong>Sparrow:</strong> 20.65%</div></div>
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
                      <div class="card">
                          <div class="card-body">
                            <div class="col-12">
                              <label class="form-label" for="custom_url">URL/Slug:</label>
                              <input class="form-control" name="custom_url" id="custom_url" type="text" value="{{$data->url}}">
                              
                            </div>
                          </div>
                      </div>
                   
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