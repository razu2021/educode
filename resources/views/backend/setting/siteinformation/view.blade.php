@extends('layouts.adminmaster')
@section('admin_contents')
    <main>
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Information Detail's</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="{{route('siteinformation.add')}}">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('siteinformation.all')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-lg-8">

                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h5 class="mb-0">Details informations</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                  <tr>
                                    <td>Site Name</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->site_name}}</td>
                                  </tr>
                                  <tr>
                                    <td>Site Title</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->site_title}}</td>
                                  </tr>
                                  <tr>
                                    <td>Site Slogan</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->site_slogan}}</td>
                                  </tr>
                                  <tr>
                                    <td>Site Description</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->site_description}}</td>
                                  </tr>



                                  <tr>
                                    <td>Site Logo </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>
                                      @if(!empty($data->site_logo))
                                        <img src="{{asset($data->site_logo)}}" alt="image">
                                      @else
                                      <img src="{{asset('uploads/avatar.jpg')}}" alt="avatar" height="200px">
                                      @endif
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Site Faveicon </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>
                                      @if(!empty($data->site_faveicon))
                                        <img src="{{asset($data->site_faveicon)}}" alt="image">
                                      @else
                                      <img src="{{asset('uploads/avatar.jpg')}}" alt="avatar" height="200px">
                                      @endif
                                    </td>
                                  </tr>
                                
                                  <tr>
                                    <td>Slug </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->slug}}</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                      </div>
                      {{-- card end  --}}
                </div>
                
                <div class="col-lg-4">
                      <div class="card">
                        <div class="card-header d-flex flex-between-center py-2 border-bottom bg-body-tertiary">
                          <h4 class="mb-0">Post information </h4>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-between">
                          <div class="row align-items-center">
                            <div class="col-md-5 col-xxl-12 mb-xxl-1">
                                <div class="row text-center justify-content-center">                
                                    <div class="col-auto position-relative">
                                    <div class="echart-product-share" _echarts_instance_="ec_1743616191403" style="user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"><div style="position: relative; width: 106px; height: 106px; padding: 0px; margin: 0px; border-width: 0px; cursor: pointer;"><canvas data-zr-dom-id="zr_0" width="106" height="106" style="position: absolute; left: 0px; top: 0px; width: 106px; height: 106px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; background-color: rgb(249, 250, 253); border-width: 1px; border-radius: 4px; color: rgb(11, 23, 39); font: 14px / 21px Microsoft YaHei; padding: 7px 10px; top: 0px; left: 0px; transform: translate3d(-68px, 11px, 0px); border-color: rgb(216, 226, 239); pointer-events: none; visibility: hidden; opacity: 0;"><strong>Sparrow:</strong> 20.65%</div></div>
                                    <div class="position-absolute top-50 start-50 translate-middle text-1100 fs-7">{{$data->id}}</div> 
                                    </div>
                                </div>
                                <div class="mt-4 ">
                                    @if ($data->public_status === 0 )
                                        <h6 class="bg-danger p-1 rounded-1 text-white"> <strong> Public Status : </strong> Private </h6>   
                                    @else
                                        <h6 class="bg-success p-1 rounded-1 text-white"><strong> Public Status : </strong>  Published </h6>
                                    @endif      
                                </div>   
                            </div>
                            <div class="col-xxl-12 col-md-7">
                              <hr class="mx-nx1 mb-0 d-md-none d-xxl-block">
                              <div class="">
                                <div class="d-flex border-bottom py-2">
                                    <h6><span class="text-success px-1"> <i class="bi bi-info-circle"></i> </span> <strong class="px-2"> Created at :  </strong> {{ $data->created_at->format('d M, Y - h:i A') }}  </h6>
                                </div>
                                <div class="d-flex border-bottom py-2 ">
                                    <h6><span class="text-success px-1"> <i class="bi bi-info-circle"></i> </span> <strong class="px-2"> Updated at : </strong> {{ $data->updated_at->format('d M, Y - h:i A') }}  </h6>
                                </div>
                                <div class="d-flex border-bottom py-2 ">
                                    <h6><span class="text-success px-1"> <i class="bi bi-info-circle"></i> </span> <strong class="px-2"> Created by :  </strong> {{ $data->creator->name }}  </h6>
                                </div>
                                <div class="d-flex border-bottom py-2 ">
                                    <h6><span class="text-success px-1"> <i class="bi bi-info-circle"></i> </span> <strong class="px-2"> Updated by :  </strong>
                                        @if (!empty($data->editor->name))
                                            <h6> {{$data->editor->name }}</h6>
                                        @else
                                            <h6> No Name Available </h6>
                                        @endif  
                                    </h6>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- card end --}}
                </div>
                 {{--  col end  --}}
            </div>
        </div>
    </main>
@endsection