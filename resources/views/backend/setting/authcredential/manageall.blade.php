@extends('layouts.adminmaster')
@section('admin_contents')
<main>

<div class="container">
    <div class="row">
        @foreach ($alldata as $data)
       
        <div class="col-lg-4 mt-4">
            <div class="card h-xxl-100">
                <div class="card-header">
                  <h5 class="mb-0">Update Information for <strong class="text-warning">{{$data->name}}</strong>
                  </h5>
                </div>
                <div class="card-body bg-body-tertiary">
                    <form action="{{route('authcredential.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                      {{-- input hidden --}}
                      <input class="form-control" name="id" id="id" type="hidden" value="{{$data->id}}">
                      <input class="form-control" name="slug" id="slug" type="hidden" value="{{$data->slug}}">
                      {{-- input hidden --}}
                        <div class="col-12 mb-1">
                            <label class="form-label" for="name">Name:</label>
                            <select name="name" id="name" class="form-control">
                                <option value="{{$data->name}}">{{$data->name}}</option>
                                <option value="google" {{ old('name') == 'google' ? 'selected' : '' }}>Login with Google</option>
                                <option value="facebook" {{ old('name') == 'facebook' ? 'selected' : '' }}>Login with Facebook</option>
                                <option value="github" {{ old('name') == 'github' ? 'selected' : '' }}>Login with GitHub</option>
                                <option value="linkedin" {{ old('name') == 'linkedin' ? 'selected' : '' }}>Login with LinkedIn</option>
                                <option value="recaptcha" {{ old('name') == 'recaptcha' ? 'selected' : '' }}>Google reCaptcha</option>
                                <option value="login" {{ old('name') == 'login' ? 'selected' : '' }}>User Login</option>
                                <option value="registration" {{ old('name') == 'registration' ? 'selected' : '' }}>User Registration</option>
                            </select>
                            <label class="text-danger fw-medium">@error('name') {{$message}} @enderror</label>
                        </div>
                      <!-- end -->
                        <div class="col-12 mb-1">
                            <label class="form-label" for="client_id">Client ID:</label>
                            <input class="form-control" name="client_id" id="client_id" type="text" value="{{$data->client_id}}">
                            <label class="text-danger fw-medium">@error('client_id') {{$message}} @enderror</label>
                        </div>
                      <!-- end -->
                        <div class="col-12 mb-1">
                            <label class="form-label" for="client_secret">Client Secret:</label>
                            <input class="form-control" name="client_secret" id="client_secret" type="text" value="{{$data->client_secret}}">
                            <label class="text-danger fw-medium">@error('client_secret') {{$message}} @enderror</label>
                        </div>
                      <!-- end -->
                        <div class="col-12 mb-1">
                            <label class="form-label" for="redirect_url">Redirect URL :</label>
                            <input class="form-control" name="redirect_url" id="redirect_url" type="text" value="{{$data->redirect_url}}">
                            <label class="text-danger fw-medium">@error('redirect_url') {{$message}} @enderror</label>
                        </div>
                      <!-- end -->
                       <!-- end -->
                       <div class="col-12 mb-1 justify-content-end">
                          <div class="form-check form-switch">
                            <input type="hidden" name="public_status" value="0">
                            @if($data->public_status === 1)
                            <input class="form-check-input" name="public_status" type="checkbox" role="switch" id="switchCheckChecked" checked  value="1">
                            @else
                            <input class="form-check-input" name="public_status" type="checkbox" role="switch" id="switchCheckChecked"   value="1">
                            @endif
                            <label class="form-check-label" for="switchCheckChecked">Checked is Active or Derft</label>
                          </div>
                       </div>
                    <button class="btn btn-falcon-warning d-block w-100 mt-5"> Upload Information</button>
                    <div class="border-bottom border-dashed my-4 "></div>
                    </form>

                </div>
              </div>
        </div>
 
        {{-- col end  --}}
    


        @endforeach



    </div>
</div>
















    
</main>



@endsection