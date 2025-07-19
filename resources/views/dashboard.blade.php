<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Instructor Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
     background-image: url('{{asset('uploads/achiv.png')}}');
     background-repeat:repeat;
     background-position: center;
     background-color: transparent;
     height: 100vh;
     width: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .main_header{
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    .dashboard-header {
      background-color: #fff;
      border-bottom: 1px solid #e5e5e5;
      padding: 0.75rem 1.5rem;
      position: sticky;
      top: 0;
      z-index: 1;
    }

    .dashboard-logo {
      font-size: 1.5rem;
      font-weight: bold;
      color: #2c3e50;
    }

    .profile-img {
      width: 40px;
      height: 40px;
      object-fit: cover;
      border-radius: 50%;
    }

    .main-section {
      padding: 60px 20px;
      text-align: center;
    }

    .main-section h1 {
      font-size: 2.5rem;
      font-weight: 600;
      margin-bottom: 20px;
      color: #2c3e50;
    }

    .main-section p {
      font-size: 1.1rem;
      color: #555;
      margin-bottom: 30px;
    }

    .btn-get-started {
      font-size: 1rem;
      padding: 10px 20px;
      border-radius: 8px;
      background-color: #a435f0;
      color: #fff;
      border: none;
      transition: background-color 0.3s ease;
    }

    .btn-get-started:hover {
      background-color: #8628c4;
    }
    .custom_input{
      background: transparent;

    }
    .section{
      padding: 60px 20px;
    }


      #preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #ffffff;
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }
    #progressText {
      margin-top: 10px;
      font-weight: bold;
    }
  </style>
  @stack('styles')
</head>
<body>

  {{-- prgressbar code  --}}
@php 
  use App\Models\InstructoreRequest;
  $auth_user_id = auth()->id();
  $data = InstructoreRequest::where('user_id',$auth_user_id)->first();

  $totalfields = 32;
  $progress = 0; // default value


  if($data){
    $fieldupcount = collect($data->toArray())->filter(function($value){
    return !is_null($value) && $value !== '';
  })->count();

  $progress = intval(($fieldupcount / $totalfields) * 100);


  }



@endphp
{{-- progress bar code end here  --}}



<!-- Header Start -->
<section class="main_header">
<header class="dashboard-header d-flex justify-content-between align-items-center">
  <!-- Logo -->
  <div class="dashboard-logo">
    <a href="{{route('dashboard')}}"><span> Educode</span></a>
  </div>

  <!-- Profile Dropdown -->
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="https://i.pravatar.cc/300" alt="Profile" class="profile-img me-2">
      <span class="d-none d-md-inline">Instructor</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="userDropdown">
      <li><a class="dropdown-item" href="#">👤 Profile</a></li>
      <li><a class="dropdown-item" href="#">⚙️ Settings</a></li>
      <li><hr class="dropdown-divider"></li>
      <li>
         <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
                    </form>

      </li>
    </ul>
  </div>
 
</header>
<div class="progress" style="height: 20px;">
  <div class="progress-bar bg-success mx-2" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
   profile compleats {{ $progress }}%
  </div>
</div>
</section>
<!-- Header End -->
<!-- Preloader -->
<div id="preloader" style="position: fixed; top:0; left:0; width:100%; height:100%; background:#fff; z-index:9999; display:flex; align-items:center; justify-content:center; flex-direction:column;">
  <div class="progress" style="width: 80%; height: 20px;">
    <div id="progressBar" class="progress-bar bg-success" role="progressbar"
         style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
    </div>
  </div>
  <div id="progressText" class="mt-2 fw-bold">Loading... 0%</div>
</div>




<!-- Main Content Start -->

  @yield('instructor_request_content')



<!-- Main Content End -->





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- JavaScript -->
<script>
  // Laravel Blade থেকে আসা ডায়নামিক ভ্যালু
  let finalProgress = {{ $progress }};
  let currentProgress = 0;

  // Animation loop
  let interval = setInterval(() => {
    if (currentProgress >= finalProgress) {
      clearInterval(interval);

      // Preloader গায়েব করে main content দেখাও
      document.getElementById('preloader').style.display = 'none';
      document.getElementById('mainContent').style.display = 'block';
    } else {
      currentProgress++;
      document.getElementById('progressBar').style.width = currentProgress + '%';
      document.getElementById('progressBar').setAttribute('aria-valuenow', currentProgress);
      document.getElementById('progressText').innerText = 'Loading... ' + currentProgress + '%';
    }
  }, 20); // প্রতি 30ms এ 1% করে বাড়বে
</script>
</body>
</html>
