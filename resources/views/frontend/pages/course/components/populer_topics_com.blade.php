@if (!empty($populerTopics) && $populerTopics->count() > 0)
<section class="popular-topics py-5 bg-light">
  <div class="container">
    <div class="section_heading mb-2 ">
      <h2 class="section-title mb-2 ">Popular Topics</h2>
        <p class="text-muted  mb-4">Browse trending subcategories to boost your knowledge and career.</p>
      <hr>
    </div>
    <div class="row g-4">
      <div class="owl-carousel owl-theme topics_slider_1">
          @foreach ($populerTopics as $data)
          <a href="">
            <div class="topics_slider_items">
              <div class="card topic-card h-100 shadow-sm border-0 p-3 text-center bg-white rounded-4 hover-shadow">
                <div class="card-body">
                  <div class="icon-box mb-3 mx-auto">
                    <i class="bi bi-book text-primary fs-1"></i> <!-- You can use dynamic icons too -->
                  </div>
                  <h4 class="card-title text-dark fw-semibold text-muted">{{ $data->course_sub_category_name ?? 'Not Found !' }}</h4>
                  <p class="card-text text-muted ">{{ $data->course_sub_category_des ? Str::words($data->course_sub_category_des , 4) : 'Not Found' }}</p>
                </div>
              </div>
            </div>
          </a>
          @endforeach
      </div>
    </div>
  </div>
</section>
@endif


