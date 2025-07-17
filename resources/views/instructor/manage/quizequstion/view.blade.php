@extends('layouts.instructormaster')
@section('instructor_contents')

    <main class="small-content hidden" id="small-content">

        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Quiz Questions information </h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a onclick="window.history.back()" href="#">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('ins_course_quize_qustion.all_data')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h5 class="mb-0">Question information</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                
                                  <tr>
                                    <td>Question</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->question ?? 'Not Found !'}}</td>
                                  </tr>
                                  <tr>
                                    <td>option 1</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->option1 ?? 'N/A'}}</td>
                                  </tr>
                                  <tr>
                                    <td>option 2</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->option2?? 'N/A'}}</td>
                                  </tr>
                                  <tr>
                                    <td>option 3</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->option3 ?? 'N/A'}}</td>
                                  </tr>
                                  <tr>
                                    <td>option 4</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->option4 ?? 'N/A'}}</td>
                                  </tr>
                                  <tr>
                                    <td>Correct Answer</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->answer ?? 'N/A'}}</td>
                                  </tr>
                                  <tr>
                                    <td>Video Platform</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->video_type ?? 'N/A'}}</td>
                                  </tr>
                                  
                                  <tr>
                                    <td>Created At  </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{ $data->created_at->format('d M, Y - h:i A') }}</td>
                                  </tr>
                                  <tr>
                                    <td>Updated at </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{ $data->updated_at->format('d M, Y - h:i A') }}</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                      </div>
                      {{-- card end  --}}
                </div>             
            </div>
        </div>
    </main>
@endsection