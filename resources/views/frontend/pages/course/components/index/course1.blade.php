<section class="section-padding">
  <div class="container">
    <ul class="nav nav-pills justify-content-start mb-4 category-tabs" id="courseTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="top-tab" data-bs-toggle="pill" data-bs-target="#top" type="button" role="tab">Top</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="trending-tab" data-bs-toggle="pill" data-bs-target="#trending" type="button" role="tab">Trending</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="latest-tab" data-bs-toggle="pill" data-bs-target="#latest" type="button" role="tab">Latest</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="free-tab" data-bs-toggle="pill" data-bs-target="#free" type="button" role="tab">Free Course</button>
      </li>
    </ul>
    <hr>

    <div class="tab-content" id="courseTabContent">
      <div class="tab-pane fade show active" id="top" role="tabpanel">
        {{-- course start  --}}
        <div class="row">
          <div class="owl-carousel owl-theme top_course_slider ">
          @for ($i = 0; $i < 6; $i++)
            <div class="col-md-12 col-lg-12 pb-4 pt-4">
              <div class="course-card shadow-sm rounded overflow-hidden">
                <img src="{{asset('contents/frontend/assets/assetss/images/course/c2.jpg')}}" alt="Course Image" class="img-fluid course-image">
      
                <div class="p-3 course-content">
                  <h5 class="course-title fw-bold">Figma UI/UX Design Esential</h5>
                  <p class="author mb-1"><a href="#" class="text-primary text-decoration-none">Denial Walter Sclot</a></p>
                  <p class="description small text-muted">
                    has a validation state that can be triggered by attempting to submit the form without completing it.
                  </p>
                  <div class="rating d-flex align-items-center mb-2">
                    <span class="fw-bold me-2">4.7</span>
                    <span class="text-warning">★ ★ ★ ★ ★</span>
                    <span class="ms-2 text-dark">(2510)</span>
                  </div>
                  <div class="price mb-2">
                    <span class="fw-bold fs-5">12000 BDT</span>
                    <span class="text-danger text-decoration-line-through ms-2">2050 BDT</span>
                  </div>
                  <p class="meta small">
                    <span class="text-primary">Verified</span>
                    <span class="text-dark ms-2">Bestseller</span><br>
                    <span class="text-muted">Sponser: www.educode.com</span>
                  </p>
                  <a href="" class="btn btn-gradient w-100 mt-3">View More Information</a>
                </div>
              </div>
            </div>
          @endfor
         
        </div>
         <a href="#" class="btn btn-gradient w-100 mt-3">View More Course</a>
      </div>
      {{-- col end --}}
        {{-- course end  --}}
      </div>
      <div class="tab-pane fade" id="trending" role="tabpanel">
                {{-- course start  --}}
        <div class="row">
          <div class="owl-carousel owl-theme top_course_slider ">
          @for ($i = 0; $i < 6; $i++)
            <div class="col-md-12 col-lg-12 pb-4 pt-4">
              <div class="course-card shadow-sm rounded overflow-hidden">
                <img src="{{asset('contents/frontend/assets/assetss/images/course/c2.jpg')}}" alt="Course Image" class="img-fluid course-image">
      
                <div class="p-3 course-content">
                  <h5 class="course-title fw-bold">Figma UI/UX Design Esential</h5>
                  <p class="author mb-1"><a href="#" class="text-primary text-decoration-none">Denial Walter Sclot</a></p>
                  <p class="description small text-muted">
                    has a validation state that can be triggered by attempting to submit the form without completing it.
                  </p>
                  <div class="rating d-flex align-items-center mb-2">
                    <span class="fw-bold me-2">4.7</span>
                    <span class="text-warning">★ ★ ★ ★ ★</span>
                    <span class="ms-2 text-dark">(2510)</span>
                  </div>
                  <div class="price mb-2">
                    <span class="fw-bold fs-5">12000 BDT</span>
                    <span class="text-danger text-decoration-line-through ms-2">2050 BDT</span>
                  </div>
                  <p class="meta small">
                    <span class="text-primary">Verified</span>
                    <span class="text-dark ms-2">Bestseller</span><br>
                    <span class="text-muted">Sponser: www.educode.com</span>
                  </p>
                  <a href="" class="btn btn-gradient w-100 mt-3">View More Information</a>
                </div>
              </div>
            </div>
          @endfor
          
        </div>
        <a href="#" class="btn btn-gradient w-100 mt-3">View More Course</a>
      </div>
      {{-- col end --}}
        {{-- course end  --}}
      </div>
      <div class="tab-pane fade" id="latest" role="tabpanel">
                {{-- course start  --}}
        <div class="row">
          <div class="owl-carousel owl-theme top_course_slider ">
          @for ($i = 0; $i < 6; $i++)
            <div class="col-md-12 col-lg-12 pb-4 pt-4">
              <div class="course-card shadow-sm rounded overflow-hidden">
                <img src="{{asset('contents/frontend/assets/assetss/images/course/c2.jpg')}}" alt="Course Image" class="img-fluid course-image">
      
                <div class="p-3 course-content">
                  <h5 class="course-title fw-bold">Figma UI/UX Design Esential</h5>
                  <p class="author mb-1"><a href="#" class="text-primary text-decoration-none">Denial Walter Sclot</a></p>
                  <p class="description small text-muted">
                    has a validation state that can be triggered by attempting to submit the form without completing it.
                  </p>
                  <div class="rating d-flex align-items-center mb-2">
                    <span class="fw-bold me-2">4.7</span>
                    <span class="text-warning">★ ★ ★ ★ ★</span>
                    <span class="ms-2 text-dark">(2510)</span>
                  </div>
                  <div class="price mb-2">
                    <span class="fw-bold fs-5">12000 BDT</span>
                    <span class="text-danger text-decoration-line-through ms-2">2050 BDT</span>
                  </div>
                  <p class="meta small">
                    <span class="text-primary">Verified</span>
                    <span class="text-dark ms-2">Bestseller</span><br>
                    <span class="text-muted">Sponser: www.educode.com</span>
                  </p>
                  <a href="#" class="btn btn-gradient w-100 mt-3">View More Information</a>
                </div>
              </div>
            </div>
          @endfor
          
        </div>
        <a href="" class="btn btn-gradient w-100 mt-3">View More Course</a>
      </div>
      {{-- col end --}}
        {{-- course end  --}}
      </div>
      <div class="tab-pane fade" id="free" role="tabpanel">
                {{-- course start  --}}
        <div class="row">
          <div class="owl-carousel owl-theme top_course_slider ">
          @for ($i = 0; $i < 6; $i++)
            <div class="col-md-12 col-lg-12 pb-4 pt-4">
              <div class="course-card shadow-sm rounded overflow-hidden">
                <img src="{{asset('contents/frontend/assets/assetss/images/course/c2.jpg')}}" alt="Course Image" class="img-fluid course-image">
      
                <div class="p-3 course-content">
                  <h5 class="course-title fw-bold">Figma UI/UX Design Esential</h5>
                  <p class="author mb-1"><a href="#" class="text-primary text-decoration-none">Denial Walter Sclot</a></p>
                  <p class="description small text-muted">
                    has a validation state that can be triggered by attempting to submit the form without completing it.
                  </p>
                  <div class="rating d-flex align-items-center mb-2">
                    <span class="fw-bold me-2">4.7</span>
                    <span class="text-warning">★ ★ ★ ★ ★</span>
                    <span class="ms-2 text-dark">(2510)</span>
                  </div>
                  <div class="price mb-2">
                    <span class="fw-bold fs-5">12000 BDT</span>
                    <span class="text-danger text-decoration-line-through ms-2">2050 BDT</span>
                  </div>
                  <p class="meta small">
                    <span class="text-primary">Verified</span>
                    <span class="text-dark ms-2">Bestseller</span><br>
                    <span class="text-muted">Sponser: www.educode.com</span>
                  </p>
                  <a href="#" class="btn btn-gradient w-100 mt-3">View More Information</a>
                </div>
              </div>
            </div>
          @endfor
         
        </div>
         <a href="" class="btn btn-gradient w-100 mt-3">View More Course</a>
      </div>
      {{-- col end --}}
        {{-- course end  --}}
      </div>
    </div>
  </div>
</section>