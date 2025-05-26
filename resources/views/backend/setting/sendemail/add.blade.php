@extends('layouts.adminmaster')
@section('admin_contents')
    <main>
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Add new Item </h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="{{route('siteaddress.add')}}">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('siteaddress.all')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>



              {{-- send email  --}}
              <form id="emailForm" action="{{route('sendemail.submit')}}" method="post" enctype="multipart/form-data"  class=" card p-2"  >
                @csrf
                <div class="card-header bg-body-tertiary">
                  <div id="successMessage" class="alert alert-success d-none"></div>
                  <div id="errorMessage" class="alert alert-danger d-none"></div>
                  <h5 class="mb-0">New message</h5>
                  <span class="text-danger ">@error('mail_to') {{$message}} @enderror </span>
                  <span class="text-danger ">@error('mail_subject') {{$message}} @enderror </span>
                  <span class="text-danger ">@error('mail_body') {{$message}} @enderror </span>
                </div>
                <div class="card-body p-0">
                <div class="border border-top-0 border-200">
                  <input name="mail_to" class="form-control border-0 rounded-0 outline-none px-x1" type="email" aria-describedby="email-to" placeholder="To">
                </div>

                  
                  
                  <div class="border border-y-0 border-200">
                    <input name="mail_subject" id="mail_subject" class="form-control border-0 rounded-0 outline-none px-x1"  type="text" aria-describedby="email-subject" placeholder="Subject">
                  </div>
                  <div class="border border-y-0 border-200">
                    <textarea name="mail_body" id="description" cols="30" rows="10" class="form-control border-0 rounded-0 outline-none px-x1"></textarea>
                  </div>
                  
                  
                  <div class="bg-body-tertiary px-x1 py-3">
                    <div class="d-inline-flex flex-column">
                      

                        <div id="preview" class="d-inline-flex flex-column mt-3"></div>

                     
                      {{-- end --}}
                    </div>
                  </div>
                </div>
                <div class="card-footer border-top border-200 d-flex flex-between-center">
                  <div class="d-flex align-items-center">
                       <!-- Actual file inputs -->
                        <input type="file" id="fileInput" name="fils" multiple class="d-none">
                        <input type="file" id="imageInput" name="images" multiple accept="image/*" class="d-none">

                       
                      <button id="submitBtn" class="btn btn-primary btn-sm px-5 me-2" type="submit">Send</button>

                    <label class="me-2 btn btn-tertiary btn-sm mb-0 cursor-pointer" for="fileInput"> <span class="fas fa-paperclip fs-8" data-fa-transform="down-2"></span></label>
                      <label class="btn btn-tertiary btn-sm mb-0 cursor-pointer" for="imageInput"><span class="fas fa-image fs-8" data-fa-transform="down-2"></span></label>
                  
                  </div>
                </div>
            

              </form>
            {{-- form end --}}


        </div>
    </main>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>


let fileAttachments = [];
let imageAttachments = [];

$('#fileInput').on('change', function () {
    fileAttachments = fileAttachments.concat(Array.from(this.files));
    $(this).val('');  // input clear
    renderPreview();
});

$('#imageInput').on('change', function () {
    imageAttachments = imageAttachments.concat(Array.from(this.files));
    $(this).val('');
    renderPreview();
});

function renderPreview() {
    $('#preview').empty();

    $.each(fileAttachments, function(index, file) {
        $('#preview').append(
            `<div class="border px-2 rounded-3 d-flex flex-between-center bg-white dark__bg-1000 my-1 fs-10 align-items-center">
        <span class="fs-8 far fa-file-archive"></span>
        <span class="ms-2">${file.name} (${getSize(file.size)})</span>
        <a href="#!" class="text-300 p-1 ms-6 remove-btn" data-type="file" data-index="${index}" 
          data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Detach" data-bs-original-title="Detach">
          <span class="fas fa-times"></span>
        </a>
      </div>`
        );
    });

    $.each(imageAttachments, function(index, file) {
        $('#preview').append(
            `<div class="border px-2 rounded-3 d-flex flex-between-center bg-white dark__bg-1000 my-1 fs-10 align-items-center">
        <span class="fs-8 far fa-file-image"></span>
        <span class="ms-2">${file.name} (${getSize(file.size)})</span>
        <a href="#!" class="text-300 p-1 ms-6 remove-btn" data-type="image" data-index="${index}" 
          data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Detach" data-bs-original-title="Detach">
          <span class="fas fa-times"></span>
        </a>
      </div>`
        );
    });
}

// delegated event for dynamically created elements
$('#preview').on('click', '.remove-btn', function() {
    const type = $(this).data('type');
    const index = $(this).data('index');

    if(type === 'file') {
        fileAttachments.splice(index, 1);
    } else {
        imageAttachments.splice(index, 1);
    }
    renderPreview();
});

function getSize(bytes) {
    const kb = bytes / 1024;
    return kb > 1024 ? (kb / 1024).toFixed(2) + ' MB' : kb.toFixed(2) + ' KB';
}


$('#emailForm').submit(function(e){
  e.preventDefault();  
   tinymce.triggerSave(); // ⬅️ textarea তে TinyMCE content বসায়
  const form = this;  // full form k get kore form varivble rekhlam ---
  let formData = new FormData(form);    // form theke j detagulo jabe segulo get korlam


 
  // Add files & images to formData
  fileAttachments.forEach(file => formData.append('files[]', file));
  imageAttachments.forEach(file => formData.append('images[]', file));

 $.ajax({
  url: "{{route('sendemail.submit')}}", // route  . kon route submit hobe 
  method : "post", // kon method a submit hobe ..get . put/ patch/ or ther 
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},  // csrf token  
  data: formData, // form er sob data 
  contentType: false, // browser set করবে
  processData: false, // stringify করবে না

  /*----- send hoyar age e ki hobe ----*/
  beforeSend : function(){
      $('#submitBtn').prop('disabled', true).text('Sending...');
  },


  /*----- jodi seccess hoy tahole ki hobe ----*/
  success: function(response){
     $('#successMessage').removeClass('d-none').text(response.message);
    form.reset();
    fileAttachments =[];
    imageAttachments = [];
     $('#preview').html('');
  },


  /*----- jodi success na hoy or faild kore tahole ki hobe  ----*/
  error: function(xhr){
    let errorMsg = 'Something went wrong!';
    if (xhr.status === 422) {
      let errors = xhr.responseJSON.errors;
      errorMsg = '';
      for (let key in errors) {
        errorMsg += errors[key][0] + '<br>';
      }
    } else if (xhr.responseJSON?.message) {
      errorMsg = xhr.responseJSON.message;
    }
    $('#errorMessage').removeClass('d-none').html(errorMsg);
  },


  /*----- jodi send hoy or sobkico complet hoye jay tar pore ki hobe  ----*/
  complete:function(){
      $('#submitBtn').prop('disabled', false).text('Send');
  }

 }); // ajax end 



})// end 
</script>
{{-- attachment end herre  --}}

@endsection