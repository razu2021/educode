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
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('ins_course_content_video.all_data')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
          <form action="{{route('ins_course_content_video.update')}}" method="post" enctype="multipart/form-data">
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
                                     <input class="form-control" name="id" id="id" type="hidden" value="{{$data->id}}">
                                     <input class="form-control" name="slug" id="slug" type="hidden" value="{{$data->slug}}">
                                    <input class="form-control" name="course_id" id="course_id" type="hidden" value="{{$data->id}}" >
                                  
                                </div>
                                 {{-- category end --}}
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="course_name">Course Name: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="course_name" id="course_name" type="text" value="{{$data->topic->course->course_name}}" disabled>
                                    <input class="form-control" name="course_id" id="course_id" type="hidden" value="{{$data->id}}" > 
                                    <label class="text-danger fw-medium">@error('course_name') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                {{-- category end --}}
                                  <div class="col-12 mb-1">
                                    <label class="form-label" for="course_name">Select Course Topic: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <select name="topic_id" id="topic_id" class="form-control">
                                        <option value="{{$data->topic->id}}">{{$data->topic->title ?? 'Someting is wrong !'}} </option>
                                        @foreach ($course_topic as $topic)
                                            <option value="{{$topic->id}}">{{$topic->title ?? 'No Topics Founded !'}}</option>
                                        @endforeach
                                    </select>
                                    <label class="text-danger fw-medium">@error('topic_id') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                           
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="title">Content/Topic Title : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="title" id="title" type="text" value="{{$data->title}}">
                                    <label class="text-danger fw-medium">@error('title') {{$message}} @enderror</label>
                                </div>
                                {{-- end  --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="video_url">Video URL : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="video_url" id="video_url" type="text" value="{{$data->video_url}}">
                                    <label class="text-danger fw-medium">@error('video_url') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="duration">video Duration : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="duration" id="duration" type="number" value="{{$data->duration}}">
                                    <label class="text-danger fw-medium">@error('duration') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="video_type">Platfrom Name : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <select name="video_type" id="video_type" class="form-control">
                                        <option value="{{$data->video_type}}">{{$data->video_type}}</option>
                                        <option value="youtube">Youtube</option>
                                        <option value="vimeo">Vimeo</option>
                                    </select>
                                    <label class="text-danger fw-medium">@error('video_type') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="is_preview"> Visibility : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <select name="is_preview" id="is_preview" class="form-control">
                                        <option value="{{$data->is_priview}}">{{$data->is_priview ?? 'Not Found'}} </option>
                                        <option value="1">Video for Free</option>
                                        <option value="0">Video for Paid </option>
                                    </select>
                                    <label class="text-danger fw-medium">@error('is_preview') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="position">video Order : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="position" id="position" type="number" value="{{$data->position ?? '0'}}">
                                    <label class="text-danger fw-medium">@error('position') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="description"> Description <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <textarea class="form-control" name="description" id="description">{{$data->description ?? 'No Data Available '}}</textarea>
                                    <label class="text-danger fw-medium">@error('description') {{$message}} @enderror</label>
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