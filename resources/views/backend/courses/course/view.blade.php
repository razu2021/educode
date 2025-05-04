@extends('layouts.adminmaster')
@section('admin_contents')
    <main>
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Categorie Detail's</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="{{route('course.add')}}">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('course.all')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-lg-8">

                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h5 class="mb-0">Categorie information</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                
                                <tbody>
                                  <tr>
                                    <td>Name</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->course_name}}</td>
                                  </tr>
                                  <tr>
                                    <td>Title</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->course_title}}</td>
                                  </tr>
                                 
                                  <tr>
                                    <td>Description</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->course_des}}</td>
                                  </tr>
                                  <tr>
                                    <td>Slug </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->slug}}</td>
                                  </tr>
                                  <tr>
                                    <td>Unique URL</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->url}}</td>
                                  </tr>
                                 
                                </tbody>
                              </table>
                        </div>
                      </div>
                      {{-- card end  --}}
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h5 class="mb-0">Meta information</h5>
                        </div>
                        <div class="card-header bg-body-tertiary">
                            <ul class="nav nav-pills" id="pill-myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="pill-google-tab" data-bs-toggle="tab" href="#pill-tab-google" role="tab" aria-controls="pill-tab-google" aria-selected="true"><i class="bi bi-google"></i></a></li>
                                <li class="nav-item"><a class="nav-link" id="pill-facebook-tab" data-bs-toggle="tab" href="#pill-tab-facebook" role="tab" aria-controls="pill-tab-facebook" aria-selected="false"><i class="bi bi-facebook"></i></a></li>
                                <li class="nav-item"><a class="nav-link" id="pill-twitter-tab" data-bs-toggle="tab" href="#pill-tab-twitter" role="tab" aria-controls="pill-tab-twitter" aria-selected="false"><i class="bi bi-twitter"></i> </a></li>
                                <li class="nav-item"><a class="nav-link" id="pill-whatsapp-tab" data-bs-toggle="tab" href="#pill-tab-whatsapp" role="tab" aria-controls="pill-tab-whatsapp" aria-selected="false"><i class="bi bi-whatsapp"></i></a></li>
                                <li class="nav-item"><a class="nav-link" id="pill-pin-tab" data-bs-toggle="tab" href="#pill-tab-pin" role="tab" aria-controls="pill-tab-pin" aria-selected="false"><i class="bi bi-pinterest"></i> pin</a></li>
                                <li class="nav-item"><a class="nav-link" id="pill-seo_image-tab" data-bs-toggle="tab" href="#pill-tab-seo_image" role="tab" aria-controls="pill-tab-seo_image" aria-selected="false"><i class="bi bi-pinterest"></i> Images</a></li>
                              </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content border p-3 mt-3" id="pill-myTabContent">
                                <div class="tab-pane fade show active" id="pill-tab-google" role="tabpanel" aria-labelledby="google-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                          <tr>
                                            <td>Meta Title </td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->meta_title ?? 'No Data Available !'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Meta Description </td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->meta_description ?? 'No Data Available !'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Meta Keywords </td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>
                                              @php
                                                  $keywords = explode(',', $data->metaData?->meta_keywords ?? '');
                                              @endphp
                                          
                                              @forelse($keywords as $keyword)
                                                  <span class="badge bg-primary me-1 mb-1">{{ $keyword }}</span>
                                              @empty
                                                  <span class="text-danger">No Data Available !</span>
                                              @endforelse
                                          </td>
                                          </tr>
                                          <tr>
                                            <td>Meta Robots </td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->meta_robots ?? 'No Data Available !'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Canonicale Url  </td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->canonical_url ?? 'No Data Available !'}}</td>
                                          </tr>
                                          <tr>
                                            <td>hreflang tags  </td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->hreflang_tags ?? 'No Data Available !'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Structured Data  </td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->structured_data ?? 'No Data Available !'}}</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- tab end  --}}
                                <div class="tab-pane fade" id="pill-tab-facebook" role="tabpanel" aria-labelledby="facebook-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                          <tr>
                                            <td>Og Title</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->og_title ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Og Description</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->og_description ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Og url</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->og_url ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Og Type</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->og_type ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Og Locale</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->og_locale ?? 'No Data Available'}}</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- tab end --}}
                                <div class="tab-pane fade" id="pill-tab-twitter" role="tabpanel" aria-labelledby="twitter-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                          <tr>
                                            <td>Twitter Card</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->twitter_card ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Twitter Card</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->twitter_title ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Twitter Description</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->twitter_description ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Twitter Description</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->twitter_site ?? 'No Data Available'}}</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- tab end --}}
                                <div class="tab-pane fade" id="pill-tab-whatsapp" role="tabpanel" aria-labelledby="whatsapp-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                          <tr>
                                            <td>Whatsapp Title</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->whatsapp_title ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Whatsapp Description</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->whatsapp_description ?? 'No Data Available'}}</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- tab end --}}
                                <div class="tab-pane fade" id="pill-tab-pin" role="tabpanel" aria-labelledby="pin-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                          <tr>
                                            <td>Pinterest Description</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->pinterest_description ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Pinterest Description</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->metaData?->pinterest_rich_pin ?? 'No Data Available'}}</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- tab end --}}
                                <div class="tab-pane fade" id="pill-tab-seo_image" role="tabpanel" aria-labelledby="seo_image-tab">
                                    <table class="table table-bordered" style="overflow: scroll">
                                        <tbody>
                                          <tr>
                                            <td>Seo Image</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>
                                              @if (!empty($data->metaData->images))
                                                @foreach($data->metaData->images as $image)
                                                <img src="{{ asset('storage/uploads/seo/' . $image->image_name) }}" alt="SEO Image" height="200px" width="auto" >
                                                @endforeach
                                              @endif
                                            </td>
                                          </tr>
                                          
                                        </tbody>
                                    </table>
                                </div>
                                {{-- tab end --}}



                            </div>
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
                                    <div class="echart-product-share" _echarts_instance_="ec_1743616191403" style="user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"><div style="position: relative; width: 106px; height: 106px; padding: 0px; margin: 0px; border-width: 0px; cursor: pointer;"><canvas data-zr-dom-id="zr_0" width="106" height="106" style="position: absolute; left: 0px; top: 0px; width: 106px; height: 106px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; background-color: rgb(249, 250, 253); border-width: 1px; border-radius: 4px; color: rgb(11, 23, 39); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 7px 10px; top: 0px; left: 0px; transform: translate3d(-68px, 11px, 0px); border-color: rgb(216, 226, 239); pointer-events: none; visibility: hidden; opacity: 0;"><strong>Sparrow:</strong> 20.65%</div></div>
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