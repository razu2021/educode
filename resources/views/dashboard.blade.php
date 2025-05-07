<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Instructor Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .dashboard-header {
      background-color: #fff;
      border-bottom: 1px solid #e5e5e5;
      padding: 0.75rem 1.5rem;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      position: sticky;
      top: 0;
      z-index: 1000;
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
  </style>
</head>
<body>

<!-- Header Start -->
<header class="dashboard-header d-flex justify-content-between align-items-center">
  <!-- Logo -->
  <div class="dashboard-logo">
    <span> Educode</span>
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
      <li><a class="dropdown-item text-danger" href="#">🚪 Logout</a></li>
    </ul>
  </div>
</header>
<!-- Header End -->

<!-- Main Content Start -->

@yield('instructor_request_content')


<!-- Main Content End -->





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
