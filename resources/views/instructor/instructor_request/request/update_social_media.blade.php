@extends('layouts.instructormaster')
@section('instructor_contents')

<div class="container " >
    <div class="row">
        <div class="col-12 col-lg-12 ">
            <div class="card  mb-3" style="height: 100vh">
                <div class="bg-holder bg-card" style="background-image:url({{asset('contents/backend/assets')}}/assets/img/icons/spot-illustrations/corner-1.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative ">
             
                    <div class="uploads_section">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2  p-4">
                                <div class="form_heading mb-4">
                                    <h5 class="text-warning">Social Media Profile Verification</h5>
                                    <p class="fs-10 mb-0">Please provide the links to your public social media profiles. These help us verify your authenticity as an instructor and build trust with students.</p>
                                </div>
                                <form action="{{route('user_social.update')}}" method="post">
                                    @csrf
                                    {{--  --}}
                                    <div>
                                        <input type="hidden" name="id" value="{{$data->id}}">
                                        <input type="hidden" name="user_id" value="{{$data->user_id}}">
                                        <input type="hidden" name="user_slug" value="{{$data->slug}}">
                                    </div>
                                    {{--  --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="facebook">Facebook Profile  URL <span class="text-danger"> <i class="bi bi-star-fill"></i></span></label>
                                        <input class="form-control" name="facebook" id="facebook" type="text" placeholder="https://www.facebook.com/your-profile" value="{{$data->facebook}}">
                                        <label class="text-danger fw-medium">@error('facebook') {{$message}} @enderror</label>
                                    </div>
                                    {{-- end --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="twitter">Twitter (X) Profile URL</label>
                                        <input class="form-control" name="twitter" id="twitter" placeholder="https://twitter.com/your-handle" type="text" value="{{$data->twitter}}">
                                        <label class="text-danger fw-medium">@error('twitter') {{$message}} @enderror</label>
                                    </div>
                                    {{-- end --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="linkedin">Linkedin Profile URL</label>
                                        <input class="form-control" name="linkedin" id="linkedin" type="text" placeholder="https://www.linkedin.com/in/your-profile" value="{{$data->linkedin}}">
                                        <label class="text-danger fw-medium">@error('linkedin') {{$message}} @enderror</label>
                                    </div>
                                    {{-- end --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="github">GitHub Profile URL or other </label>
                                        <input class="form-control" name="github" id="github" type="text" placeholder="https://github.com/your-username" value="{{$data->github}}">
                                        <label class="text-danger fw-medium">@error('github') {{$message}} @enderror</label>
                                    </div>
                                    {{-- end --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="youtube">YouTube Channel URL <span class="text-danger"> <i class="bi bi-star-fill"></i></span></label>
                                        <input class="form-control" name="youtube" id="youtube" type="text"  placeholder="https://www.youtube.com/channel/your-channel-id" value="{{$data->youtube}}">
                                        <label class="text-danger fw-medium">@error('youtube') {{$message}} @enderror</label>
                                    </div>
                                    {{-- end --}}
                                    <button class="btn btn-outline-primary w-100 mt-4" type="submit"> Save Information</button>
                                </form>
                            {{-- form end --}}
                            </div>
                            {{-- col end  --}}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection