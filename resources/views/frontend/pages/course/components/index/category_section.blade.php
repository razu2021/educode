<section class="section-padding section2">
  <div class="container">
{{-- =========  section heading start here  --}}
    @include('frontend/pages/course/components/index/section_heading',[
      'heading' => 'Explore Top Categories',
      'title' => "Discover courses grouped by your interest — from tech to business and beyond.",
    'section'=>'section2'
    ])
{{-- =========  section heading end here  --}}
    <div class="row g-4">
      
      @foreach ($allcategorys as $category)
        

      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4">
        <div class="category_card1 text-center p-4 shadow-sm rounded">
          <div class="icon text-primary mb-3 fs-2">
            <b>{{ $loop->iteration }}</b>
          </div>
          <h6 class="fw-bold mb-1">{{$category->course_category_name ?? 'N/A'}}</h6>
          <p class="text-muted small mb-0">{{$category->CourseCategorys->count() ?? 'N/A'}}+ Courses</p>
          
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>