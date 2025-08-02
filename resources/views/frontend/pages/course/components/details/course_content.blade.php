@if($data->courseTopic->isNotEmpty())  
   <section class="course-curriculum section-padding">
    <div class="container">
      <h2 class="section-title">Course Content/Topics</h2>
      <div class="accordion" id="curriculumAccordion">
        <!-- Single Course Section -->
        @foreach ($data->courseTopic as $content)
        <div class="accordion-item">
          <h2 class="accordion-header" id="section1">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$content->id}}">
              <span>{{$content->title ?? 'No Title Found !'}}</span>
            </button>
          </h2>
          <div id="collapse{{$content->id}}" class="accordion-collapse collapse " data-bs-parent="#curriculumAccordion">
            <div class="accordion-body">
              <ul class="topic-list">
                @foreach ($content->videos as $topicVideos)
                  @if ($topicVideos->is_preview === 1)
                      <li>
                        <div class="topic-title">
                          <i class="bi bi-play-circle text-success"></i>
                          {{$topicVideos->title ?? 'Not Found !'}}
                        </div>
                        <div class="topic-meta">
                          <span class="time">{{$topicVideos->duration ?? '5:00'}} minute</span>
                          <a href="#" class="preview-btn" data-bs-toggle="modal" data-bs-target="#previewModal" data-video="https://www.youtube.com/embed/{{$topicVideos->video_url}}">
                            <i class="bi bi-eye-fill"></i> 
                          </a>
                        </div>
                      </li>
                  @elseif($topicVideos->is_preview === 0)
                      <li>
                        <div class="topic-title">
                          <i class="bi bi-play-circle text-success"></i>
                          {{$topicVideos->title ?? 'Not Found !'}}
                        </div>
                        <div class="topic-meta">
                          <span class="time">{{$topicVideos->duration ?? '5:00'}} minute</span>
                          <p href="#" class="preview-btn">
                            <i class="bi bi-lock"></i>
                          </p>
                        </div>
                      </li>
                  @endif
                @endforeach

              </ul>
            </div>
          </div>
        </div>
        @endforeach
        <!-- Add more sections as needed -->
      </div>
    </div>
  </section>
@endif



{{-- ----------------  course attachment start here  --}}

@if($data->courseAttachment->isNotEmpty())
<section>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section_heading">
          <h2 class="section-title">Course Attachments/Files</h2>
        </div>
          <ul class="attachment-list">
            @foreach ($data->courseAttachment as $attachment)
            @if($attachment->is_downloadable === 0)
            <li class="attachment-item">
              <div class="attachment-info">
                <i class="bi bi-file-earmark-text icon text-primary"></i>
                <span class="title">{{$attachment->title ?? 'Not File Available !'}}</span>
              </div>
              <div class="attachment-actions">
                <a href="{{asset($attachment->file)}}" target="_blank" class="btn btn-sm btn-outline-primary">
                  <i class="bi bi-eye-fill"></i> Preview
                </a>
              </div>
            </li>
            @elseif($attachment->is_downloadable === 1)
            <li class="attachment-item">
              <div class="attachment-info">
                <i class="bi bi-file-earmark-text icon text-primary"></i>
                <span class="title">{{$attachment->title ?? 'Not File Available !'}}</span>
              </div>
              <div class="attachment-actions">
              </div>
            </li>
            @endif
            @endforeach
          </ul>
      </div>
    </div>
  </div>
</section>
@endif


{{-- ----------------  course attachment start here  --}}
@if($data->courseAssignment->isNotEmpty())
<section class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section_heading">
          <h2 class="section-title">Course Assignments</h2>
        </div>
          <ul class="attachment-list">
            @foreach ($data->courseAssignment as $assignment)
            @if($assignment->is_downloadable === 0)
            <li class="attachment-item">
              <div class="attachment-info">
                <i class="bi bi-file-earmark-text icon text-primary"></i>
                <span class="title">{{$assignment->title ?? 'Not File Available !'}}</span> 
                <span class="text-success"><i class="bi bi-cloud-download"></i> {{$assignment->download_count ?? '0' }}</span>
              </div>
              <div class="attachment-actions">
                <a href="{{asset($assignment->file)}}" target="_blank" class="btn btn-sm btn-outline-primary">
                  <i class="bi bi-eye-fill"></i> Preview
                </a>
              </div>
            </li>
            @elseif($assignment->is_downloadable === 1)
            <li class="attachment-item">
              <div class="attachment-info">
                <i class="bi bi-file-earmark-text icon text-primary"></i>
                <span class="title">{{$assignment->title ?? 'Not File Available !'}}</span>
                 <span class="text-success"><i class="bi bi-cloud-download"></i> {{$assignment->download_count ?? '0' }}</span>
              </div>
              <div class="attachment-actions">
              </div>
            </li>
            @endif
            @endforeach
          </ul>
      </div>
    </div>
  </div>
</section>
@endif

{{-- ----------------  course attachment start here  --}}
@if($data->courseQuizzes->isNotEmpty())
<section>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section_heading">
          <h2 class="section-title">Quiz Test / Live Test </h2>
        </div>
          <ul class="attachment-list">
            @foreach ($data->courseQuizzes as $quizTest)
            @if($quizTest->is_downloadable === 0)
            <li class="attachment-item">
              <div class="attachment-info">
                <i class="bi bi-file-earmark-text icon text-primary"></i>
                <span class="title">{{$quizTest->title ?? 'Not File Available !'}}</span> 
                <span class="text-success"><i class="bi bi-people"></i> {{$quizTest->download_count ?? '0' }}</span>
              </div>
              <div class="attachment-actions">
                <a href="{{asset($quizTest->file)}}" target="_blank" class="btn btn-sm btn-outline-primary">
                  <i class="bi bi-eye-fill"></i> Test
                </a>
              </div>
            </li>
            @elseif($quizTest->is_downloadable === 1)
            <li class="attachment-item">
              <div class="attachment-info">
                <i class="bi bi-file-earmark-text icon text-primary"></i>
                <span class="title">{{$quizTest->title ?? 'Not File Available !'}}</span>
                 <span class="text-success"><i class="bi bi-people"></i> {{$quizTest->download_count ?? '0' }}</span>
              </div>
              <div class="attachment-actions">
              </div>
            </li>
            @endif
            @endforeach
          </ul>
      </div>
    </div>
  </div>
</section>
@endif