@extends('layouts.instructormaster')
@section('instructor_contents')
    <main>
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Add a Course Price</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="#" onclick="window.histroy.back()">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('ins_coupon.all_data')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
          <form action="{{route('ins_coupon.submit')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h6 class="mb-0">Add Course Module  Information </h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                                
                                {{-- category end --}}
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="course_name">Course Name: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="course_name" id="course_name" type="text" value="{{$data->course_name}}" disabled>
                                    <input class="form-control" name="course_id" id="course_id" type="hidden" value="{{$data->id}}" >
                                    <label class="text-danger fw-medium">@error('course_name') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                {{-- category end --}}
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="course_name">: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                   
                                    <input class="form-control" name="title" id="title" type="text" value="{{old('title')}}">
                                    <label class="text-danger fw-medium">@error('course_name') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                              
                            </div>
                        </div>
                      </div>
                </div>
                {{-- card end --}}
               
            </div> 
            {{-- row end  --}}
            <div class="row mx-2">
              <div class="card mt-3 ">
                <div class="card-body mx-4">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Your're Almost Done</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary " role="button"> Submit information </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
            {{-- form end --}}
        </div>
    </main>


    <script>
      document.addEventListener('DOMContentLoaded', function () {
          let keywords = [];
  
          const input = document.getElementById('keyword-input');
          const container = document.getElementById('tag-container');
          const hiddenInput = document.getElementById('meta_keywords');
  
          input.addEventListener('keyup', function (e) {
              if (e.key === ' ') {
                  const value = input.value.trim();
                  if (value && !keywords.includes(value)) {
                      keywords.push(value);
                      addTag(value);
                      updateHiddenInput();
                  }
                  input.value = '';
              }
          });
  
          function addTag(text) {
              const tag = document.createElement('span');
              tag.className = 'badge bg-primary me-1 mb-1';
              tag.innerText = text;
  
              const removeBtn = document.createElement('span');
              removeBtn.innerHTML = '&times;';
              removeBtn.style.marginLeft = '8px';
              removeBtn.style.cursor = 'pointer';
  
              removeBtn.onclick = function () {
                  container.removeChild(tag);
                  keywords = keywords.filter(k => k !== text);
                  updateHiddenInput();
              };
  
              tag.appendChild(removeBtn);
              container.appendChild(tag);
          }
  
          function updateHiddenInput() {
              hiddenInput.value = keywords.join(',');
          }
      });
  </script>
  


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $('#categorySelect').on('change', function () {
          var categoryId = $(this).val();
          $('#subcategorySelect').html('<option value="">Loading...</option>');
          $('#childcategorySelect').html('<option value="">Select Child Category</option>');
  
          if (categoryId) {
              $.get('/get-subcategories/instructor/' + categoryId, function (data) {
                  let options = '<option value="">Select Subcategory</option>';
                  data.forEach(function (subcat) {
                      options += `<option value="${subcat.id}">${subcat.course_sub_category_name}</option>`;
                  });
                  $('#subcategorySelect').html(options);
              });
          } else {
              $('#subcategorySelect').html('<option value="">Select Subcategory</option>');
          }
      });
  
      $('#subcategorySelect').on('change', function () {
          var subCategoryId = $(this).val();
          $('#childcategorySelect').html('<option value="">Loading...</option>');
  
          if (subCategoryId) {
              $.get('/get-childcategories/instructor/' + subCategoryId, function (data) {
                  let options = '<option value="">Select Child Category</option>';
                  data.forEach(function (child) {
                      options += `<option value="${child.id}">${child.course_child_category_name}</option>`;
                  });
                  $('#childcategorySelect').html(options);
              });
          } else {
              $('#childcategorySelect').html('<option value="">Select Child Category</option>');
          }
      });
  </script>
  





  
@endsection