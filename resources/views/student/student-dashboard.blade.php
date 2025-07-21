<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LMS Student Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="dashboard.css" rel="stylesheet" /> <!-- SCSS Compiled Output -->
</head>
<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="border-end bg-white" id="sidebar-wrapper">
      <div class="sidebar-heading border-bottom bg-light text-center py-3">
        <h5>LMS Dashboard</h5>
      </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action"> <i class="bi bi-book"></i> My Courses </a>
        <a href="#" class="list-group-item list-group-item-action"> <i class="bi bi-heart"></i> Wishlist </a>
        <a href="#" class="list-group-item list-group-item-action"> <i class="bi bi-clipboard-check"></i> Assignments </a>
        <a href="#" class="list-group-item list-group-item-action"> <i class="bi bi-award"></i> Certificates </a>
        <a href="#" class="list-group-item list-group-item-action"> <i class="bi bi-gear"></i> Settings </a>
        <a href="#" class="list-group-item list-group-item-action text-danger"> <i class="bi bi-box-arrow-left"></i> Logout </a>
      </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <!-- Top Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom px-4 py-2">
        <div class="container-fluid">
          <button class="btn btn-outline-primary" id="menu-toggle">☰</button>
          <div class="ms-auto d-flex align-items-center gap-3">
            <span class="fw-semibold">Raj</span>
            <img src="https://i.pravatar.cc/40" class="rounded-circle" alt="User" width="40" />
          </div>
        </div>
      </nav>

      <!-- Main Content -->
      <div class="container-fluid px-4 mt-4">
        <h3 class="mb-4">Welcome back, Raj 👋</h3>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <h5 class="card-title">My Courses</h5>
                <p class="card-text fs-4 text-primary">8 Enrolled</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <h5 class="card-title">Progress</h5>
                <p class="card-text fs-4 text-success">72%</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <h5 class="card-title">Certificates</h5>
                <p class="card-text fs-4 text-info">3 Achieved</p>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-5">
          <h5 class="mb-3">Recently Viewed Courses</h5>
          <div class="row g-4">
            <div class="col-md-6 col-lg-4">
              <div class="card">
                <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Course">
                <div class="card-body">
                  <h6 class="card-title">Web Development Bootcamp</h6>
                  <p class="text-muted small">40% Complete</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card">
                <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Course">
                <div class="card-body">
                  <h6 class="card-title">Laravel for Beginners</h6>
                  <p class="text-muted small">75% Complete</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script>
    document.getElementById("menu-toggle").addEventListener("click", function () {
      document.getElementById("wrapper").classList.toggle("toggled");
    });
  </script>
</body>
</html>


