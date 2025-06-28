<section class="section-padding ">
    <div class="container">
        <div class="header">
            <h2 class="pb-2"> All Development courses </h2>
            <div class="filter_button d-flex justify-content-between mb-4 ">
               <div>
                    <button class="btn btn-outline-secondary fs-4"><i class="bi bi-filter"></i>  Filter </button>
                    <button class="btn btn-outline-secondary fs-4"> Sorted By  </button>
               </div>
                <div>
                    <h4> Total Course : 1200 </h4>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3">
                @includeIf('frontend.pages.course.components.course_filter_com')
            </div>
            
            <div class="col-12 col-lg-9 ">
                @for ($i = 0 ; $i < 10 ; $i++)
              <div class="course_card3 d-flex align-items-start gap-15 p-20 bg-white rounded-3 shadow-sm mb-20 flex-wrap flex-md-nowrap mt-4">
  
                <!-- Course Image -->
                <div class="course-thumb flex-shrink-0">
                    <img src="{{asset('contents/frontend/assets/assetss/images/course/i1.jpg')}}" alt="Course Thumbnail" class="img-fluid rounded">
                </div>

                <!-- Course Content -->
                <div class="course-content flex-grow-1 position-relative w-100">
                    <div class="d-flex justify-content-between align-items-start flex-wrap">
                        <h5 class="course-title  fw-semibold text-dark">The Complete Full-Stack Web Development Bootcamp</h5>
                        <div class="text-dark fw-bold fs-16">$29.99</div>
                    </div>
                    <p class="text-muted card3_des">
                        Become a Full-Stack Web Developer with just ONE course. HTML, CSS, Javascript, Node, React, PostgreSQL, Web3 and DApps
                    </p>

                    <p class="text-muted small card3_name">Dr. Angela Yu, Developer and Lead Instructor</p>

                    <div class="d-flex align-items-center flex-wrap gap-10 card3_review">
                        <span class="text-warning fw-semibold fs-10">4.7 ★</span>
                        <span class="text-muted fs-10">(442,727)</span>
                        <span class="text-muted fs-10">· 61.5 total hours · 374 lectures · All Levels</span>
                    </div>

                    <span class="badge bg-success mt-2">Bestseller</span>
                </div>
                </div>
                 @endfor
                    <nav aria-label="Page navigation example mt-5 text-center">
                        <ul class="pagination mt-5 text-center">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
            </div>
            {{-- col end --}}
           

        </div>
    </div>
</section>