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
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('ins_course_content_video.all_data')}}">All Items </a> </button>
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
                                    
                                      @foreach ($topic->videos as $video)
                                         <div class="mx-4 my-3 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center" style=" box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; padding:10px 10px">
                                          <div class="title"><span><i class="bi bi-play"></i> </span> {{$video->title}}</div>
                                          <div class="preview">
                                            <a class="btn btn-sm mx-2 btn-outline-primary previewBtn" href="javascript::voied(0)"   data-video-type="{{ $video->video_type }}"
                                               data-video-src="{{ $video->video_url ?? asset('uploads/videos/'.$video->video_file) }}" ><span> Preview </span></a>
                                            <a class="btn btn-sm mx-2 btn-outline-warning " href="{{route('ins_course_content_video.edit',[$video->id,$video->slug])}}"><span> <i class="bi bi-pencil-square"></i> </span></a>
                                            <a class="btn btn-sm mx-2 btn-outline-info " href="{{route('ins_course_content_video.view',[$video->id,$video->slug])}}"><span> <i class="bi bi-eye-fill"></i></span></a>
                                            
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






<!-- Video Preview Modal -->
<div class="modal fade" id="videoPreviewModal" tabindex="-1" aria-labelledby="videoPreviewLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="videoPreviewLabel">Video Preview</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="videoPreviewBody">
        {{-- Dynamic Video Will Be Injected Here --}}
      </div>
    </div>
  </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function () {
    const previewBtns = document.querySelectorAll('.previewBtn');
    const modalBody = document.getElementById('videoPreviewBody');

    previewBtns.forEach(button => {
        button.addEventListener('click', () => {
            const type = button.getAttribute('data-video-type');
            const src = button.getAttribute('data-video-src');
            let html = '';

            if (type === 'youtube') {
                html = `<iframe width="100%" height="400" src="https://www.youtube.com/embed/${src}" frameborder="0" allowfullscreen></iframe>`;
            } else if (type === 'vimeo') {
                html = `<iframe src="https://player.vimeo.com/video/${src}" width="100%" height="400" frameborder="0" allowfullscreen></iframe>`;
            } else if (type === 'upload' || type === 'external') {
                html = `
                    <video width="100%" height="400" controls preload="metadata" playsinline>
                        <source src="${src}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                `;
            } else {
                html = `<div class="alert alert-warning">Invalid video source</div>`;
            }

            modalBody.innerHTML = html;
            new bootstrap.Modal(document.getElementById('videoPreviewModal')).show();
        });
    });

    // Clear modal on close
    document.getElementById('videoPreviewModal').addEventListener('hidden.bs.modal', function () {
        modalBody.innerHTML = '';
    });
});

</script>

@endsection 