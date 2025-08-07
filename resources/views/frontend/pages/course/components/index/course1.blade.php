<section class="section-padding">
  <div class="container">
    <ul class="nav nav-pills justify-content-start mb-4 category-tabs" id="courseTab" role="tablist">
      @if(!empty($topcourses) && count($topcourses) > 0)
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="top-tab" data-bs-toggle="pill" data-bs-target="#top" type="button" role="tab">Top</button>
      </li>
       @endif

      @if(!empty($trandingcourses) && count($trandingcourses) > 0)
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="trending-tab" data-bs-toggle="pill" data-bs-target="#trending" type="button" role="tab">Trending</button>
      </li>
      @endif

       
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="latest-tab" data-bs-toggle="pill" data-bs-target="#latest" type="button" role="tab">Latest</button>
      </li>
    


     
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="free-tab" data-bs-toggle="pill" data-bs-target="#free" type="button" role="tab">Free Course</button>
      </li>


    </ul>
    <hr>
    {{-- top course tab start herre --}}
      <div class="tab-content" id="courseTabContent">
              @if(!empty($topcourses) && count($topcourses) > 0)
              <div class="tab-pane fade show active" id="top" role="tabpanel">
                {{-- course start  --}}
                <div class="row">
                  <div class="owl-carousel owl-theme top_course_slider ">
                    @foreach ($topcourses as $topcourse)
                    <div class="col-md-12 col-lg-12 pb-4 pt-4">
                      <div class="course-card shadow-sm rounded overflow-hidden">
                        <img src="{{asset('uploads/website/'.$topcourse->course_image)}}" alt="Course Image" class="img-fluid course-image">
                        <div class="p-3 course-content">
                          <h5 class="course-title fw-bold">{{$topcourse->course_title ?? 'Course Title not Found !'}}</h5>
                          <p class="author mb-1"><a href="#" class="text-primary text-decoration-none">By {{$topcourse->username->name ?? 'Instructor Name Not Found !'}}</a></p>
                          <p class="description small text-muted">
                            {{$topcourse->course_des ? Str::limit($topcourse->course_des,50) : 'Content Not Found !'}}
                          </p>
                          <div class="rating d-flex align-items-center mb-2">
                            <span class="fw-bold me-2">4.7</span>
                            <span class="text-warning">★ ★ ★ ★ ★</span>
                            <span class="ms-2 text-dark">({{$topcourse->reviews->count()}})</span>
                          </div>
                          {{-- price --}}
                              @if($topcourse->course_type === 'Paid' && !empty($topcourse->priceData))
                                  <div class="price mb-2">
                                      <span class="fw-bold fs-3 text-success">
                                          {{ $topcourse->priceData['final_price'] }} {{ $topcourse->priceData['currency'] }}
                                      </span>
                                      @if($topcourse->priceData['is_discount_active'])
                                          <span class="text-danger text-decoration-line-through ms-2">
                                              {{ $topcourse->priceData['original_price'] }} {{ $topcourse->priceData['currency'] }}
                                          </span>
                                      @endif
                                  </div>
                              @endif
                          <p class="meta small">
                            <span class="text-primary">Verified : </span>
                            <span class="text-dark ms-2">{{$topcourse->username->badge ?? 'Reguler'}}</span><br>
                            <span class="text-muted">Sponser: <span> PRIYO MASTER</span></span>
                          </p>
                          <a href="{{route('course_details',[$topcourse->url,$topcourse->slug])}}" class="btn btn-gradient w-100 mt-3">View More Information</a>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <a href="{{route('allcoursecategory')}}" class="btn btn-outline-primary w-100 mt-3">View More Course</a>
                </div>
              {{-- col end --}}
              </div>
              @endif
            {{-- top course tab start herre --}}
            @if(!empty($trandingcourses) && count($trandingcourses) > 0)
              <div class="tab-pane fade" id="trending" role="tabpanel">
                {{-- course start  --}}
                <div class="row">
                  <div class="owl-carousel owl-theme top_course_slider ">
                    @foreach ($trandingcourses as $tranding)
                      <div class="col-md-12 col-lg-12 pb-4 pt-4">
                        <div class="course-card shadow-sm rounded overflow-hidden">
                          <img src="{{asset('uploads/website/'.$tranding->course_image)}}" alt="Course Image" class="img-fluid course-image">
                          <div class="p-3 course-content">
                            <h5 class="course-title fw-bold">{{$tranding->course_title ?? 'Course Title not Found !'}}</h5>
                            <p class="author mb-1"><a href="#" class="text-primary text-decoration-none">By {{$tranding->username->name ?? 'Instructor Name Not Found !'}}</a></p>
                            <p class="description small text-muted">
                              {{$tranding->course_des ? Str::limit($tranding->course_des,50) : 'Content Not Found !'}}
                            </p>
                            <div class="rating d-flex align-items-center mb-2">
                              <span class="fw-bold me-2">4.7</span>
                              <span class="text-warning">★ ★ ★ ★ ★</span>
                              <span class="ms-2 text-dark">({{$tranding->reviews->count()}})</span>
                            </div>
                            {{-- price --}}
                            @if($tranding->course_type === 'Paid' && $tranding->coursePrice !== '')
                            <div class="price mb-2">
                              <span class="fw-bold fs-3 text-success">{{ $tranding->priceData['final_price'] }} {{ $tranding->priceData['currency'] }}</span>
                                @if($tranding->priceData['is_discount_active'])
                                  <span class="text-danger text-decoration-line-through ms-2">{{ $tranding->priceData['original_price'] }} {{ $tranding->priceData['currency'] }}</span>
                                @endif
                            </div>
                            @endif
                            <p class="meta small">
                              <span class="text-primary">Verified : </span>
                              <span class="text-dark ms-2">{{$tranding->username->badge ?? 'Reguler'}}</span><br>
                              <span class="text-muted">Sponser: <span> PRIYO MASTER</span></span>
                            </p>
                            <a href="{{route('course_details',[$tranding->url,$tranding->slug])}}" class="btn btn-gradient w-100 mt-3">View More Information</a>
                          </div>
                        </div>
                      </div>
                      @endforeach
                  
                  </div>
                  <a href="{{route('allcoursecategory')}}" class="btn btn-outline-primary w-100 mt-3">View More Course</a>
                </div>
              </div>
              @endif
            @if(!empty($latestcourse) && count($latestcourse) > 0)
            <div class="tab-pane fade" id="latest" role="tabpanel">
                {{-- course start  --}}
              <div class="row">
                <div class="owl-carousel owl-theme top_course_slider ">
                  @foreach ($latestcourse as $latests)
                    <div class="col-md-12 col-lg-12 pb-4 pt-4">
                      <div class="course-card shadow-sm rounded overflow-hidden">
                        <img src="{{asset('uploads/website/'.$latests->course_image)}}" alt="Course Image" class="img-fluid course-image">
                        <div class="p-3 course-content">
                          <h5 class="course-title fw-bold">{{$latests->course_title ?? 'Course Title not Found !'}}</h5>
                          <p class="author mb-1"><a href="#" class="text-primary text-decoration-none">By {{$latests->username->name ?? 'Instructor Name Not Found !'}}</a></p>
                          <p class="description small text-muted">
                            {{$latests->course_des ? Str::limit($latests->course_des,50) : 'Content Not Found !'}}
                          </p>
                          <div class="rating d-flex align-items-center mb-2">
                            <span class="fw-bold me-2">4.7</span>
                            <span class="text-warning">★ ★ ★ ★ ★</span>
                            <span class="ms-2 text-dark">({{$latests->reviews->count()}})</span>
                          </div>
                          {{-- price --}}
                          @if($latests->course_type === 'Paid' && $latests->coursePrice !== '')
                          <div class="price mb-2">
                            <span class="fw-bold fs-3 text-success">{{ $latests->priceData['final_price'] }} {{ $latests->priceData['currency'] }}</span>
                              @if($latests->priceData['is_discount_active'])
                                <span class="text-danger text-decoration-line-through ms-2">{{ $latests->priceData['original_price'] }} {{ $latests->priceData['currency'] }}</span>
                              @endif
                          </div>
                          @endif
                          <p class="meta small">
                            <span class="text-primary">Verified : </span>
                            <span class="text-dark ms-2">{{$latests->username->badge ?? 'Reguler'}}</span><br>
                            <span class="text-muted">Sponser: <span> PRIYO MASTER</span></span>
                          </p>
                          <a href="{{route('course_details',[$latests->url,$latests->slug])}}" class="btn btn-gradient w-100 mt-3">View More Information</a>
                        </div>
                      </div>
                    </div>
                    @endforeach
              </div>
               <a href="{{route('allcoursecategory')}}" class="btn btn-outline-primary w-100 mt-3">View More Course</a>
            </div>
            </div>
            @endif
            {{-- tab end here --}}
            @if(!empty($freecourse) && count($freecourse) > 0)
            <div class="tab-pane fade" id="free" role="tabpanel">
                {{-- course start  --}}
              <div class="row">
                <div class="owl-carousel owl-theme top_course_slider ">
                  @foreach ($freecourse as $free)
                    <div class="col-md-12 col-lg-12 pb-4 pt-4">
                      <div class="course-card shadow-sm rounded overflow-hidden">
                        <img src="{{asset('uploads/website/'.$free->course_image)}}" alt="Course Image" class="img-fluid course-image">
                        <div class="p-3 course-content">
                          <h5 class="course-title fw-bold">{{$free->course_title ?? 'Course Title not Found !'}}</h5>
                          <p class="author mb-1"><a href="#" class="text-primary text-decoration-none">By {{$free->username->name ?? 'Instructor Name Not Found !'}}</a></p>
                          <p class="description small text-muted">
                            {{$free->course_des ? Str::limit($free->course_des,50) : 'Content Not Found !'}}
                          </p>
                          <div class="rating d-flex align-items-center mb-2">
                            <span class="fw-bold me-2">4.7</span>
                            <span class="text-warning">★ ★ ★ ★ ★</span>
                            <span class="ms-2 text-dark">({{$free->reviews->count()}})</span>
                          </div>
                          {{-- price --}}
                          @if($free->course_type === 'Paid' && $free->coursePrice !== '')
                          <div class="price mb-2">
                            <span class="fw-bold fs-3 text-success">{{ $free->priceData['final_price'] }} {{ $free->priceData['currency'] }}</span>
                              @if($free->priceData['is_discount_active'])
                                <span class="text-danger text-decoration-line-through ms-2">{{ $free->priceData['original_price'] }} {{ $free->priceData['currency'] }}</span>
                              @endif
                          </div>
                          @else
                           <div class="price mb-2">
                            <span class="fw-bold fs-3 text-success">Free</span>
                              @if($free->priceData['is_discount_active'])
                                <span class="text-danger text-decoration-line-through ms-2">{{ $free->priceData['original_price'] }} {{ $free->priceData['currency'] }}</span>
                              @endif
                          </div>
                          @endif
                          <p class="meta small">
                            <span class="text-primary">Verified : </span>
                            <span class="text-dark ms-2">{{$free->username->badge ?? 'Reguler'}}</span><br>
                            <span class="text-muted">Sponser: <span> PRIYO MASTER</span></span>
                          </p>
                          <a href="{{route('course_details',[$free->url,$free->slug])}}" class="btn btn-gradient w-100 mt-3">View More Information</a>
                        </div>
                      </div>
                    </div>
                    @endforeach
              </div>
            <a href="{{route('allcoursecategory')}}" class="btn btn-outline-primary w-100 mt-3">View More Course</a>
            </div>
            </div>
            @endif
        </div>
      </div>
  </div>
</section>