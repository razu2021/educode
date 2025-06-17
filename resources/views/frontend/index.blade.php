@extends('layouts.webmaster')
@section('website_contents')




    <!-- **************** MAIN CONTENT START **************** -->
  <main>


<!--   banner hero section  -->
<section class="banner1">
  <div class="container banner1bg">
    <div class="owl-carousel owl-theme banner1_index_slider">

    
    <div class="row">
      <div class="col-12 col-md-6 col-lg-8 col-xl-8 col-xxl-8 ">
        <div class="banner1_content">
          <h1>Start Learning From Best <br> <span> Platform </span></h1>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis, adipisci culpa quibusdam ab et sapiente fuga a aut! Obcaecati optio quibusdam voluptatibus animi, labore blanditiis rerum quasi cumque fugit amet?</p>

        </div>
      </div>
      {{-- col end  --}}
      <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
        <div class="banner1_image">
          <img src="{{asset('contents/frontend/assets/assetss')}}/images/banner/banner1.png" alt="Banner image" w-25>
        </div>
      </div>
      {{-- col end  --}}

    </div>
    {{-- row end here  --}}
    <div class="row">
      <div class="col-12 col-md-6 col-lg-8 col-xl-8 col-xxl-8 ">
        <div class="banner1_content">
          <h1>Start Learning From Best <br> <span> Platform </span></h1>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis, adipisci culpa quibusdam ab et sapiente fuga a aut! Obcaecati optio quibusdam voluptatibus animi, labore blanditiis rerum quasi cumque fugit amet?</p>

        </div>
      </div>
      {{-- col end  --}}
      <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
        <div class="banner1_image">
          <img src="{{asset('contents/frontend/assets/assetss')}}/images/banner/banner1.png" alt="Banner image" w-25>
        </div>
      </div>
      {{-- col end  --}}

    </div>
    {{-- row end here  --}}


    </div>
    {{-- carousel end here  --}}
  </div>
</section>
{{-- banner end here  --}}


<section class="py-5">
  <div class="container">
   <div class="col-lg-6">
     <h2>All the skills you need in one place</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur id iste eum tempore ducimus? Autem beatae dolor molestias corrupti. Perspiciatis rem, cupiditate iure velit minima accusantium impedit non atque inventore.</p>
   </div>
    <div class="row g-4 pt-5">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="info-card d-flex align-items-start gap-3 p-4 rounded shadow-sm h-100">
          <div class="icon text-primary fs-1">
            <i class="bi bi-lightning-fill"></i>
          </div>
          <div>
            <h5 class="fw-bold mb-1">Best Education Platform</h5>
            <p class="text-muted mb-0">Our system is optimized for speed and efficiency.</p>
          </div>
        </div>
      </div>
      
      <div class="col-12 col-md-6 col-lg-4">
        <div class="info-card d-flex align-items-start gap-3 p-4 rounded shadow-sm h-100">
          <div class="icon text-success fs-1">
            <i class="bi bi-shield-check"></i>
          </div>
          <div>
            <h5 class="fw-bold mb-1">Expert Instructor</h5>
            <p class="text-muted mb-0">Built with the latest security standards in mind.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="info-card d-flex align-items-start gap-3 p-4 rounded shadow-sm h-100">
          <div class="icon text-danger fs-1">
            <i class="bi bi-people-fill"></i>
          </div>
          <div>
            <h5 class="fw-bold mb-1"> Smart Solutions </h5>
            <p class="text-muted mb-0">Designed with user experience as our top priority.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
{{-- info card end  --}}




{{-- course start here  --}}
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
                  <a href="#" class="btn btn-gradient w-100 mt-3">View More Information</a>
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
                  <a href="#" class="btn btn-gradient w-100 mt-3">View More Information</a>
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
        <a href="#" class="btn btn-gradient w-100 mt-3">View More Course</a>
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
         <a href="#" class="btn btn-gradient w-100 mt-3">View More Course</a>
      </div>
      {{-- col end --}}
        {{-- course end  --}}
      </div>
    </div>
  </div>
</section>
{{-- --- course end here  --}}

<section class="py-5">
  <div class="container">
    <div class="row g-4">
      
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="category_card1 text-center p-4 shadow-sm rounded">
          <div class="icon text-primary mb-3 fs-2">
            <i class="bi bi-brush"></i>
          </div>
          <h6 class="fw-bold mb-1">Design</h6>
          <p class="text-muted small mb-0">120+ Courses</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="category_card1 text-center p-4 shadow-sm rounded">
          <div class="icon text-success mb-3 fs-2">
            <i class="bi bi-code-slash"></i>
          </div>
          <h6 class="fw-bold mb-1">Development</h6>
          <p class="text-muted small mb-0">300+ Courses</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="category_card1 text-center p-4 shadow-sm rounded">
          <div class="icon text-danger mb-3 fs-2">
            <i class="bi bi-bar-chart-fill"></i>
          </div>
          <h6 class="fw-bold mb-1">Marketing</h6>
          <p class="text-muted small mb-0">90+ Courses</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="category_card1 text-center p-4 shadow-sm rounded">
          <div class="icon text-warning mb-3 fs-2">
            <i class="bi bi-currency-dollar"></i>
          </div>
          <h6 class="fw-bold mb-1">Finance</h6>
          <p class="text-muted small mb-0">60+ Courses</p>
        </div>
      </div>

    </div>
  </div>
</section>










  </main>


    <!-- **************** MAIN CONTENT END **************** -->





















@endsection
