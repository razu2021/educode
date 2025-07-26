@if (Route::is('coursecategory'))
    @if(!empty($populerTopics) && $populerTopics->count() > 0)
  <section class="popular-topics py-5 bg-light">
    <div class="container">
      <h2 class="section-title mb-2 text-start">Popular Topics</h2>
      <p class="text-muted text-start mb-4">Browse trending subcategories to boost your knowledge and career.</p>
    
          <div class="row g-4">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 ">
              <div class="owl-carousel owl-theme topics_slider_1">
              @foreach ($populerTopics as $data)
          
                <div class="topic_items">
                  <a href="">
                    <div class="card topic-card h-100 shadow-sm border-0 p-3 text-center bg-white rounded-4 hover-shadow">
                      <div class="card-body">
                        <div class="icon-box mb-3 mx-auto">
                          <i class="bi bi-book text-primary fs-2"></i>
                        </div>
                        <h5 class="card-title text-dark fw-semibold">{{ $data->course_sub_category_name ?? 'Not Found !' }}</h5>
                        {{-- <p class="card-text text-muted small">{{ $data->course_sub_category_des ? Str::limit($data->course_sub_category_des , 30) : 'Not Found !'}}</p> --}}
                        <p class="card-text text-muted small">{{ $data->course->count()}} + Courses </p>
                      </div>
                    </div>
                    </a>
                </div>
                @endforeach
              </div>
          </div>
      </div>
    </div>
  </section>
@endif
@elseif(Route::is('coursesubcategory'))
  @if(!empty($populerTopics) && $populerTopics->count() > 0)
  <section class="popular-topics py-5 bg-light">
    <div class="container">
      <h2 class="section-title mb-2 text-start">Popular Topics</h2>
      <p class="text-muted text-start mb-4">Browse trending subcategories to boost your knowledge and career.</p>
    
          <div class="row g-4">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 ">
              <div class="owl-carousel owl-theme topics_slider_1">
              @foreach ($populerTopics as $data)
                <div class="topic_items">
                  <a href="">
                    <div class="card topic-card h-100 shadow-sm border-0 p-3 text-center bg-white rounded-4 hover-shadow">
                      <div class="card-body">
                        <div class="icon-box mb-3 mx-auto">
                          <i class="bi bi-book text-primary fs-2"></i>
                        </div>
                        <h5 class="card-title text-dark fw-semibold">{{ $data->course_child_category_name ?? 'Not Found !' }}</h5>
                        {{-- <p class="card-text text-muted small">{{ $data->course_sub_category_des ? Str::limit($data->course_sub_category_des , 30) : 'Not Found !'}}</p> --}}
                        <p class="card-text text-muted small">{{ $data->course->count()}} + Courses </p>
                      </div>
                    </div>
                    </a>
                </div>
                @endforeach
              </div>
          </div>
      </div>
    </div>
  </section>
  @endif
@endif
