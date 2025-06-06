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
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="{{route('siteinformation.add')}}">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('siteinformation.all')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
          <form action="{{route('siteinformation.submit')}}" method="post" enctype="multipart/form-data">
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
                                    <label class="form-label" for="site_name">Site Name</label>
                                    <input class="form-control" name="site_name" id="site_name" type="text" value="{{old('site_name')}}">
                                    <label class="text-danger fw-medium">@error('site_name') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="site_title">Site Title</label>
                                    <input class="form-control" name="site_title" id="site_title" type="text" value="{{old('site_title')}}">
                                    <label class="text-danger fw-medium">@error('site_title') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="site_slogan">Site Slogan</label>
                                    <input class="form-control" name="site_slogan" id="site_slogan" type="text" value="{{old('site_slogan')}}">
                                    <label class="text-danger fw-medium">@error('site_slogan') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="site_description">Site Description</label>
                                    <textarea name="site_description" id="site_description" rows="5" class="form-control"></textarea>
                                    <label class="text-danger fw-medium">@error('site_description') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                              <div class="col-6 mb-1">
                                  <label class="form-label" for="imageInput1">Site Logo</label>
                                  <input class="form-control" id="imageInput1" name="images" type="file">
                                  <label class="text-danger fw-medium">@error('image1') {{$message}} @enderror</label>
                                  <div class="col-6 mb-1">
                                      <img id="previewImage1" src="" style="display: none; max-width: 200px; margin-top: 10px; border-radius: 20px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;" />
                                  </div>
                              </div>

                              <div class="col-6 mb-1">
                                  <label class="form-label" for="imageInput2">Site Favicon </label>
                                  <input class="form-control" id="imageInput2" name="images2" type="file">
                                  <label class="text-danger fw-medium">@error('image2') {{$message}} @enderror</label>
                                  <div class="col-6 mb-1">
                                      <img id="previewImage2" src="" style="display: none; max-width: 200px; margin-top: 10px; border-radius: 20px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;" />
                                  </div>
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

    <script>
    function previewImage(inputId, imgId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(imgId);

        input.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(file);
            }
        });
    }

    previewImage('imageInput1', 'previewImage1');
    previewImage('imageInput2', 'previewImage2');
</script>


@endsection