@extends('dashboard')
@section('instructor_request_content')
<!-- Main Content Start -->
<form action="" method="post" enctype="multipart/form-data">
@csrf

<div class="section">
    <div class="container">
        <div class="col-lg-8 offset-lg-2">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias expedita neque accusamus distinctio quaerat deserunt eveniet quibusdam ratione, possimus id.</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
        </div>
    </div>
</div>

</form>
 
@endsection