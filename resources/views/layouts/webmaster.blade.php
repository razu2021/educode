<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
 <link rel="icon" href="{{asset('contents/frontend/assets/assetss')}}/images/logo/icon.png" sizes="16x16" type="image/x-icon" style="border-radius:50%;">
  <title>online course learn anything on your schedule | Educode </title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('contents/frontend/assets')}}/assetss/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <!-- Animate.css for Animations -->
  <link rel="stylesheet" href="{{asset('contents/frontend/assets')}}/assetss/css/animate.min.css">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('contents/frontend/assets')}}/assetss/css/fontawesome.min.css">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">


  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('contents/frontend/assets')}}/assetss/css/icofont.min.css">

  <!-- Slick Slider (Carousel) -->
  <link rel="stylesheet" href="{{asset('contents/frontend/assets')}}/assetss/css/slick.css">
  <link rel="stylesheet" href="{{asset('contents/frontend/assets')}}/assetss/css/slick-theme.css">

  <!-- owl Slider (Carousel) -->
  <link rel="stylesheet" href="{{asset('contents/frontend/assets')}}/assetss/css/owl.carousel.min.css">
  <link rel="stylesheet" href="{{asset('contents/frontend/assets')}}/assetss/css/owl.theme.default.min.css">

  <!-- AOS (Animate on Scroll) -->
  <link rel="stylesheet" href="{{asset('contents/frontend/assets')}}/assetss/css/aos.css">

  <!-- Custom SCSS/CSS -->
  <link rel="stylesheet" href="{{asset('contents/frontend/assets')}}/assetss/css/style.css">
  <!-- main scss/css -->
  <link rel="stylesheet" href="{{asset('contents/frontend/assets')}}/assetss/css/scss/main.css">

  <link rel="stylesheet" href="{{asset('contents/frontend/assets/css')}}/style.css">
  @stack('scriptssearch')
</head>
<body>
  <header class="desktop-header" >
    <div id="desktop-header">
    <div class="container-fluid d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center gap-3"> 
      <a href="{{route('index')}}"> <img src="{{asset('contents/frontend/assets/assetss')}}/images/logo/logo.svg" alt="Educode" height="38px"></a>

        <div class="mega_menu_wrapper">
          <a href="{{route('allcoursecategory')}}" class="nav-link mega_menu">Explore Course</a>
          <div class="mega_dropdown">
            <div class="category">
              <ul>
                @foreach ($globalcoursecategory as $courseCategory)
                @if ($courseCategory->CourseSubcategory->count())
                <li>
                  <a href="{{route('coursecategory',$courseCategory->url)}}">{{$courseCategory->course_category_name}}  <i class="bi bi-chevron-right"></i></a>
                  <div class="subcategory">
                    <ul>
                    @foreach ($courseCategory->CourseSubcategory as $course_subcate)
                    @if ($course_subcate->CourschildCategory->count())
                      <li>
                        <a href="{{route('coursesubcategory',[$courseCategory->url,$course_subcate->url])}}">{{$course_subcate->course_sub_category_name}} <i class="bi bi-chevron-right"></i></a>
                        <div class="childcategory">
                          <ul>
                            @foreach ($course_subcate->CourschildCategory as $child_cate)
                                <li><a href="{{route('coursechildcategory',[$courseCategory->url,$course_subcate->url,$child_cate->url])}}">{{$child_cate->course_child_category_name}}</a></li>
                            @endforeach
                          </ul>
                        </div>
                        {{-- end child category --}}
                      </li>
                    @else
                      <li> <a href="{{route('coursesubcategory',[$courseCategory->url,$course_subcate->url])}}">{{$course_subcate->course_sub_category_name}}</a></li>
                    @endif
                      @endforeach
                    </ul>
                  </div>
                  {{-- end subcategory --}}
                </li>
                @else
                    <li>  <a href="{{route('coursecategory',$courseCategory->url)}}">{{$courseCategory->course_category_name}}</a></li>
                @endif
                @endforeach
              </ul> 
              {{-- end category --}}
            </div>
          </div>
        </div>
      </div>
      <div class="search-box mx-3 custom_input">
        <i class="bi bi-search"></i>
        <input type="text" placeholder="Search for anything" />
      </div>
      @if (!Auth::user())
        
      <div class="d-flex align-items-center gap-3 mega_menu_wrapper">
        <a href="#" class="nav-link d-none d-lg-block">PriyoMaster Business</a>
        <a href="#" class="nav-link d-none d-lg-block">Teach on PriyoMaster </a>
        <a href="{{route('login')}}" class="btn btn-sm btn-login">Log in</a>
        <a href="{{route('register')}}" class="btn btn-sm btn-signup">Sign up</a>
        <!-- Inside your header just replace the user icon part with this -->
      </div>
      @else
      <div class="d-flex align-items-center gap-3 mega_menu_wrapper mx-4">
        <a href="#" class="nav-link d-none d-lg-block">PriyoMaster Business</a>
        <a href="#" class="nav-link d-none d-lg-block">Teach on PriyoMaster </a>
     
        <!-- Inside your header just replace the user icon part with this -->
      </div>
         <div class="dropdown ">
            <a href="#" class="" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{asset('contents/frontend/assets/assetss')}}/images/course/i1.jpg" alt="" style="height: 3rem;width:3rem;border-radius:50%;margin-right:1rem;border:1px solid gray">
            </a>
            
            <ul class="dropdown-menu dropdown-menu-end mt-3 profile_sidebar" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="#">
              <div class="profile_names d-flex justify-content-start">
                  <img src="{{asset('contents/frontend/assets/assetss')}}/images/course/i1.jpg" alt="">
                  <div class="profile_infos">
                    <h4>{{Auth::user()->name}} </h4>
                    <span>{{Auth::user()->email}}</span>
                  </div>
            </div></a></li>
             <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#mylearning">My Learning</a></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#mycart">My Cart</a></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#mywishlist">Wishlist</a></li>
            <li><a class="dropdown-item" href="{{route('student.dashboard')}}">User Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#allnotification">Notification</a></li>
            <li><a class="dropdown-item" href="#">Messages</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Account Setting</a></li>
            <li><a class="dropdown-item" href="#">Help & Support</a></li>
            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="{{route('logout')}}" method="post">
                @csrf
                <a class="dropdown-item"  onclick="event.preventDefault(); this.closest('form').submit();" href="{{route('logout')}}">Logout</a>
              </form>
            </li>
            </ul>
        </div>
      @endif

    </div>
</div>  
<!-- desktop header end here  -->




<!--  mobile header code start here  -->

<!-- HTML: Mobile Menu Section -->
<section>
    <div id="mobile_header">
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="mobile_side_bar">
          <a href="#" id="exploreBtn"><i class="bi bi-list"></i> Explore</a>
        </div>
        <div class="mobile_logo">
          <a href="{{route('index')}}"> <img src="{{asset('contents/frontend/assets/assetss')}}/images/logo/logo.svg" alt="Educode" height="50px"></a>
        </div>
        <div class="d-flex align-items-center gap-3">
          <a href="#" class="nav-link"><i class="bi bi-cart3 fs-5"></i></a>
          <div class="dropdown">
            <a href="#" class="btn btn-sm btn-language dropdown-toggle" data-bs-toggle="dropdown">
              <i class="bi bi-person-circle"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end mt-3">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="#">Dashboard</a></li>
              <li><a class="dropdown-item" href="#">My Courses</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
  




      <!-- Mobile Sidebar Menu -->
      <div class="mobile_sidebar_menu" id="mobileSidebarMenu">
      @if ($globalcoursecategory)
        <!-- Category Menu -->
        <div class="menu-panel category-panel active">
          <div class="menu-header d-flex justify-content-between align-items-center">
            <h6>Categories</h6>
            <button id="closeSidebar" class="btn btn-sm btn-danger">&times;</button>
          </div>
          <ul class="menu-list">
            @foreach ($globalcoursecategory as $courseCate)
                <li><a href="{{route('coursecategory',$courseCate->url)}}">{{$courseCate->course_category_name}}</a>
                    @if ($courseCate->CourseSubcategory->count())
                        <span class="toggle-submenu" data-target="subcategory-panel{{$courseCate->slug}}"> <i class="bi bi-chevron-right"></i></span>
                    @endif
                </li>
            @endforeach
          </ul>
        </div>

        <!-- Subcategory Menu -->
        @foreach ($globalcoursecategory as $courseCate)
        <div class="menu-panel subcategory-panel{{$courseCate->slug}}">
          <div class="menu-header d-flex justify-content-between align-items-center">
            <button class="btn btn-sm btn-light back-btn" data-back="category-panel"><i class="bi bi-chevron-left"></i></button>
            <h6>{{$courseCate->course_category_name}}</h6>
          </div>
          <ul class="menu-list">
            @foreach ($courseCate->CourseSubcategory as $coursesubCate)
                <li><a href="{{route('coursesubcategory',[$courseCate->url,$coursesubCate->url])}}"> {{$coursesubCate->course_sub_category_name}} </a>
                    @if ($coursesubCate->CourschildCategory->count())
                        <span class="toggle-submenu" data-target="childcategory-panel{{$coursesubCate->slug}}"> <i class="bi bi-chevron-right"></i></span>
                    @endif
                </li>
            @endforeach
          </ul>
        </div>
        @endforeach




  
        <!-- Child Category Menu -->
        @foreach ($globalcoursecategory as $courseCate)
        @foreach ($courseCate->CourseSubcategory as $coursesubCate)
        <div class="menu-panel childcategory-panel{{$coursesubCate->slug}}">
          <div class="menu-header d-flex justify-content-between align-items-center">
            <button class="btn btn-sm btn-light back-btn" data-back="subcategory-panel{{$courseCate->slug}}"><i class="bi bi-chevron-left"></i></button>
            <h6>{{$coursesubCate->course_sub_category_name}}</h6>
          </div>
          <ul class="menu-list">
            @foreach ($coursesubCate->CourschildCategory as $childCate)
            <li>
                <a href="{{route('coursechildcategory',[$courseCate->url,$coursesubCate->url,$childCate->url])}}">{{$childCate->course_child_category_name}}</a>

                <span class="toggle-submenu" data-target="category-panel"> <i class="bi bi-chevron-right"></i></span>

            </li>
            @endforeach
         
             
          </ul>
        </div>
        @endforeach
        @endforeach

        @endif

      </div>




    </div>
  </section>
  


  </header>


{{--  =======  website content loaded here ==========    --}}
  @yield('website_contents')
{{--  =======  website content loaded here ==========    --}}









<hr>
      

@includeIf('frontend/my_component/footer/footer')
@includeIf('frontend/my_component/canvas/allcanvas')

<!-- Page Content Goes Here -->
<!-- jQuery (Required for some plugins) -->
<script src="{{asset('contents/frontend/assets')}}/assetss/js/jquery-3.7.1.min.js"></script>
<!--  Bootstrap js  -->
<script src="{{asset('contents/frontend/assets')}}/assetss/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
<script src="{{asset('contents/frontend/assets')}}/assetss/js/fontawesome.min.js"></script>
<!--  owl Carousel js  -->
<script src="{{asset('contents/frontend/assets')}}/assetss/js/owl.carousel.min.js"></script>
<!-- slick js  -->
<script src="{{asset('contents/frontend/assets')}}/assetss/js/slick.min.js"></script>
<!-- aos animate js  -->
<script src="{{asset('contents/frontend/assets')}}/assetss/js/aos.js"></script>
<!-- wow  animate js  -->
<script src="{{asset('contents/frontend/assets')}}/assetss/js/wow.min.js"></script>
<!-- custom code for owl slider -->
<script src="{{asset('contents/frontend/assets')}}/assetss/js/owl_slider.js"></script>
<!-- custom code for slick slider -->
<script src="{{asset('contents/frontend/assets')}}/assetss/js/slick_slider.js"></script>
<!-- custom js  -->
<script src="{{asset('contents/frontend/assets')}}/assetss/js/custom.js"></script>
<!-- AOS animate initialization  js  -->
<script>
    AOS.init();
</script>
<!-- Initialize WOW -->
<script>
    new WOW().init();
</script>
 
<!-- JavaScript -->
<script>
  const exploreBtn = document.getElementById('exploreBtn');
  const closeBtn = document.getElementById('closeSidebar');
  const sidebar = document.getElementById('mobileSidebarMenu');
  const panels = document.querySelectorAll('.menu-panel');
  const backButtons = document.querySelectorAll('.back-btn');

  // Explore button click
  exploreBtn.addEventListener('click', function (e) {
    e.preventDefault();
    sidebar.classList.toggle('open');
    panels.forEach(panel => panel.classList.remove('active'));
    document.querySelector('.category-panel').classList.add('active');
  });

  // Only open submenu when clicking on > icon
  document.querySelectorAll('.toggle-submenu').forEach(toggle => {
    toggle.addEventListener('click', function (e) {
      e.stopPropagation(); // Prevent parent link click
      const target = this.getAttribute('data-target');
      if (target) {
        panels.forEach(panel => panel.classList.remove('active'));
        document.querySelector(`.${target}`).classList.add('active');
      }
    });
  });

  // Back button functionality
  backButtons.forEach(btn => {
    btn.addEventListener('click', function () {
      const backTo = this.getAttribute('data-back');
      if (backTo) {
        panels.forEach(panel => panel.classList.remove('active'));
        document.querySelector(`.${backTo}`).classList.add('active');
      }
    });
  });

  // Close Sidebar
  closeBtn.addEventListener('click', function () {
    sidebar.classList.remove('open');
  });
</script>

  
  
</body>
</html>
