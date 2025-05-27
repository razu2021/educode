@extends('layouts.instructormaster')
@section('instructor_contents')
<form action="{{route('instructor_documents.update')}}" method="post" enctype="multipart/form-data" class="">
  @csrf

  {{-- hidden input --}}
  <div>
    <input type="hidden" name="id" value="{{$data->id}}">
    <input type="hidden" name="user_id" value="{{$data->user_id}}">
    <input type="hidden" name="user_slug" value="{{$data->slug}}">
  </div>
  {{-- end --}}
<div class="col-12 col-lg-8 offset-lg-2 mb-3">
  <div class="card h-lg-100">
    <div class="card-header bg-body-tertiary">
      <h4>Instructor Identity Verification</h4>
    </div>
    <div class="card-body p-4 p-sm-5">
     <div class="text-center">
         <h5 class="mb-0">Upload your Supporting Documents</h5>
         <p class="fs-10">To become a verified instructor, kindly upload your necessary identification and qualification documents. This process is essential to maintain a trusted learning environment.</b>
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
                      <input class="form-control" name="images" id="images" type="file" value="{{$data->image ?? "No image Found"}}" accept="image/*">
                      <label class="text-danger fw-medium">@error('images') {{$message}} @enderror</label>
                      <input type="hidden" name="images" value="{{$data->image}}">
                  </div>
                  <div class="col-12 col-lg-4 mb-1 text-end">
                    @if($data->image !== "")
                    <img id="previewImage" src="{{asset($data->image)}}" alt="image" height="200px" width="auto" style="border:1px solid #f1f1f1;padding:2px">
                    @else
                    <img id="previewImage" src="{{asset('contents/backend/instructor/img/video-creation.webp')}}" alt="image" height="200px" width="auto" style="border:1px solid #f1f1f1;padding:2px">
                    @endif
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
                <input class="form-control" name="certificate" id="certificate" type="file" value="{{$data->certificate}}" accept="application/pdf">
                <label class="text-danger fw-medium">@error('certificate') {{$message}} @enderror</label>
                <input type="hidden" name="certificate" value="{{$data->certificate}}">
            </div>
            <div style="width: 100%; height: 400px; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; position: relative;">
              @if($data->certificate)
                  <!-- Preview PDF -->
                  <a href="{{ asset($data->certificate) }}" target="_blank" style="display: block; width: 100%; height: 100%;">
                      <embed src="{{ asset($data->certificate) }}" type="application/pdf" width="100%" height="100%" />
                  </a>
              @else
                  <!-- No PDF Message -->
                  <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #999; font-weight: bold;">
                      No Data Found
                  </div>
              @endif
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
                <input class="form-control" name="cv" id="cv" type="file" value="{{$data->cv}}" accept="application/pdf">
                <input type="hidden"  name="cv" value="{{$data->cv}}">
                <label class="text-danger fw-medium">@error('cv') {{$message}} @enderror</label>
                

                <a href="{{ asset($data->cv) }}" target="_blank" class="btn btn-primary mt-3">View PDF</a>
            </div>
            <div style="width: 100%; height: 400px; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; position: relative;">

              @if($data->cv)
                  <!-- Preview PDF -->
                  <a href="{{ asset($data->cv) }}" target="_blank" style="display: block; width: 100%; height: 100%;">
                      <embed src="{{ asset($data->cv) }}" type="application/pdf" width="100%" height="100%" />
                  </a>
              @else
                  <!-- No PDF Message -->
                  <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #999; font-weight: bold;">
                      No Data Found
                  </div>
              @endif
          </div>

          </div>
        </div>
      </div>
    </div>
      <button class="btn btn-primary d-block w-100 mt-3" type="submit">Information Submit</button>
      @if(!empty($data->image) && !empty($data->certificate) && !empty($data->cv))
        <a href="{{route('user_social.add',[$data->user_id,$data->slug])}}"> <button type="button" class="btn btn-outline-warning d-block w-100 mt-3"> Next </button></a>
      @endif
    </div>
  </div>
</div>
 </form>



 <!-- JS Script for Image Preview -->
<script>
    document.getElementById('images').addEventListener('change', function(event) {
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