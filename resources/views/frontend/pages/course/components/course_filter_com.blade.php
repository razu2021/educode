                <div class="course-filters p-3 rounded shadow-sm mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Filter Courses</h5>
                        <div>
                        <button type="button" class="btn btn-light btn-sm me-2 reset-filters">Reset</button>
                        <button type="button" class="btn btn-primary btn-sm apply-filters">Filter</button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="text" name="search" id="search" placeholder="search...." class="form-control custom_input" style="font-size: 16px">
                    </div>
            
                    <div class="accordion" id="filterAccordion">
                        <!-- Category Filter -->
                        <!-- Category Filter -->
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingPrice">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false">
                              Category
                            </button>
                        </h2>
                        <div id="collapseCategory" class="accordion-collapse collapse show" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">
                              @foreach($allcategorycourse as $category)
                              <div class="form-check mb-2">
                                  <input class="form-check-input filter-radio" type="radio" name="category" value="{{$category->id}}" id="categorys">
                                  <label class="form-check-label" for="categorys">{{$category->course_category_name ?? 'Not Found'}}</label>
                              </div>
                              @endforeach  
                            </div>
                        </div>
                        </div>


                        <!-- Price Filter -->
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingPrice">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrice" aria-expanded="false">
                            Price
                            </button>
                        </h2>
                        <div id="collapsePrice" class="accordion-collapse collapse" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input filter-radio" type="radio" name="price" value="Free" id="priceFree">
                                <label class="form-check-label" for="priceFree">Free</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-radio" type="radio" name="price" value="Paid" id="pricePaid">
                                <label class="form-check-label" for="pricePaid">Paid</label>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!--  Lable Filter -->
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingPrice">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLavel" aria-expanded="false">
                                Lavel
                            </button>
                        </h2>
                        <div id="collapseLavel" class="accordion-collapse collapse" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input filter-radio" type="radio" name="level" value="Beginners" id="BeginnerLavel">
                                <label class="form-check-label" for="BeginnerLavel">Beginner</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-radio" type="radio" name="level" value="Intermediate" id="IntermediateLavel">
                                <label class="form-check-label" for="IntermediateLavel">Intermediate</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-radio" type="radio" name="level" value="Advanced" id="AdvancedLavel">
                                <label class="form-check-label" for="AdvancedLavel">Advanced</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-radio" type="radio" name="level" value="Anyone" id="AnyoneLavel">
                                <label class="form-check-label" for="AnyoneLavel">Anyone</label>
                            </div>
                            </div>
                        </div>
                        </div>
                        {{-- Language --}}
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingPrice">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLanguage" aria-expanded="false">
                                Laguage
                            </button>
                        </h2>
                        <div id="collapseLanguage" class="accordion-collapse collapse" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input filter-radio" type="radio" name="language" value="English" id="englishLavel">
                                <label class="form-check-label" for="englishLavel">English</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-radio" type="radio" name="language" value="Bangle" id="BangleLevel">
                                <label class="form-check-label" for="IntermediateLavel">Bangle</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-radio" type="radio" name="language" value="Other" id="otherLavel">
                                <label class="form-check-label" for="AdvancedLavel">Other</label>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingPrice">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDuration" aria-expanded="false">
                                Course Duration
                            </button>
                        </h2>
                        <div id="collapseDuration" class="accordion-collapse collapse" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input filter-radio" type="radio" name="duration" value="1 Month" id="3month">
                                <label class="form-check-label" for="englishLavel">1 Month</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input filter-radio" type="radio" name="duration" value="3 Months" id="3month">
                                <label class="form-check-label" for="englishLavel">3 Months</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-radio" type="radio" name="duration" value="6 Months" id="6month">
                                <label class="form-check-label" for="IntermediateLavel">6 Months</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-radio" type="radio" name="duration" value="1 Year" id="1year">
                                <label class="form-check-label" for="AdvancedLavel">1 Year</label>
                            </div>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>


                    

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Globally define the function so it's accessible anywhere
  function filter_data(page) {
    let formData = {
      page: page,
      search: $('#search').val(),
      category: $('input[name="category"]:checked').val(),
      price: $('input[name="price"]:checked').val(),
      level: $('input[name="level"]:checked').val(),
      language: $('input[name="language"]:checked').val(),
      duration: $('input[name="duration"]:checked').val(),
    };

    $.ajax({
      url: courseFilterURL,
      type: "GET",
      data: formData,
       headers: {
            'X-CSRF-TOKEN': csrfToken,
        },
      beforeSend: function () {
        $('#courseCardData').html(`
          <div class="d-flex justify-content-center align-items-center" style="min-height: 300px;">
            <div class="text-center">
              <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              <p class="mt-2">Loading courses...</p>
            </div>
          </div>
        `);
      },
      success: function (response) {
        if (response.empty) {
          $('#courseCardData').html(`
            <div class="text-center py-5">
              <h2 class="text-muted text-danger pt-5">No Data found!</h2>
            </div>
          `);
        } else {
          $('#courseCardData').html(response.html);
        }
      }
    });
  }
  $(document).ready(function () {
    $('#search').on('keyup', function () {
      filter_data(1);
    });
    $(document).on('change', '.filter-checkbox, .filter-radio, .filter-select', function () {
      filter_data(1);
    });

    $(document).on('click', '.pagination a', function (e) {
      e.preventDefault();
      let page = $(this).attr('href').split('page=')[1];
      filter_data(page);
    });

    $('.reset-filters').click(function () {
      $('.filter-checkbox').prop('checked', false);
      $('.filter-radio').prop('checked', false);
      $('.filter-select').val('');
      $('#search').val('');
      filter_data(1); // direct call here works now
    });
    // Initial load
    filter_data(1);
  });
</script>
