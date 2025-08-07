@if(!empty($instructors) && count($instructors) > 0)
<section>
  <div class="container section-padding">
    {{-- =========  section heading start here  --}}
    @include('frontend/pages/course/components/index/section_heading',[
      'heading' => 'Excellence in Teaching  ',
      'title' => " These industry-leading educators have empowered thousands of learners with their expertise and passion.",
    'section'=>'section1'
    ])
    {{-- =========  section heading end here  --}}
    <div class="row">
     @foreach ($instructors as $ins)
       
   
      <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-4">
        <div class="instructor-card p-4 rounded-4 text-center">
          <img src="{{asset('contents/frontend/assets/assetss/images/course/i1.jpg')}}" alt="Instructor" class="avatar mb-3">
          <h4 class="name">{{$ins->name}}</h4>
          {{-- <p class="title">Full Stack Developer</p> --}}

          <div class="skills my-2">
            <span class="skill">{{$ins->badge}}</span>
          </div>

          <div class="meta d-flex justify-content-center gap-4 my-3">
            <div><i class="bi bi-people"></i>   {{$ins->totalEnrolledStudentsCount()}} Students</div>
            
            <div><i class="bi bi-book"></i> {{$ins->course->count()}} Courses</div>
          </div>

          <a href="#" class="btn btn-outline-primary btn-sm rounded-pill">View Profile</a>
        </div>

      </div>
        @endforeach
      {{-- col end  --}}
    </div>
  </div>
</section>
@endif

