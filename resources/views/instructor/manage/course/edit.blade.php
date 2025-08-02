@extends('layouts.instructormaster')
@section('instructor_contents')
    <main>
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Update a Categorie</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="{{route('ins_course.add')}}">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('ins_course.all')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
          <form action="{{route('ins_course.update')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h6 class="mb-0">Course Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                              {{--  --}}
                              <div class="col-12 mb-1">
                                  <input class="form-control" name="id" id="id" type="hidden" value="{{$data->id}}">
                                  <input class="form-control" name="slug" id="id" type="hidden" value="{{$data->slug}}">
                              </div>
                                {{--  --}}
                                <div class="col-4 mb-1">
                                    <label class="form-label" for="category_id">Select Course Category <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <select id="categorySelect" name="category_id" class="form-select">
                                      <option value="{{$data->course_category_id }}">{{$data->category->course_category_name ?? 'Category Not Found !'}}</option>
                                      @foreach ($courseCategory as $category)
                                          <option value="{{ $category->id }}">{{ $category->course_category_name }}</option>
                                      @endforeach
                                  </select>
                                    <label class="text-danger fw-medium">@error('category_id') {{$message}} @enderror</label>
                                </div>
                                <div class="col-4 mb-1">
                                    <label class="form-label" for="subcategory_id">Select Course Sub Category <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <select id="subcategorySelect" name="subcategory_id" class="form-select">
                                      <option value="{{$data->course_subcategory_id}}">{{$data->subcategory->course_sub_category_name ?? 'Sub Category Name not Found!'}}</option>
                                        @foreach($courseCategory as $category)
                                            @foreach ($category->CourseSubcategory as $subcate)
                                                <option value="{{$subcate->id}}">{{$subcate->course_sub_category_name}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                    <label class="text-danger fw-medium">@error('subcategory_id') {{$message}} @enderror</label>
                                </div>
                                {{-- child category --}}
                                <div class="col-4 mb-1">
                                    <label class="form-label" for="child_category_id">Select Child Course Category <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <select id="childcategorySelect" name="child_category_id" class="form-select ">
                                      <option value="{{$data->course_childcategory_id}}"> {{$data->childcategory->course_child_category_name ?? 'Child Category not Found!'}} </option>
                                      @foreach ($courseCategory as $coursecat)
                                        @foreach ($coursecat->CourseSubcategory as $subcate)
                                           @foreach ($subcate->CourschildCategory as $childcate)
                                              <option value="{{$childcate->id}}">{{$childcate->course_child_category_name ?? 'Not Found'}}</option>
                                           @endforeach
                                        @endforeach
                                      @endforeach
                                    </select>
                                    <label class="text-danger fw-medium">@error('child_category_id') {{$message}} @enderror</label>
                                </div>

                                {{-- category end --}}
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="course_name">Course Name: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="course_name" id="course_name" type="text" value="{{$data->course_name}}">
                                    <label class="text-danger fw-medium">@error('course_name') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="course_title">Course Title: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="course_title" id="course_title" type="text" value="{{$data->course_title}}">
                                    <label class="text-danger fw-medium">@error('course_title') {{$message}} @enderror</label>
                                </div>
                                  {{-- title end --}}
                                  <div class="col-12 mb-1">
                                    <label class="form-label" for="course_about">Course About: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <textarea name="course_about" id="description" class="form-control" value="{{$data->course_about}}">{!! $data->course_about !!}</textarea>
                                    <label class="text-danger fw-medium" >@error('course_about') {{$message}} @enderror</label>
                                </div>
                              
                                {{-- end --}}
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="course_des">Short Descriptions: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <input class="form-control" name="course_des" id="course_des" type="text" value="{{$data->course_des}}">
                                    <label class="text-danger fw-medium" >@error('course_des') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="course_long_des">Long Descriptions: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <textarea name="course_long_des" id="description" class="form-control" value="{{$data->course_long_des}}">{!! $data->course_long_des !!}</textarea>
                                    <label class="text-danger fw-medium" >@error('course_long_des') {{$message}} @enderror</label>
                                </div>
                                {{-- end --}}

                                <div class="col-6 mb-1">
                                    <label class="form-label" for="course_language">Course Language:</label>
                                    <select name="course_language" id="course_language" class="form-control">
                                      <option value="{{$data->course_language}}">{{$data->course_language}}</option>
                                      <option value="Bangle" {{ old('course_language') == 'Bangle' ? 'selected' : '' }}>Bangle </option>
                                      <option value="English" {{ old('course_language') == 'English' ? 'selected' : '' }}>English</option>
                                      <option value="Other" {{ old('course_language') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                  <label class="text-danger fw-medium" >@error('course_language') {{$message}} @enderror</label>
                                </div>
                              {{-- end --}}
                                <div class="col-6 mb-1">
                                    <label class="form-label" for="course_type">Course Type: <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                    <select name="course_type" id="course_type" class="form-control">
                                      <option value="{{$data->course_type}}">{{$data->course_type}}</option>
                                      <option value="Paid" {{ old('course_type') == 'Paid' ? 'selected' : '' }}>Paid </option>
                                      <option value="Free" {{ old('course_type') == 'Free' ? 'selected' : '' }}>Free</option>
                                    </select>
                                  <label class="text-danger fw-medium" >@error('course_type') {{$message}} @enderror</label>
                                </div>
                              {{-- end --}}
                              <div class="col-6 mb-1">
                                  <label class="form-label" for="course_lable">Course Lable:</label>
                                    <select name="course_lable" id="course_lable" class="form-control">
                                      <option value="{{$data->course_lable}}">{{$data->course_lable}}</option>
                                      <option value="Anyone" {{ old('course_lable') == 'Anyone' ? 'selected' : '' }}>Anyone </option>
                                      <option value="Beginners" {{ old('course_lable') == 'Beginners' ? 'selected' : '' }}>Beginners</option>
                                      <option value="Intermediate" {{ old('course_lable') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                      <option value="Advanced" {{ old('course_lable') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                     
                                    </select>
                                  <label class="text-danger fw-medium" >@error('course_lable') {{$message}} @enderror</label>
                              </div>
                              {{-- end --}}
                              <div class="col-6 mb-1">
                                  <label class="form-label" for="course_des">Course Durations:</label>
                                    <select name="course_time" id="course_time" class="form-control">
                                      <option value="{{$data->course_time}}">{{$data->course_time}}</option>
                                      <option value="1 Month" {{ old('course_time') == '1 Month' ? 'selected' : '' }}>1 Month </option>
                                      <option value="3 Months" {{ old('course_time') == '3 Month' ? 'selected' : '' }}>3 Months</option>
                                      <option value="6 Months" {{ old('course_time') == '6 Month' ? 'selected' : '' }}>6 Months</option>
                                      <option value="1 Year" {{ old('course_time') == '1 Year' ? 'selected' : '' }}>1 Year</option>
                                    </select>
                                  <label class="text-danger fw-medium" >@error('course_time') {{$message}} @enderror</label>
                              </div>
                              {{-- end --}}
                                <div class="col-6 mb-1">
                                  <label class="form-label" for="images">Course Thumbnail : <span class="text-danger"><i class="bi bi-star-fill"></i></span></label>
                                  <input class="form-control" name="images" id="images" type="file"  accept="image/*"  onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])">
                                  <label class="text-danger fw-medium" >@error('images') {{$message}} @enderror</label>
                              </div>
                              {{-- end --}}
                                <div class="col-6 mb-1 text-end">
                                  <img id="previewImage" src="{{asset('uploads/website/'.$data->course_image)}}" alt="Course Image" style="height: 15rem;width:15rem;object-fit:cover;overflow:hidden;border-radius:10px">
                                </div>
                              {{-- end --}}
                               

                            </div>
                        </div>
                      </div>
                </div>
                {{-- card end --}}
                <div class="col-lg-4 ">
                  <div class="sidebar_wrapper">
                    <div class="sidebar_card">
                        <div class="card mb-4">
                          <div class="sidebar_header bg-body-tertiary">
                            <h4 class="p-2"> Total Categorie's</h4>
                        </div>
                        <div class="card-body">
                          <div class="row  justify-content-center g-0">                       
                            <div class="col-auto position-relative">
                              <div class="echart-product-share" _echarts_instance_="ec_1743616191403" style="user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"><div style="position: relative; width: 106px; height: 106px; padding: 0px; margin: 0px; border-width: 0px; cursor: pointer;"><canvas data-zr-dom-id="zr_0" width="106" height="106" style="position: absolute; left: 0px; top: 0px; width: 106px; height: 106px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; background-color: rgb(249, 250, 253); border-width: 1px; border-radius: 4px; color: rgb(11, 23, 39); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 7px 10px; top: 0px; left: 0px; transform: translate3d(-68px, 11px, 0px); border-color: rgb(216, 226, 239); pointer-events: none; visibility: hidden; opacity: 0;"><strong>Sparrow:</strong> 20.65%</div></div>
                              <div class="position-absolute top-50 start-50 translate-middle text-1100 fs-7">{{ $totalpost}} N</div> 
                            </div>
                          </div>
                        </div>
                        <div class=" bg-body-tertiary text-center">
                          @if(!empty($latestPost->created_at))
                            <h6 class="p-2">Last Created At : {{ $latestPost->created_at->format('d M, Y - h:i A') }}</h6>
                          @else
                          <h6 class="p-2">Post is not Available </h6>
                          @endif
                        </div>
                      </div>
                      <div class="card">
                          <div class="card-body">
                            <div class="col-12">
                              <label class="form-label" for="custom_url">Custom Slug :</label>
                              <input class="form-control" name="custom_url" id="custom_url" type="text" placeholder="optional !" value="{{$data->url}}">
                            </div>
                          </div>
                      </div>
                      {{-- card end --}}
                     


                    </div>
                    {{-- card end  --}}
                  </div>
                </div>
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