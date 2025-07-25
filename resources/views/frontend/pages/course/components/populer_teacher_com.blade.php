<section>
  <div class="container section-padding">
    <div class="row">
     @foreach ($instructorDetails as  $data)
       
  
      <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-4">
        <div class="instructor-card p-4 rounded-4 text-center">
          <img src="{{asset('contents/frontend/assets/assetss/images/course/i1.jpg')}}" alt="Instructor" class="avatar mb-3">
          <h4 class="name">{{$data->name ?? 'Not Found !'}}</h4>
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
      @endforeach
      {{-- col end  --}}
    </div>
  </div>
</section>
