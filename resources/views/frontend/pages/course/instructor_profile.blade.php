@extends('layouts.webmaster')
@section('website_contents')
<main>
{{-- breadcrumb start here  --}}
<section class="instructor-banner">
  <div class="container py-5">
    <div class="row align-items-center">
      <!-- Left: Instructor Info -->
      <div class="col-md-8">
        <p class="section-label">Instructor</p>
        <h1 class="instructor-name">Henry Habib</h1>
        <p class="instructor-bio">
          GenAI Automation Productivity and AI Agents | 300K Students
        </p>
        <span class="badge instructor-badge">
          <i class="bi bi-patch-check-fill me-1"></i> Educode Instructor Partner
        </span>
      </div>
      <div class="col-lg-4">
        <div class="card instructor-card-2 shadow-sm border-0 rounded-4 overflow-hidden">
        <img src="{{asset('contents/frontend/assets/assetss/images/course/i1.jpg')}}" class="card-img-top" alt="Instructor Image">

        <div class="card-body text-center">
            <h5 class="card-title fw-bold mb-1">Henry Habib</h5>
            <p class="text-muted mb-3">GenAI Automation & AI Agents Expert</p>

            <div class="d-flex justify-content-center flex-wrap gap-3 mb-3">
            <div class="stat">
                <h6 class="fw-bold mb-0">335K+</h6>
                <small class="text-muted">Learners</small>
            </div>
            <div class="stat">
                <h6 class="fw-bold mb-0">24</h6>
                <small class="text-muted">Courses</small>
            </div>
            <div class="stat">
                <h6 class="fw-bold mb-0">78K+</h6>
                <small class="text-muted">Reviews</small>
            </div>
            </div>

            <div class="rating mb-3">
            <span class="badge bg-success px-3 py-2 rounded-pill">
                <i class="bi bi-star-fill me-1"></i> 4.7 Rating
            </span>
            </div>

            <div class="d-flex justify-content-center gap-2">
            <a href="#" class="btn btn-outline-primary btn-sm">
               <i class="bi bi-twitter-x"></i>
            </a>
            
            <a href="#" class="btn btn-outline-primary btn-sm">
               <i class="bi bi-twitter-x"></i>
            </a>
            
            <a href="#" class="btn btn-outline-primary btn-sm">
               <i class="bi bi-twitter-x"></i>
            </a>
            
            </div>
        </div>
        </div>


      </div>
      </div>
    </div>
    <!-- Stats -->
  </div>
</section>







{{-- course details strat here  --}}
<section class="section-padding">
  <div class="container">
    <div class="row g-5">
      <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7 mt-4">
         <section class="course-about-section section-padding">
  <div class="container">
    <h2 class="section-title">About this course</h2>

    <div class="course-description-wrapper">
      <p class="course-description short-text">
        Learn how to build powerful Laravel applications from scratch. This course covers routing, controllers, Eloquent, Blade, and deployment strategies.
      </p>

      <div class="full-description collapse" id="fullCourseDescription">
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa cupiditate repudiandae earum beatae molestias voluptatem!... (long text)
        </p>
      </div>

      <button id="toggleDescriptionBtn" class="btn btn-link p-0 mt-2" data-bs-toggle="collapse" data-bs-target="#fullCourseDescription" aria-expanded="false">
        See more
      </button>
    </div>
  </div>
</section>


        {{-- course about end --}}
                  <section class="section-padding ">
            <div class="container">
              <div class="row">
                @for ($i =0 ; $i < 5 ; $i++)
                <div class="col-12 col-lg-4 mt-4">
                  <div class="card_2">
                    <div class="card-image">
                      <img  src="{{asset('contents/frontend/assets/assetss/images/course/i1.jpg')}}" alt="Course Image">
                      <span class="badge">Bestseller</span>
                    </div>
                    <div class="card-content">
                      <h3 class="course-title">Mastering Laravel for Beginners</h3>
                      <p class="instructor">by Md Razu Hossain Raj</p>

                      <div class="rating">
                        <span class="stars">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i>
                        </span>
                        <span class="rating-value">4.7</span>
                        <span class="review-count">(1,200)</span>
                      </div>

                      <div class="price">
                        <span class="current">$49.99</span>
                        <span class="old">$89.99</span>
                      </div>
                    </div>
                  </div>

                </div>
                @endfor
               
              </div>
            </div>
          </section>
      

      </div>
      {{-- col end --}}
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 ">
       
      {{-- col end --}}
    </div>
  </div>
</section>
{{-- course details end here  --}}










</main>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("toggleDescriptionBtn");
    const content = document.getElementById("fullCourseDescription");

    content.addEventListener("shown.bs.collapse", () => {
      toggleBtn.textContent = "See less";
    });

    content.addEventListener("hidden.bs.collapse", () => {
      toggleBtn.textContent = "See more";
    });
  });
</script>


@endsection