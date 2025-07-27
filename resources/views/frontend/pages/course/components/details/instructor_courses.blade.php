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

