@extends('layouts.instructormaster')
@section('instructor_contents')

<div class="container">
    <div class="row">
        <div class="col-12">            
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">All Course Topics Information</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="#" onclick="window.history.back()">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('ins_course_content.all_data')}}">All Items </a> </button>
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
                            @foreach ($data->courseTopic as $topic)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading1"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$topic->id}}" aria-expanded="true" aria-controls="collapse1">{{$topic->title ?? 'No Title Found !'}}</button></h2>
                                    <div class="accordion-collapse collapse " id="collapse{{$topic->id}}" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">{!! $topic->description !!}</div>
                                     <div class="border-1 p-2 d-flex justify-content-end mt-2 mb-3">
                                        <a href="{{route('ins_course_content.edit',[$topic->id,$topic->slug])}}" class="btn btn-outline-warning btn-sm mx-2"> Edit</a>
                                        <a href="{{route('ins_course_content.view',[$topic->id,$topic->slug])}}" class="btn btn-outline-warning btn-sm mx-2"> view</a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal{{$topic->id}}" class="btn btn-outline-warning btn-sm mx-2"> Add video </a>
                                    </div>
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


@foreach ($all as $data)
                            
@foreach ($data->courseTopic as $topic)
<div class="modal fade" id="modal{{$topic->id}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
    <div class="modal-content position-relative">
      <div class="position-absolute top-0 end-0 mt-2 me-2 z-1">
        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="rounded-top-3 py-3 ps-4 pe-6 bg-body-tertiary">
          <h4 class="mb-1" id="modalExampleDemoLabel">Add a new illustration </h4>
        </div>
        <div class="p-4 pb-0">
          <form>
            <div class="mb-3">
              <label class="col-form-label" for="recipient-name">Recipient:</label>
              <input class="form-control" id="recipient-name" type="text" value="{{$topic->course_id}}"/>
            </div>
            <div class="mb-3">
              <label class="col-form-label" for="recipient-name">Recipient:</label>
              <input class="form-control" id="recipient-name" type="text" value="{{$topic->id}}"/>
            </div>
            <div class="mb-3">
              <label class="col-form-label" for="message-text">Message:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="button">Understood </button>
      </div>
    </div>
  </div>
</div>
@endforeach
@endforeach



@endsection 