{{-- breadcrumb start here  --}}
<section class="course-hero text-white">
  <div class="container py-5">
    <div class="row align-items-center">
      
      <!-- LEFT SIDE -->
      <div class="col-lg-8">
        <nav class="breadcrumb text-white mb-2">
          <span class="me-2"> Explore courses from <strong style="color: #6D28D1"> {{$category->course_category_name ?? 'Not Found !' }}</strong></span>
          
          
        </nav>

        <h1 class="course-title">{{$category->course_category_title ?? 'Not Found !'}}</h1>
        <p class="course-subtitle">{{$category->course_category_des ?? 'Not found !'}}</p>


      </div>

      <!-- RIGHT SIDE -->
      <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="video-wrapper position-relative">
         
        </div>
      </div>

    </div>
  </div>
</section>

