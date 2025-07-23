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
{{-- --- course end here  --}}

<section class="section-padding section2">
  <div class="container">
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
{{--   instructor card design  --}}
<section>
  <div class="container section-padding">
    <div class="row">
      @for ($i = 0; $i < 8; $i++)
      <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-4">
        <div class="instructor-card p-4 rounded-4 text-center">
          <img src="{{asset('contents/frontend/assets/assetss/images/course/i1.jpg')}}" alt="Instructor" class="avatar mb-3">
          <h4 class="name">Md Razu Hossain Raj</h4>
          <p class="title">Full Stack Developer</p>

          <div class="skills my-2">
            <span class="skill">Laravel</span>
            <span class="skill">Vue.js</span>
            <span class="skill">API</span>
          </div>

          <div class="meta d-flex justify-content-center gap-4 my-3">
            <div><i class="bi bi-people"></i> 1.2k Students</div>
            <div><i class="bi bi-book"></i> 12 Courses</div>
          </div>

          <a href="#" class="btn btn-outline-primary btn-sm rounded-pill">View Profile</a>
        </div>

      </div>
       @endfor
      {{-- col end  --}}
    </div>
  </div>
</section>





{{--  testimonila start here  --}}
<section class="testimonial-slider-section  section-padding section2">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="section-title">Student Feedback</h2>
      <p class="section-subtitle">From real learners</p>
    </div>

    <div class="owl-carousel testimonial-carousel">
      @for ($i = 0; $i < 5; $i++)
      <div class="testimonial-card p-4 rounded-4 m-4">
        <div class="d-flex align-items-center mb-3 testimonial_image">
          <img src="{{asset('contents/frontend/assets/assetss/images/course/i1.jpg')}}" class="avatars me-3" alt="User">
          <div>
            <h5 class="name mb-0">Razu Hossain</h5>
            <small class="role text-muted">Full Stack Dev</small>
          </div>
        </div>
        <p class="testimonial-text">
          "Absolutely amazing experience! Highly recommended for every developer."
        </p>
        <div class="rating">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star text-warning"></i>
        </div>
      </div>
      @endfor
    </div>
  </div>
</section>



{{--  testimonila end here  --}}


{{--  faq use start here  --}}
<section class="faq-section section-padding">
  <div class="container">
    <h2 class="faq-title">Frequently Asked Questions</h2>
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
            What is your return policy?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            We offer a 30-day money-back guarantee. No questions asked!
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
            How do I access my courses?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            You can access your courses by logging into your account and going to “My Courses”.
          </div>
        </div>
      </div>
      <!-- Add more items as needed -->
    </div>
  </div>
</section>

{{--  faq use end here  --}}

{{-- blog start here  --}}
<section class="section-padding">
  <div class="container">
    <div class="row ">
      @for ($i = 0; $i < 4; $i++ )
      <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-4 d-flex justify-content-center">
          <div class="blog-card">
            <div class="card-image">
              <img src="{{asset('contents/frontend/assets/assetss/images/course/c2.jpg')}}" alt="Blog Image">
              <span class="tag">Tutorial</span>
            </div>
            <div class="card-content">
              <h3 class="title">Master Laravel in 30 Days</h3>
              <p class="excerpt">
                Learn everything from routing to deploying in this comprehensive Laravel bootcamp!
              </p>
              <div class="author">
                <img src="{{asset('contents/frontend/assets/assetss/images/course/c2.jpg')}}" alt="Author">
                <div class="info">
                  <span class="name">Md Razu Hossain Raj</span>
                  <span class="date">June 23, 2025</span>
                </div>
              </div>
            </div>
          </div>
      </div>
      {{-- col end  --}}
      @endfor
    </div>
  </div>
</section>
{{-- blog start end here  --}}

<section class="cta-section py-5">
  <div class="container">
    <div class="row g-4">
      <!-- Student Card -->
      <div class="col-12 col-md-6">
        <div class="cta-card text-white d-flex justify-content-between align-items-center p-4 rounded-4 h-100"
             style="background-image: url('{{asset('contents/frontend/assets/assetss/images/course/image_1.png')}}');">
          <div class="cta-content">
            <h2 class="cta-title">Join now to <br> start learning</h2>
            <p class="cta-subtitle">Learn from our quality instructors!</p>
            <a href="#" class="btn btn-light fw-semibold px-4 py-2 mt-2">Get started</a>
          </div>
          {{-- <div class="cta-img">
            <img src="{{ asset('images/student.png') }}" alt="Student" class="img-fluid">
          </div> --}}
        </div>
      </div>

      <!-- Instructor Card -->
      <div class="col-12 col-md-6">
        <div class="cta-card text-white d-flex justify-content-between align-items-center p-4 rounded-4 h-100"
             style="background-image: url('{{asset('contents/frontend/assets/assetss/images/course/image_2.png')}}');">
          <div class="cta-content">
            <h2 class="cta-title">Become a new <br> instructor</h2>
            <p class="cta-subtitle">Teach thousands of students and earn money!</p>
            <a href="#" class="btn btn-light fw-semibold px-4 py-2 mt-2">Join now</a>
          </div>
          {{-- <div class="cta-img">
            <img src="{{ asset('images/instructor.png') }}" alt="Instructor" class="img-fluid">
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</section>

{{-- instructor and student join end here  --}}




  </main>


    <!-- **************** MAIN CONTENT END **************** -->





















@endsection
