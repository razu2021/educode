@extends('layouts.instructormaster')
@section('instructor_contents')
    <main>
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Update a Course Attachment</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="#" onclick="window.history.back()">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('ins_course_attachment.all_data')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
          <form action="{{route('ins_course_attachment.update')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h6 class="mb-0">Update Attachment Information </h6>
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
                                    <input class="form-control" name="course_name" id="course_name" type="text" value="{{$data->course->course_name}}" disabled>
                                    <input class="form-control" name="course_id" id="course_id" type="hidden" value="{{$data->id}}" > 
                                    <label class="text-danger fw-medium">@error('course_name') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                {{-- category end --}}
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="title">Attachment Title : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="title" id="title" type="text" value="{{$data->title}}">
                                    <label class="text-danger fw-medium">@error('title') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="position"> Is Downloadable : </label>
                                    <select name="is_downloadable" id="is_downloadable" class="form-control">
                                        <option value="1">Paid Document</option>
                                        <option value="0">free Document</option>
                                    </select>
                                    <label class="text-danger fw-medium">@error('position') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                 <div class="col-6 mb-1">
                                    <label class="form-label" for="position"> Order by : </label>
                                    <input type="number" name="position" id="position"  class="form-control" value="{{$data->sort_order}}">
                                    <label class="text-danger fw-medium">@error('position') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                 
                            
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="file"> Upload Attachment <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input type="file" name="file" id="file" accept="pdf" class="form-control">
                                    <label class="text-danger fw-medium">@error('file') {{$message}} @enderror</label>
                                    <label>{{$data->file ?? 'Not Found !'}}</label>
                        
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