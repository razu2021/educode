@if(!empty($data->course_about))
<section class="course-about-section section-padding">
  <div class="container">
    <h2 class="section-title">About this course</h2>
    <p class="course-description">
      {!!  $data->course_about ?? 'Data is not Found !'!!}
    </p>
  </div>
</section>
@endif