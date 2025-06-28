@extends('layouts.webmaster')
@section('website_contents')
<main>
{{-- breadcrumb start here  --}}
<section class="course-hero text-white">
  <div class="container py-5">
    <div class="row align-items-center">
      
      <!-- LEFT SIDE -->
      <div class="col-lg-8">
        <nav class="breadcrumb text-white mb-2">
          <span class="me-2"> Marketing</span> › 
          <span class="me-2"> Digital Marketing</span> › 
          <span class="fw-bold"> Copywriting</span>
        </nav>

        <h1 class="course-title">The Complete AI-Powered Copywriting Course & ChatGPT Course</h1>
        <p class="course-subtitle">Become a Pro Copywriter with ChatGPT. Get 70+ Pro Templates & Tools.</p>

        <div class="course-meta d-flex flex-wrap gap-3 mt-3">
          <div><span class="text-warning fw-bold">★ 4.3</span> (1,917 ratings) · 126,889 students</div>
         
        </div>
        <div class="course-meta d-flex flex-wrap gap-3 mt-3">
          
          <div>Created by <a href="#" class="text-info">Md Razu Hossain Raj</a></div>
          <div>🕒 Last updated 06/2025</div>
          <div>🌐 English [Auto], Bangla [Auto]</div>
        </div>

      </div>

      <!-- RIGHT SIDE -->
      <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="video-wrapper position-relative">
          <img src="{{asset('contents/frontend/assets/assetss/images/course/c1.jpg')}}" class="img-fluid rounded" alt="Course Intro">
          <button class="play-btn position-absolute top-50 start-50 translate-middle" data-bs-toggle="modal" data-bs-target="#videoModal">
            <i class="bi bi-play-fill"></i>
          </button>
        </div>
      </div>

    </div>
  </div>
</section>

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

{{-- course details strat here  --}}
<section class="section-padding">
  <div class="container">
    <div class="row g-5">
      <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7 mt-4">
         <section class="course-about-section section-padding">
          <div class="container">
            <h2 class="section-title">About this course</h2>
            <p class="course-description">
              Learn how to build powerful Laravel applications from scratch. This course covers routing, controllers, Eloquent, Blade, and deployment strategies.
            </p>

            <div class="row about-lists mt-4">
              <div class="col-md-6">
                <h4 class="about-subtitle">What you’ll learn</h4>
                <ul class="about-list">
                  <li><i class="bi bi-check-circle-fill"></i> Build modern Laravel web applications</li>
                  <li><i class="bi bi-check-circle-fill"></i> Use Eloquent ORM efficiently</li>
                  <li><i class="bi bi-check-circle-fill"></i> RESTful APIs with Laravel</li>
                  <li><i class="bi bi-check-circle-fill"></i> Deploy with shared hosting & VPS</li>
                </ul>
              </div>
              <div class="col-md-6">
                <h4 class="about-subtitle">Requirements</h4>
                <ul class="about-list">
                  <li><i class="bi bi-check-circle-fill"></i> Basic understanding of PHP</li>
                  <li><i class="bi bi-check-circle-fill"></i> Familiarity with HTML/CSS</li>
                  <li><i class="bi bi-check-circle-fill"></i> Internet connection 😄</li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        {{-- course about end --}}
        <section class="course-curriculum section-padding">
          <div class="container">
            <h2 class="section-title">Course Content</h2>

            <div class="accordion" id="curriculumAccordion">
              <!-- Single Course Section -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="section1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                    <span>Introduction to Laravel</span>
                    <span class="duration">15 min</span>
                  </button>
                </h2>
                <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#curriculumAccordion">
                  <div class="accordion-body">
                    <ul class="topic-list">
                      <li>
                        <div class="topic-title">
                          <i class="bi bi-play-circle text-success"></i>
                          What is Laravel?
                        </div>
                        <div class="topic-meta">
                          <span class="time">3:00</span>
                          <a href="#" class="preview-btn" data-bs-toggle="modal" data-bs-target="#previewModal" data-video="https://www.youtube.com/embed/dQw4w9WgXcQ">
                            <i class="bi bi-eye-fill"></i> 
                          </a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- More Sections (Repeatable) -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="section2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                    <span>Routing & Controllers</span>
                    <span class="duration">25 min</span>
                  </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
                  <div class="accordion-body">
                    <ul class="topic-list">
                      @for ($i = 0 ; $i < 5 ; $i++)
                        
                      
                      <li>
                        <div class="topic-title">
                          <i class="bi bi-play-circle text-success"></i>
                          What is Laravel?
                        </div>
                        <div class="topic-meta">
                          <span class="time">3:00</span>
                          <a href="#" class="preview-btn" data-bs-toggle="modal" data-bs-target="#previewModal" data-video="https://www.youtube.com/embed/dQw4w9WgXcQ">
                            <i class="bi bi-eye-fill"></i> 
                          </a>
                        </div>
                      </li>
                      @endfor

                    </ul>
                  </div>
                </div>
              </div>

              <!-- Add more sections as needed -->
            </div>
          </div>
        </section>
        {{-- course content end here  --}}
        <section class="course-description-section">
          <div class="container">
            <h2 class="section-title">Course Description</h2>
            <div class="description-content">
              <p>
                This Laravel course is designed for both beginners and intermediate developers. You'll build modern, dynamic web applications using Laravel's elegant syntax and powerful features.
              </p>

              <p>
                Through practical projects, you’ll gain hands-on experience in routing, Blade templating, Eloquent ORM, authentication, and much more.
              </p>

              <ul>
                <li>✅ Learn Laravel fundamentals in depth</li>
                <li>🧠 Build RESTful APIs with Laravel</li>
                <li>🚀 Hands-on projects & real-world scenarios</li>
                <li>🔒 Secure authentication and authorization</li>
                <li>📦 Deploy Laravel apps to shared hosting or VPS</li>
              </ul>

              <p>
                By the end of this course, you’ll be confident in your Laravel development skills and able to build scalable, professional-grade applications.
              </p>
            </div>
          </div>
        </section>
        {{-- course description end here  --}}
        <section class="instructor-profile-section">
          <div class="container">
            <div class="row align-items-start">
              <!-- Left Column: Image (optional) -->
              <div class="col-md-3 text-center mb-4 mb-md-0">
                <img src="{{asset('contents/frontend/assets/assetss/images/course/i1.jpg')}}" alt="Instructor Image" class="instructor-img">
              </div>

              <!-- Right Column: Details -->
              <div class="col-md-9">
                <h3 class="instructor-name">Dr. Angela Yu</h3>
                <p class="instructor-title">Developer and Lead Instructor</p>

                <ul class="instructor-stats">
                  <li><strong>4.7</strong> Instructor Rating</li>
                  <li><strong>975,510</strong> Reviews</li>
                  <li><strong>3,196,461</strong> Students</li>
                  <li><strong>7</strong> Courses</li>
                </ul>

                <div class="instructor-bio mt-3">
                  <p>I'm Angela, a developer with a passion for teaching. I'm the lead instructor at the London App Brewery...</p>
                  <p>My first foray into programming was when I was just 12 years old...</p>
                  <p>I spend most of my time researching how to make learning to code fun and make hard concepts easy to understand...</p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <hr>
        {{-- instructor end here --}}
          <section class="course-review-section section-padding">
            <div class="container">
              <h2 class="section-title">Student Feedback</h2>

              <!-- Rating Summary -->
              <div class="row align-items-center mb-4">
                <div class="col-md-4 text-center text-md-start">
                  <div class="average-rating">
                    <span class="score">4.7</span>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-half"></i>
                    </div>
                    <p class="total-reviews">975,510 Reviews</p>
                  </div>
                </div>

                <!-- Rating Breakdown -->
                <div class="col-md-8">
                  <div class="rating-bars">
                    @for($i = 5; $i >= 1; $i--)
                    <div class="bar-row">
                      <span class="star-label">{{ $i }} <i class="bi bi-star-fill"></i></span>
                      <div class="bar">
                        <div class="fill" style="width: {{ rand(20, 100) }}%;"></div>
                      </div>
                      <span class="percent">{{ rand(40, 95) }}%</span>
                    </div>
                    @endfor
                  </div>
                </div>
              </div>

              <!-- Individual Reviews -->
              <div class="review-list">
                @for($i = 1; $i <= 3; $i++)
                <div class="review-card">
                  <div class="review-header">
                    <img src="{{asset('contents/frontend/assets/assetss/images/course/i1.jpg')}}" class="avatar" alt="Student">
                    <div class="info">
                      <span class="name">Student {{ $i }}</span>
                      <div class="stars">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                      </div>
                    </div>
                  </div>
                  <div class="review-text mt-2">
                    Really helpful course! The explanations were super clear, and I finally understood Laravel relationships.
                  </div>
                  <div class="review-date text-muted">Reviewed on June 23, 2025</div>
                </div>
                @endfor
                <section class="section-padding">
                  <form class="course-review-form p-30 bg-white rounded-3 shadow-sm">
                      <h4 class="mb-20 fw-semibold">Leave a Course Review</h4>

                      <!-- Rating -->
                      <div class="mb-15">
                        <label class="form-label fw-medium">Rating</label>
                        <div class="rating-stars d-flex gap-5">
                          <input type="radio" name="rating" value="5" id="star5"><label for="star5">★</label>
                          <input type="radio" name="rating" value="4" id="star4"><label for="star4">★</label>
                          <input type="radio" name="rating" value="3" id="star3"><label for="star3">★</label>
                          <input type="radio" name="rating" value="2" id="star2"><label for="star2">★</label>
                          <input type="radio" name="rating" value="1" id="star1"><label for="star1">★</label>
                        </div>
                      </div>

                      <!-- Review Title -->
                      <div class="mb-15">
                        <label for="reviewTitle" class="form-label fw-medium">Review Title</label>
                        <input type="text" class="form-control" id="reviewTitle" name="title" placeholder="e.g., Excellent course for beginners">
                      </div>

                      <!-- Review Body -->
                      <div class="mb-20">
                        <label for="reviewBody" class="form-label fw-medium">Your Review</label>
                        <textarea class="form-control" id="reviewBody" name="review" rows="5" placeholder="Share your learning experience..."></textarea>
                      </div>

                      <!-- Submit -->
                      <div>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                      </div>
                    </form>

                </section>
              </div>
            </div>

          </section>
{{-- course reating end here --}}

          <section class="section-padding ">
            <div class="container">
              <div class="row">
                @for ($i =0 ; $i < 3 ; $i++)
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
                <div class="button1">
                  <a href=""><button class="btn btn-outline-primary mt-4 custom_button w-100 fs-4">More Courses </button></a>
                </div>
              </div>
            </div>
          </section>






      </div>
      {{-- col end --}}
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 ">
        <div class="course-price-card sticky-card">
          <div class="tab-header d-flex justify-content-between mb-3">
            <span class="tab active">Personal</span>
           
          </div>

          <div class="price-section mb-3">
            <h3 class="price">$18.99 <span class="old-price">$29.99</span> <span class="discount">37% off</span></h3>
            <p class="limited-offer text-danger"><i class="bi bi-clock-fill"></i> 2 days left at this price!</p>
          </div>

          <div class="button-group mb-3">
            <button class="btn btn-primary w-100 mb-2">Add to cart</button>
            <button class="btn btn-outline-primary w-100"> <a href="{{route('ssl_payment_initiate')}}">Buy now</a></button>
          </div>

          <p class="text-muted text-center mb-3">30-Day Money-Back Guarantee<br>Full Lifetime Access</p>

          <div class="link-group mb-3 d-flex justify-content-between">
            <a href="#">Share</a>
            <a href="#">Gift this course</a>
            <a href="#">Apply Coupon</a>
          </div>

          <div class="coupon-box mb-3">
            <input type="text" class="form-control mb-2" placeholder="Enter Coupon">
            <button class="btn btn-primary w-100">Apply</button>
          </div>

          <hr>

          <div class="personal-plan text-center mt-3">
            <h6 class="fw-bold">Subscribe to all courses</h6>
            <p class="text-muted">Try Personal Plan free – access 26,000+ courses</p>
            <button class="btn btn-outline-primary w-100 fs-7">Try Free Plan</button>
          </div>
        </div>

      </div>
      {{-- col end --}}
    </div>
  </div>
</section>
{{-- course details end here  --}}





















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
