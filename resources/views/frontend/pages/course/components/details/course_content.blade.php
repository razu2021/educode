   <section class="course-curriculum section-padding">
          <div class="container">
            <h2 class="section-title">Course Content</h2>

            <div class="accordion" id="curriculumAccordion">
              <!-- Single Course Section -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="section1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                    <span>Introduction to Laravel</span>
                    <span class="duration">15 min</span>
                  </button>
                </h2>
                <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#curriculumAccordion">
                  <div class="accordion-body">
                    <ul class="topic-list">
                      <li>
                        <div class="topic-title">
                          <i class="bi bi-play-circle text-success"></i>
                          What is Laravel?
                        </div>
                        <div class="topic-meta">
                          <span class="time">3:00</span>
                          <a href="#" class="preview-btn" data-bs-toggle="modal" data-bs-target="#previewModal" data-video="https://www.youtube.com/embed/dQw4w9WgXcQ">
                            <i class="bi bi-eye-fill"></i> 
                          </a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- More Sections (Repeatable) -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="section2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                    <span>Routing & Controllers</span>
                    <span class="duration">25 min</span>
                  </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
                  <div class="accordion-body">
                    <ul class="topic-list">
                      @for ($i = 0 ; $i < 5 ; $i++)
                        
                      
                      <li>
                        <div class="topic-title">
                          <i class="bi bi-play-circle text-success"></i>
                          What is Laravel?
                        </div>
                        <div class="topic-meta">
                          <span class="time">3:00</span>
                          <a href="#" class="preview-btn" data-bs-toggle="modal" data-bs-target="#previewModal" data-video="https://www.youtube.com/embed/dQw4w9WgXcQ">
                            <i class="bi bi-eye-fill"></i> 
                          </a>
                        </div>
                      </li>
                      @endfor

                    </ul>
                  </div>
                </div>
              </div>

              <!-- Add more sections as needed -->
            </div>
          </div>
        </section>