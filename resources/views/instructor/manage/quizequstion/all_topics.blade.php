@extends('layouts.instructormaster')
@section('instructor_contents')

<div class="container">
    <div class="row">
        <div class="col-12">            
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Quiz Question Information</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="#" onclick="window.history.back()">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('ins_course_quize_qustion.all_data')}}">All Items </a> </button>
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
                            @foreach ($data->courseQuizzes as $topic)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading1"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$topic->id}}" aria-expanded="true" aria-controls="collapse1">{{$topic->title ?? 'No Title Found !'}}</button></h2>
                                    <div class="accordion-collapse collapse " id="collapse{{$topic->id}}" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                                    
                                      @foreach ($topic->quizeQustions as $question)
                                         <div class="mx-4 my-3 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center" style=" box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; padding:10px 10px">
                                          <div class="title"><span><i class="bi bi-play"></i> </span> {{$question->question}}</div>
                                          <div class="preview">
                                            
                                            <a class="btn btn-sm mx-2 btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$question->id}}" href="javascript::voied(0)"><span> Preview </span></a>
                                            <a class="btn btn-sm mx-2 btn-outline-warning " href="{{route('ins_course_quize_qustion.edit',[$question->id,$question->slug])}}"><span> <i class="bi bi-pencil-square"></i> </span></a>
                                            <a class="btn btn-sm mx-2 btn-outline-info " href="{{route('ins_course_quize_qustion.view',[$question->id,$question->slug])}}"><span> <i class="bi bi-eye-fill"></i></span></a>
                                            
                                          </div>
                                      </div>
                                      @endforeach
                                     
                                      
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


{{-- questin previw modal  --}}
 @foreach ($all as $data)
 @foreach ($data->courseQuizzes as $topic)
 @foreach ($topic->quizeQustions as $qsn)
<div class="modal fade" id="staticBackdrop{{$qsn->id}}" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg mt-6" role="document">
    <div class="modal-content border-0">
      <div class="position-absolute top-0 end-0 mt-3 me-3 z-1"><button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button></div>
      <div class="modal-body p-0">
        <div class="rounded-top-3 bg-body-tertiary py-3 ps-4 pe-6">
          <h4 class="mb-1" id="staticBackdropLabel">{{$data->course_name ?? 'No Data Found !'}}</h4>
          <p class="fs-11 mb-0">Quiz by : <a class="link-600 fw-semi-bold" href="#!">{{$topic->title ?? 'No Data Found !'}}</a></p>
        </div>
        <div class="p-4"> 
          <div class="row">
            <div class="col-lg-12">
              <div class="d-flex"><span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tag" data-fa-transform="shrink-2"></i></span>
                <div class="flex-1">
                  <h5 class="mb-2 fs-9">Question : </h5>
                  <p>{{$qsn->question ?? 'Question is not Found !'}} ? </p>
       
                  <hr class="my-4" />
                </div>
              </div>

               <div class="mx-4 my-2">
                  <ul class="">
                  <li class="btn btn-sm  nav-link-card-details d-block text-mute my-2  text-start me-2"><span class="text-info mx-2"><i class="bi bi-question-circle"></i> </span> {{$qsn->option1 ?? 'opton is not Found !'}}</li>
                  <li class="btn btn-sm  nav-link-card-details d-block text-mute my-2  text-start me-2"><span class="text-info mx-2"><i class="bi bi-question-circle"></i> </span> {{$qsn->option2 ?? 'opton is not Found !'}}</li>
                  <li class="btn btn-sm  nav-link-card-details d-block text-mute my-2  text-start me-2"><span class="text-info mx-2"><i class="bi bi-question-circle"></i> </span> {{$qsn->option3 ?? 'opton is not Found !'}}</li>
                  <li class="btn btn-sm  nav-link-card-details d-block text-mute my-2  text-start me-2"><span class="text-info mx-2"><i class="bi bi-question-circle"></i> </span> {{$qsn->option4 ?? 'opton is not Found !'}}</li>
                </ul>
              </div>
             
              <hr class="my-4" />
              <div class="d-flex"><span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-align-left" data-fa-transform="shrink-2"></i></span>
                <div class="flex-1">
                  <h5 class="mb-2 fs-9">Correct Answer</h5>
                  <p class="text-break fs-10"> {{$qsn->answer ?? 'Correct Answer Not Found'}} </p>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@endforeach
@endforeach


@endsection 