@extends('layouts.instructormaster')
@section('instructor_contents')
<form action="{{route('instructor_documents.update')}}" method="post" enctype="multipart/form-data" class="">
  @csrf
<div class="col-12 col-lg-8 offset-lg-2 mb-3">
  <div class="card h-lg-100">
    <div class="card-header bg-body-tertiary">
      <h4>Uploads Documents</h4>
    </div>
    <div class="card-body p-4 p-sm-5">
     <div class="text-center">
         <h5 class="mb-0">Upload your Supporting Documents</h5><small>all Nesassary Documents for your Verification</small>
     </div>

     <div class="mb-5 mt-5" style="">
        @error('images')
          <div class="alert alert-danger" role="alert">{{$message}}</div>
        @enderror

        @error('certificate')
         <div class="alert alert-danger" role="alert">{{$message}}</div>
        @enderror

        @error('cv')
          <div class="alert alert-danger" role="alert">{{$message}}</div>
        @enderror
     </div>

  <div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
       Upload Your Passport Size Photograph
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse ">
      <div class="accordion-body">
        <p>Please upload a recent, high-quality passport-size photograph taken within the last 6 months. This image will be used for Identity verification to maintain platform authenticity.</p>
         <div class="row gx-2">
              <div class="col-12 col-lg-8 mb-1">
                  <label class="form-label" for="images">Upload Your Passport Size Photograph</label>
                  <input class="form-control" name="images" id="images" type="file" value="{{old('images')}}">
                  <label class="text-danger fw-medium">@error('images') {{$message}} @enderror</label>
              </div>
              <div class="col-12 col-lg-4 mb-1 text-end">
                <img id="previewImage" src="{{asset('contents/backend/instructor/img/video-creation.webp')}}" alt="image" height="200px" width="auto" style="border:1px solid #f1f1f1;padding:2px">
              </div>
              
          </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
        Upload your Academic or Course Certificate 
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
      <div class="accordion-body">
        <p><strong>Academic or Course Certificate </strong> Kindly upload any relevant academic or professional course certificates that demonstrate your expertise in the subject(s) you want to teach. These documents help us ensure the quality and credibility of our platform's instructors.</p> 
        <div class="col-12 mb-1">
            <label class="form-label" for="certificate">  Upload your Academic or Course Certificate </label>
            <input class="form-control" name="certificate" id="certificate" type="file" value="{{old('certificate')}}">
            <label class="text-danger fw-medium">@error('certificate') {{$message}} @enderror</label>
        </div>
        {{-- end --}}
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        Upload Your Latest CV / Resume
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
      <div class="accordion-body">
        
      <p><strong>Upload Your Latest CV / Resume</strong>Upload a copy of your most recent CV or resume outlining your educational background, professional experience, and relevant achievements. This helps us better understand your qualifications and teaching potential.</p>
        <div class="col-12 mb-1">
            <label class="form-label" for="cv"> Upload Your Latest CV / Resume</label>
            <input class="form-control" name="cv" id="cv" type="file" value="{{old('cv')}}">
            <label class="text-danger fw-medium">@error('cv') {{$message}} @enderror</label>
           
        </div>
      </div>
    </div>
  </div>
</div>
      <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Information Submit</button>
    
    </div>
  </div>
</div>
 </form>







 <!-- JS Script for Image Preview -->
<script>
    document.getElementById('category_name').addEventListener('change', function(event) {
        const imagePreview = document.getElementById('previewImage');
        const file = event.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            }
            
            reader.readAsDataURL(file);
        }
    });
</script>






@endsection