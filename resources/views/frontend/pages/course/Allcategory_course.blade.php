@extends('layouts.webmaster')
@section('website_contents')
@includeIf('frontend.pages.course.components.course_banner')



<div class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 section-padding">
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
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingCategory">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false">
                                Categories
                            </button>
                        </h2>
                        <div id="collapseCategory" class="accordion-collapse collapse" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">
                            @foreach($allcategorycourse as $category)
                                <div class="form-check mb-2">
                                <input class="form-check-input filter-checkbox" type="checkbox" name="category[]" value="{{ $category->id }}" id="cat{{ $category->id }}">
                                <label class="form-check-label" for="cat{{ $category->id }}">{{ $category->course_category_name }}</label>
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
                                <input class="form-check-input filter-radio" type="radio" name="price" value="free" id="priceFree">
                                <label class="form-check-label" for="priceFree">Free</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-radio" type="radio" name="price" value="paid" id="pricePaid">
                                <label class="form-check-label" for="pricePaid">Paid</label>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!--  Lable Filter -->
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingPrice">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLevel" aria-expanded="false">
                                Lavel
                            </button>
                        </h2>
                        <div id="collapseLevel" class="accordion-collapse collapse" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input filter-radio" type="radio" name="lavel" value="BeginnerLavel" id="BeginnerLavel">
                                <label class="form-check-label" for="BeginnerLavel">Beginner</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-radio" type="radio" name="lavel" value="Intermediate" id="IntermediateLavel">
                                <label class="form-check-label" for="IntermediateLavel">Intermediate</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-radio" type="radio" name="lavel" value="Advanced" id="AdvancedLavel">
                                <label class="form-check-label" for="AdvancedLavel">Advanced</label>
                            </div>
                            </div>
                        </div>
                        </div>

                      

                    </div>
                    </div>


            </div>
            {{-- col end  --}}
            <div class="col-lg-10">
                <div id="courseCardData">
                    @includeIf('frontend.pages.course.components.course_card3',compact('all'))
                </div>
            </div>
            {{-- col end  --}}
        </div>
    </div>
</div>


<div class="container">
    

</div>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    // Search trigger
    $('#search').on('keyup', function () {
      let value = $(this).val();
      fetch_data(1, value); // page 1 when search
    });

    // Pagination trigger
    $(document).on('click', '.pagination a', function (e) {
      e.preventDefault();
      let page = $(this).attr('href').split('page=')[1];
      let search = $('#search').val();
      fetch_data(page, search);
    });

    // AJAX loader
    function fetch_data(page, search = '') {
      $.ajax({
        url: "?page=" + page + "&search=" + search,
        type: "GET",
        beforeSend: function () {
          $('#courseCardData').html('<p>Loading...</p>');
        },
        success: function (data) {
          $('#courseCardData').html(data);
        },
        error: function () {
          alert('Something went wrong');
        }
      });
    }
  });
</script>

@endsection
