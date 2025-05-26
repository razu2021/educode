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
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="{{route('authcredential.add')}}">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('authcredential.all')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
          <form action="{{route('authcredential.submit')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h6 class="mb-0">Add information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                              <div class="note">
                                <p><strong class="text-danger">Note:</strong></p>
                              </div>
                                <!-- end -->
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="name">Name:</label>
                                    <select name="name" id="name" class="form-control">
                                      <option value="">Select Option</option>
                                      <option value="google" {{ old('name') == 'google' ? 'selected' : '' }}>Login with Google</option>
                                      <option value="facebook" {{ old('name') == 'facebook' ? 'selected' : '' }}>Login with Facebook</option>
                                      <option value="github" {{ old('name') == 'github' ? 'selected' : '' }}>Login with GitHub</option>
                                      <option value="linkedin" {{ old('name') == 'linkedin' ? 'selected' : '' }}>Login with LinkedIn</option>
                                      <option value="recaptcha" {{ old('name') == 'recaptcha' ? 'selected' : '' }}>Google reCaptcha</option>
                                      <hr>
                                      <option value="login" {{ old('name') == 'login' ? 'selected' : '' }}>User Login</option>
                                      <option value="registration" {{ old('name') == 'registration' ? 'selected' : '' }}>User Registration</option>
                                      <option value="two_factor" {{ old('name') == 'two_factor' ? 'selected' : '' }}>Two Factor</option>
                                      <option value="email_verification" {{ old('name') == 'email_verification' ? 'selected' : '' }}>Email Verification</option>
                                  </select>
                                    <label class="text-danger fw-medium">@error('name') {{$message}} @enderror</label>
                                    <label><i>we need actual data, but if you select after divider option you can fill dummy data</i></label>
                                </div>
                              <!-- end -->
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="client_id">Client ID:</label>
                                    <input class="form-control" name="client_id" id="client_id" type="text" value="{{old('client_id')}}">
                                    
                                    <label class="text-danger fw-medium">@error('client_id') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="client_secret">Client Secret:</label>
                                    <input class="form-control" name="client_secret" id="client_secret" type="text" value="{{old('client_secret')}}">
                                    <label class="text-danger fw-medium">@error('client_secret') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="redirect_url">Redirect URL :</label>
                                    <input class="form-control" name="redirect_url" id="redirect_url" type="text" value="{{old('redirect_url')}}">
                                    <label class="text-danger fw-medium">@error('redirect_url') {{$message}} @enderror</label>
                                </div>
                              <!-- end -->
                               <!-- end -->
                               <div class="col-12 mb-1 justify-content-end">
                                  <div class="form-check form-switch">
                                    <input type="hidden" name="public_status" value="0">
                                    <input class="form-check-input" name="public_status" type="checkbox" role="switch" id="switchCheckChecked" value="1">
                                    <label class="form-check-label" for="switchCheckChecked">Checked is Active or Derft</label>
                                  </div>
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