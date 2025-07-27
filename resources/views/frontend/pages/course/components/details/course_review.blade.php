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