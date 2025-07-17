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
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('ins_course_quize.all_data')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
          <form action="{{route('ins_course_quize.update')}}" method="post" enctype="multipart/form-data">
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
                                </div>
                              {{-- category end --}}
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="title"> Assignment Title : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="title" id="title" type="text" value="{{$data->title}}">
                                    <label class="text-danger fw-medium">@error('title') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="description"> Assignment Description : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="description" type="text" value="{{$data->description}}">
                                    <label class="text-danger fw-medium">@error('description') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                  <div class="col-6 mb-1">
                                  <label class="form-label" for="is_downloadable"> Is Downloadable : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                  <select name="is_downloadable" id="is_downloadable" class="form-control" required>
                                      @if ($data->is_downloadable == 1)
                                        <option value="{{$data->is_downloadable}}" >Paid Document</option>
                                      @elseif ($data->is_downloadable == 0)
                                        <option value="{{$data->is_downloadable}}" >Free Document</option>
                                      @endif
                                      <option value="1" >Paid Document</option>
                                      <option value="0" >free Document</option>
                                  </select>
                                  <label class="text-danger fw-medium">@error('is_downloadable') {{$message}} @enderror</label>
                              </div>
                              {{-- end --}}
                                <div class="col-3 mb-1">
                                  <label class="form-label" for="quize_time"> Quize Time / Minute: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                  <input type="number" name="quize_time" id="quize_time"  class="form-control" value="{{$data->quize_time}}" required>
                                  <label class="text-danger fw-medium">@error('quize_time') {{$message}} @enderror</label>
                              </div>
                              {{-- end --}}
                                <div class="col-3 mb-1">
                                  <label class="form-label" for="pass_mark"> Pass Mark: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                  <input type="number" name="pass_mark" id="pass_mark"  class="form-control" value="{{$data->pass_mark}}" required>
                                  <label class="text-danger fw-medium">@error('pass_mark') {{$message}} @enderror</label>
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