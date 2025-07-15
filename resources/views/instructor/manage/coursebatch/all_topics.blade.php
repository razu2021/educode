@extends('layouts.instructormaster')
@section('instructor_contents')

<div class="container">
    <div class="row">
        <div class="col-12">            
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">All Batch Informations </h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="#" onclick="window.history.back()">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('ins_course_batch.all_data')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
            <div class="card">
                <div class="card-body">
                    {{-- accodion start here  --}}
                    <div class="accordion" id="accordionExample">
                        @foreach ($all as $data)
                            <h6><strong>Course Name : </strong>{{$data->course_name}}</h6>
                            @foreach ($data->CourseBatch as $topic)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading1"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$topic->id}}" aria-expanded="true" aria-controls="collapse1">{{$topic->title ?? 'No Title Found !'}}</button></h2>
                                    <div class="accordion-collapse collapse " id="collapse{{$topic->id}}" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                                      <div class="mx-4 my-3 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center" style=" box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; padding:10px 10px">
                                          <div class="title w-75 border-left-1"><span><i class="bi bi-file-earmark-pdf"></i> </span> {!! Str::words($topic->description,20) !!}</div>
                                          <div class="preview">
                                            <a class="btn btn-sm mx-2 btn-outline-primary previewBtn" target="_blank" href="{{asset($topic->file ?? '')}}"   ><span> Preview </span></a>
                                            <a class="btn btn-sm mx-2 btn-outline-warning " href="{{route('ins_course_batch.edit',[$topic->id,$topic->slug])}}"><span> <i class="bi bi-pencil-square"></i> </span></a>
                                            <a class="btn btn-sm mx-2 btn-outline-info " href="{{route('ins_course_batch.view',[$topic->id,$topic->slug])}}"><span> <i class="bi bi-eye-fill"></i></span></a>
                                          </div>
                                      </div>
                                      {{-- end --}}
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                        </div>
                    {{-- accodion end here  --}}
                </div>
            </div>
        </div>
    </div>
</div>




@endsection 