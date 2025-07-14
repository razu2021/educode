@extends('layouts.instructormaster')
@section('instructor_contents')

    <main class="small-content hidden" id="small-content">

        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Course Video </h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a onclick="window.history.back()" href="#">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('ins_course_content_video.all_data')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h5 class="mb-0">Course Video information</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                
                                  <tr>
                                    <td>Video Title</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->title}}</td>
                                  </tr>
                                  <tr>
                                    <td>Video URL</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->video_url ?? 'N/a'}}</td>
                                  </tr>
                                  <tr>
                                    <td>Video Duration</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->duration ?? 'N/A'}}</td>
                                  </tr>
                                  <tr>
                                    <td>Video Platform</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->video_type ?? 'N/a'}}</td>
                                  </tr>
                                  <tr>
                                    <td>Video type</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    @if ($data->is_preview === 1)
                                      <td class="text-danger">Paid Course Only</td>
                                    @else
                                    <td class="text-warning">Free</td>
                                    @endif
                                  </tr>
                                  <tr>
                                    <td>Video order</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->position ?? 'N/A'}}</td>
                                  </tr>


                                  <tr>
                                    <td>Description </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{!! $data->description ?? 'N/A' !!}</td>
                                  </tr>

                                  <tr>
                                    <td>Slug </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->slug}}</td>
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