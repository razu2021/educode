
<nav class="navbar navbar-light navbar-vertical navbar-expand-xl" style="display: none;">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">
            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
        </div>
        <a class="navbar-brand" href="index.html">
            <div class="d-flex align-items-center py-3"><img class="me-2" src="{{asset('contents/backend/assets')}}/assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif text-primary">falcon</span></div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span></div>
                    </a>
                    <ul class="nav collapse show" id="dashboard">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('admin.dashboard')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Default</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="analytics.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">your Dashboard</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>  
                        
                    </ul>
                </li>
                  
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Course Management </div>
                        <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                   
                    <!-- parent pages-->
                  
                    <a class="nav-link dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-envelope-open"></span></span><span class="nav-link-text ps-1">Profile Setup </span></div>
                    </a>
                    <ul class="nav collapse" id="email">
                        <li class="nav-item">
                            <a class="nav-link bg-success" href="{{route('category.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Profile Status</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">About Information</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('subcategory.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Education</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('childcategory.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Experience</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('childcategory.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Social Media</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#events" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-calendar-day"></span></span><span class="nav-link-text ps-1">My Courses</span></div>
                    </a>
                    <ul class="nav collapse" id="events">

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Courses</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.add')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create New Course</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.active_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Active Courses</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.pending_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Pending Courses</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.reject_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Rejected Courses</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.topsale_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1"> Top Selling Courses</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.tranding_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Trending Courses</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Featured Courses</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.recycle')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Archived Courses</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.allourse_category')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Course Categories</span></div>
                            </a>
                        </li>
                    </ul>
                    {{-- end --}}
                    <a class="nav-link dropdown-indicator" href="#course_price" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="bi bi-tag-fill"></span></span><span class="nav-link-text ps-1"> Course Price</span></div>
                    </a>
                    <ul class="nav collapse" id="course_price">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course_price.all_course_price')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Prices</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add New Prices</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_coupon.all_data')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Coupons Management </span></div>
                            </a>
                        </li>
                    </ul>
                    {{-- end  --}}
                    <a class="nav-link dropdown-indicator" href="#course_live" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fa fa-video"></span></span><span class="nav-link-text ps-1"> Live Classes </span></div>
                    </a>
                    <ul class="nav collapse" id="course_live">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Classes</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create New Live </span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Class Attandence </span></div>
                            </a>
                        </li>
                    </ul>
                    {{-- end  --}}
                    <a class="nav-link dropdown-indicator" href="#course_module" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="bi bi-diagram-3-fill"></span></span><span class="nav-link-text ps-1"> Course Module</span></div>
                    </a>
                    <ul class="nav collapse" id="course_module">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course_module.all_data')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Module</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course_module.all_data')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create New Module</span></div>
                            </a>
                        </li>
                    </ul>
                    {{-- end  --}}
                    <a class="nav-link dropdown-indicator" href="#course_content" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="bi bi-diagram-3-fill"></span></span><span class="nav-link-text ps-1"> Course Contents</span></div>
                    </a>
                    <ul class="nav collapse" id="course_content">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course_content.all_data')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Content</span></div>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course_content_video.all_data')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Upload Video Content</span></div>
                            </a>
                        </li>
                    </ul>
                    {{-- end  --}}
                    <a class="nav-link dropdown-indicator" href="#course_attachment" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="bi bi-diagram-3-fill"></span></span><span class="nav-link-text ps-1"> Course Attachment</span></div>
                    </a>
                    <ul class="nav collapse" id="course_attachment">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course_attachment.all_data')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Attachment</span></div>
                            </a>
                        </li>
                    </ul>
                    {{-- end  --}}
                    <a class="nav-link dropdown-indicator" href="#course_batch" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="bi bi-diagram-3-fill"></span></span><span class="nav-link-text ps-1"> Course Batch</span></div>
                    </a>
                    <ul class="nav collapse" id="course_batch">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course_batch.all_data')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Batch</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create New Batch</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Batch Schedule</span></div>
                            </a>
                        </li>
                        
                    </ul>
                    {{-- end  --}}
                    <a class="nav-link dropdown-indicator" href="#course_anylitics" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events" disablade>
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="bi bi-bar-chart"></span></span><span class="nav-link-text ps-1">Course Analytics</span></div>
                    </a>
                    <ul class="nav collapse" id="course_anylitics">
                        <li class="nav-item" >
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Course Progress</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Copurse Statistics </span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">other ---</span></div>
                            </a>
                        </li>
                        
                    </ul>
                    {{-- end  --}}
                    <!--====================   Live Class ======================= -->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Assignments & Quizzes </div>
                        <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                   
                    <a class="nav-link dropdown-indicator" href="#course_assignment" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="bi bi-patch-question"></span></span><span class="nav-link-text ps-1"> Assignments </span></div>
                    </a>
                    <ul class="nav collapse" id="course_assignment">

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course_assignment.all_data')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Assignment</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add New Assignment</span></div>
                            </a>
                        </li>
                    </ul> 
                    <a class="nav-link dropdown-indicator" href="#course_quizzes" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="bi bi-patch-question"></span></span><span class="nav-link-text ps-1"> Quizzes </span></div>
                    </a>
                    <ul class="nav collapse" id="course_quizzes">

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course_quize.all_data')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Quizzes</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course_quize_qustion.all_data')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Qustion Management</span></div>
                            </a>
                        </li>
                        
                    </ul> 
                     <!--====================   Student Management  ======================= -->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Student Management</div>
                        <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                   
                    <a class="nav-link dropdown-indicator" href="#course_student" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="bi bi-people"></span></span><span class="nav-link-text ps-1">  Students </span></div>
                    </a>
                    <ul class="nav collapse" id="course_student">

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Student</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Paid Enrolment</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Free Enrolment</span></div>
                            </a>
                        </li>
                    </ul>

                    <a class="nav-link dropdown-indicator" href="#student_messages" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="bi bi-chat-dots"></span></span><span class="nav-link-text ps-1"> Communication  </span></div>
                    </a>
                    <ul class="nav collapse" id="student_messages">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Messages</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Direct Messages</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Send Email</span></div>
                            </a>
                        </li>
                    </ul>
                    <a class="nav-link dropdown-indicator" href="#student_progress" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-spinner"></span></span><span class="nav-link-text ps-1"> Progress  </span></div>
                    </a>
                    <ul class="nav collapse" id="student_progress">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Progress</span></div>
                            </a>
                        </li>
                    </ul>
                     <!--====================   Student Management  ======================= -->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Sales & Earnings</div>
                        <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                   
                    <a class="nav-link dropdown-indicator" href="#sales_report" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-dollar-sign"></span></span><span class="nav-link-text ps-1">  Sales & Earnings</span></div>
                    </a>
                    <ul class="nav collapse" id="sales_report">

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Revenue Reports</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Withdrawals</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Payment Settings</span></div>
                            </a>
                        </li>
                    </ul>
                    <a class="nav-link dropdown-indicator" href="#course_subscription" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-dollar-sign"></span></span><span class="nav-link-text ps-1"> Subscription Plan</span></div>
                    </a>
                    <ul class="nav collapse" id="course_subscription">

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Current Plan Details</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Upgrade / Downgrade</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Payment History</span></div>
                            </a>
                        </li>
                    </ul>



                     <!--====================   Student Management  ======================= -->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Reviews & Others</div>
                        <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                   
                    <a class="nav-link dropdown-indicator" href="#course_review" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-calendar-day"></span></span><span class="nav-link-text ps-1"> Reviews & Feedback</span></div>
                    </a>
                    <ul class="nav collapse" id="course_review">

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Course Reviews</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Student Feedback</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Instructor Ratings</span></div>
                            </a>
                        </li>
                    </ul>
                    <a class="nav-link dropdown-indicator" href="#course_affiliate" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-calendar-day"></span></span><span class="nav-link-text ps-1"> Affiliate Program</span></div>
                    </a>
                    <ul class="nav collapse" id="course_affiliate">

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">My Affiliate </span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Promote My Courses</span></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Instructor Ratings</span></div>
                            </a>
                        </li>
                    </ul>




                  
                     <!--====================   Student Management  ======================= -->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Support & Help </div>
                        <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider"/>
                        </div>
                    </div>
                   
                    <a class="nav-link dropdown-indicator" href="#estudent" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-calendar-day"></span></span><span class="nav-link-text ps-1">  Quizzes</span></div>
                    </a>
                    <ul class="nav collapse" id="estudent">

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ins_course.all_course')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add New Course</span></div>
                            </a>
                            
                        </li>
                    </ul>
                
                    {{-- =======  end items ================================================ --}}




               
               
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Documentation</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <!-- parent pages-->
                    <a class="nav-link" href="documentation/getting-started.html" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-rocket"></span></span><span class="nav-link-text ps-1">Getting started</span></div>
                    </a>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#customization" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="customization">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-wrench"></span></span><span class="nav-link-text ps-1">Customization</span></div>
                    </a>
                    <ul class="nav collapse" id="customization">
                        <li class="nav-item">
                            <a class="nav-link" href="documentation/customization/configuration.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Configuration</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="documentation/customization/styling.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Styling</span><span class="badge rounded-pill ms-2 badge-subtle-success">Updated</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="documentation/customization/dark-mode.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Dark mode</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="documentation/customization/plugin.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Plugin</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link" href="documentation/faq.html" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-question-circle"></span></span><span class="nav-link-text ps-1">Faq</span></div>
                    </a>
                    <!-- parent pages-->
                    <a class="nav-link" href="documentation/gulp.html" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-gulp"></span></span><span class="nav-link-text ps-1">Gulp</span></div>
                    </a>
                    <!-- parent pages-->
                    <a class="nav-link" href="documentation/design-file.html" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-palette"></span></span><span class="nav-link-text ps-1">Design file</span></div>
                    </a>
                    <!-- parent pages-->
                    <a class="nav-link" href="{{url('admin/dashboard/cc')}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-code-branch"></span></span><span class="nav-link-text ps-1">Optimize </span></div>
                    </a>
                </li>
            </ul>
            <div class="settings my-3">
                <div class="card shadow-none">
                    <div class="card-body alert mb-0" role="alert">
                        <div class="btn-close-falcon-container"><button class="btn btn-link btn-close-falcon p-0" aria-label="Close" data-bs-dismiss="alert"></button></div>
                        <div class="text-center"><img src="{{asset('contents/backend/assets')}}/assets/img/icons/spot-illustrations/navbar-vertical.png" alt="" width="80" />
                            <p class="fs-11 mt-2">Loving what you see? <br />Get your copy of <a href="#!">Falcon</a></p>
                            <div class="d-grid"><a class="btn btn-sm btn-primary" href="https://themes.getbootstrap.com/product/falcon-admin-dashboard-webapp-template/" target="_blank">Purchase</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
