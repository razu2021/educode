@extends('layouts.webmaster')
@section('website_contents')
<main>

  {{-- breadcrumb start here  --}}
  @includeIf('frontend.pages.course.components.details.breadcrumb',compact('data'))
  {{-- breadcrumb end here  --}}

  {{-- course details strat here  --}}
  <section class="section-padding">
    <div class="container">
      <div class="row g-5">
        <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7 mt-4">

          @includeIf('frontend.pages.course.components.details.course_about')
          {{-- course about end --}}

          @includeIf('frontend.pages.course.components.details.course_content')
          {{-- course content end here  --}}

          @includeIf('frontend.pages.course.components.details.course_description')
          {{-- course content end here  --}}
          
          @includeIf('frontend.pages.course.components.details.instructor_pro')
          {{-- course content end here  --}}

          @includeIf('frontend.pages.course.components.details.course_review')
          {{-- course content end here  --}}

          @includeIf('frontend.pages.course.components.details.instructor_courses')
          {{-- course content end here  --}}

        {{-- =======================  col end ============== --}}
        </div>
        {{-- =======================  col end ============== --}}


        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 ">
            @includeIf('frontend.pages.course.components.details.course_inroll1',compact('data'))
        </div>


        {{-- =======================  col end ============== --}}
      </div>
      {{-- =======================  col end ============== --}}
    </div>
  </section>
  {{-- course details end here  --}}


<!-- Modal for video -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-body p-0">
        <div class="ratio ratio-16x9">
          <iframe src="https://www.youtube.com/embed/VIDEO_ID_HERE" title="Course Intro" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- breadcrumb end here here  --}}


{{--  video preview modal  --}}
<!-- Video Preview Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header border-0">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="ratio ratio-16x9">
          <iframe id="previewVideo" src="" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  const previewModal = document.getElementById('previewModal');
  const previewVideo = document.getElementById('previewVideo');

  previewModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const videoUrl = button.getAttribute('data-video');
    previewVideo.src = videoUrl + '?autoplay=1';
  });

  previewModal.addEventListener('hidden.bs.modal', function () {
    previewVideo.src = '';
  });
</script>


</main>
@endsection
