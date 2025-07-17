@extends('layouts.instructormaster')
@section('instructor_contents')

    <main class="small-content hidden" id="small-content">
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Quiz Assignment </h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a onclick="window.history.back()" href="#">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('ins_course_quize.all_data')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h5 class="mb-0">Quiz information</h5>
                        </div>
                        <div class="card-body table-responsive scrollbar">
                            <table class="table table-bordered ">
                                <tbody>
                                  <tr>
                                    <td>Course Name  </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->course->course_name ?? 'Not Found'}}</td>
                                  </tr>
                                  <tr>
                                    <td>Quize Title  </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->title ?? 'Not Found !'}}</td>
                                  </tr>
                                  <tr>
                                    <td>Quiz  Description  </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->description ?? 'Not Found !'}}</td>
                                  </tr>
                                  <tr>
                                    <td> Quize Time</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{!! $data->quize_time  ?? 'Not Found ! ' !!}</td>
                                  </tr>

                                  <tr>
                                    <td> Pass Mark </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{!! $data->pass_mark ?? 'N/A' !!}</td>
                                  </tr>
                                 
                                  <tr>
                                    <td>Start  Date  </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->start_at ?\Carbon\Carbon::parse($data->start_at)->format('d M, Y') : 'N/A'  }}</td>
                                  </tr>
                                  <tr>
                                    <td>End Date  </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->end_at ?\Carbon\Carbon::parse($data->end_at)->format('d M, Y') : 'N/A'  }}</td>
                                  </tr>
                                  <tr>
                                    <td>IS_Downloadable </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    @if ($data->is_downloadable == 1)
                                      <td>Paid Document</td>
                                    @else
                                      <td>Free Document</td>
                                    @endif
                                  </tr>
                                  <tr>
                                    <td>Total Participant </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->user_count ?? '0'}}</td>
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