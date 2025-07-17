@extends('layouts.instructormaster')
@section('instructor_contents')
    <main>
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Add a New Course Topics</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="#" onclick="window.histroy.back()">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('ins_course_quize_qustion.all_data')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
          <form action="{{route('ins_course_quize_qustion.submit')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h6 class="mb-0">Add Course Topics/Content  Information </h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                                
                                {{-- category end --}}
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="course_name">Course Name: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="course_name" id="course_name" type="text" value="{{$data->course_name}}" disabled> 
                                    <label class="text-danger fw-medium">@error('course_name') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="quize_id">Select Quiz: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <select name="quize_id" id="quize_id" class="form-control" required>
                                        <option value="">Select Course Quiz </option>
                                        @foreach ($data->courseQuizzes as $topic)
                                            <option value="{{$topic->id}}">{{$topic->title ?? 'No Quiz Founded !'}}</option>
                                        @endforeach
                                    </select>
                                    <label class="text-danger fw-medium">@error('quize_id') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                           
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="question">Write a Questions ?  : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="question" id="question" type="text" value="{{old('question')}}" required>
                                    <label class="text-danger fw-medium">@error('question') {{$message}} @enderror</label>
                                </div>
                                {{-- end  --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="option1">Answer: Options-1 <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control"  name="option1" id="option1" type="text" value="{{old('option1')}}" required>
                                    <label class="text-danger fw-medium">@error('option1') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="option2">Answer: Options-2 <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control"  name="option2" id="option2" type="text" value="{{old('option2')}}" required>
                                    <label class="text-danger fw-medium">@error('option2') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="option3">Answer: Options-3 <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control"  name="option3" id="option3" type="text" value="{{old('option3')}}" required>
                                    <label class="text-danger fw-medium">@error('option3') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="option4">Answer: Options-4 <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control"  name="option4" id="option4" type="text" value="{{old('option4')}}" required>
                                    <label class="text-danger fw-medium">@error('option4') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="answer">Write your Correct Answer ! <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control"  name="answer" id="answer" type="text" value="{{old('answer')}}" required>
                                    <label class="text-danger fw-medium">@error('answer') {{$message}} @enderror</label>
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