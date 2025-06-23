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

























</main>
@endsection
