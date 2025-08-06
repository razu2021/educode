<section class="section-padding section2">
  <div class="container">
{{-- =========  section heading start here  --}}
    @include('frontend/pages/course/components/index/section_heading',[
      'heading' => 'All the skills you need in one place',
      'title' => "Empower yourself with in-demand skills, taught by industry experts. Whether you're starting fresh or advancing your career, everything you need is right here — in one powerful platform.",
    'section'=>'section2'
    ])
{{-- =========  section heading end here  --}}
    <div class="row g-4">
      
      @for ($i = 0; $i < 8; $i++ )
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4">
        <div class="category_card1 text-center p-4 shadow-sm rounded">
          <div class="icon text-primary mb-3 fs-2">
            <i class="bi bi-brush"></i>
          </div>
          <h6 class="fw-bold mb-1">Design</h6>
          <p class="text-muted small mb-0">120+ Courses</p>
        </div>
      </div>
     @endfor
    </div>
  </div>
</section>