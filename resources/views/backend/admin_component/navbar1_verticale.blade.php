
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
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Analytics</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="crm.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">CRM</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="e-commerce.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">E commerce</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lms.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">LMS</span><span class="badge rounded-pill ms-2 badge-subtle-success">New</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="project-management.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Management</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="saas.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">SaaS</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="support-desk.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Support desk</span><span class="badge rounded-pill ms-2 badge-subtle-success">New</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                   
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Product Management </div>
                        <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                   
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-envelope-open"></span></span><span class="nav-link-text ps-1">Category </span></div>
                    </a>
                    <ul class="nav collapse" id="email">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Category's</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('subcategory.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Sub Category's</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('childcategory.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Child Category's</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#events" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-calendar-day"></span></span><span class="nav-link-text ps-1">Courses</span></div>
                    </a>
                    <ul class="nav collapse" id="events">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('coursecategory.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Courses Category</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('coursesubcategory.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Courses Sub Category</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('coursechildcategory.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Courses Child Category</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('course.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Course's</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="event-list.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Event list</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#e-commerce" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-shopping-cart"></span></span><span class="nav-link-text ps-1">Instructor</span></div>
                    </a>
                    <ul class="nav collapse" id="e-commerce">
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#product" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Instructor</span></div>
                            </a>
                            <!-- more inner pages-->
                            <ul class="nav collapse" id="product">
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">New Request </span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-grid.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Rejected </span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-details.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Active</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="add-product.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add product</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#orders" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Orders</span></div>
                            </a>
                            <!-- more inner pages-->
                            <ul class="nav collapse" id="orders">
                                <li class="nav-item">
                                    <a class="nav-link" href="order-list.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Order list</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="order-details.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Order details</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="customers.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Customers</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="customer-details.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Customer details</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shopping-cart.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Shopping cart</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="checkout.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Checkout</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="billing.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Billing</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="invoice.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Invoice</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#e-learning" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-learning">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-graduation-cap"></span></span><span class="nav-link-text ps-1">E learning</span><span class="badge rounded-pill ms-2 badge-subtle-success">New</span></div>
                    </a>
                    <ul class="nav collapse" id="e-learning">
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#course" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-learning">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Course</span></div>
                            </a>
                            <!-- more inner pages-->
                            <ul class="nav collapse" id="course">
                                <li class="nav-item">
                                    <a class="nav-link" href="course-list.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Course list</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="course-grid.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Course grid</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="course-details.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Course details</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="create-a-course.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create a course</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="student-overview.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Student overview</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="trainer-profile.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Trainer profile</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link" href="{{route('metatag.all')}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-trello"></span></span><span class="nav-link-text ps-1">Seo Data</span></div>
                    </a>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#social" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="social">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-share-alt"></span></span><span class="nav-link-text ps-1">Social</span></div>
                    </a>
                    <ul class="nav collapse" id="social">
                        <li class="nav-item">
                            <a class="nav-link" href="feed.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Feed</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="activity-log.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Activity log</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="notifications.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Notifications</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="followers.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Followers</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    {{-- pricing  --}}
                     <a class="nav-link dropdown-indicator" href="#pricing" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="pricing">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-tags"></span></span><span class="nav-link-text ps-1">Pricing</span></div>
                    </a>
                    <ul class="nav collapse" id="pricing">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('subscriptionplan.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Pricing default</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#support-desk" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="support-desk">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-ticket-alt"></span></span><span class="nav-link-text ps-1">Support desk</span></div>
                    </a>
                    <ul class="nav collapse" id="support-desk">
                        <li class="nav-item">
                            <a class="nav-link" href="table-view.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Table view</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="card-view.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Card view</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contacts.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Contacts</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact-details.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Contact details</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tickets-preview.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Tickets preview</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="quick-links.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Quick links</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="app/support-desk/reports.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Reports</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Pages</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <!-- parent pages-->
                    <a class="nav-link" href="starter.html" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-flag"></span></span><span class="nav-link-text ps-1">Starter</span></div>
                    </a>
                    <!-- parent pages-->
                    <a class="nav-link" href="landing.html" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-globe"></span></span><span class="nav-link-text ps-1">Landing</span></div>
                    </a>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#authentication" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="authentication">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-lock"></span></span><span class="nav-link-text ps-1">Authentication</span></div>
                    </a>
                    <ul class="nav collapse" id="authentication">
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#simple" data-bs-toggle="collapse" aria-expanded="false" aria-controls="authentication">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Simple</span></div>
                            </a>
                            <!-- more inner pages-->
                            <ul class="nav collapse" id="simple">
                                <li class="nav-item">
                                    <a class="nav-link" href="login.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Login</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Logout</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="register.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Register</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="forgot-password.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Forgot password</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="confirm-mail.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Confirm mail</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="reset-password.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Reset password</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="lock-screen.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Lock screen</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#card" data-bs-toggle="collapse" aria-expanded="false" aria-controls="authentication">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Card</span></div>
                            </a>
                            <!-- more inner pages-->
                            <ul class="nav collapse" id="card">
                                <li class="nav-item">
                                    <a class="nav-link" href="card_login.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Login</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="card_logout.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Logout</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="card_register.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Register</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="card_forgot-password.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Forgot password</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="card_confirm-mail.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Confirm mail</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="card_reset-password.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Reset password</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="card_lock-screen.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Lock screen</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#split" data-bs-toggle="collapse" aria-expanded="false" aria-controls="authentication">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Split</span></div>
                            </a>
                            <!-- more inner pages-->
                            <ul class="nav collapse" id="split">
                                <li class="nav-item">
                                    <a class="nav-link" href="split_login.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Login</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="split_logout.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Logout</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="split_register.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Register</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="split_forgot-password.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Forgot password</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="split_confirm-mail.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Confirm mail</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="split_reset-password.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Reset password</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="split_lock-screen.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Lock screen</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/authentication/wizard.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Wizard</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#authentication-modal" data-bs-toggle="modal">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Modal</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#user" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="user">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">User</span></div>
                    </a>
                    <ul class="nav collapse" id="user">
                        <li class="nav-item">
                            <a class="nav-link" href="profile.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Profile</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="settings.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Settings</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->

                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#faq" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faq">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-question-circle"></span></span><span class="nav-link-text ps-1">Faq</span></div>
                    </a>
                    <ul class="nav collapse" id="faq">
                        <li class="nav-item">
                            <a class="nav-link" href="pages/faq/faq-basic.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Faq basic</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/faq/faq-alt.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Faq alt</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/faq/faq-accordion.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Faq accordion</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#errors" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="errors">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-exclamation-triangle"></span></span><span class="nav-link-text ps-1">Errors</span></div>
                    </a>
                    <ul class="nav collapse" id="errors">
                        <li class="nav-item">
                            <a class="nav-link" href="pages/errors/404.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">404</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/errors/500.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">500</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#miscellaneous" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="miscellaneous">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-thumbtack"></span></span><span class="nav-link-text ps-1">Miscellaneous</span></div>
                    </a>
                    <ul class="nav collapse" id="miscellaneous">
                        <li class="nav-item">
                            <a class="nav-link" href="pages/miscellaneous/associations.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Associations</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/miscellaneous/invite-people.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Invite people</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/miscellaneous/privacy-policy.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Privacy policy</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#Layouts" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="Layouts">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="far fa-window-restore"></span></span><span class="nav-link-text ps-1">Layouts</span></div>
                    </a>
                    <ul class="nav collapse" id="Layouts">
                        <li class="nav-item">
                            <a class="nav-link" href="navbar-vertical.html" target="_blank">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Navbar vertical</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="navbar-top.html" target="_blank">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Top nav</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="navbar-double-top.html" target="_blank">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Double top</span><span class="badge rounded-pill ms-2 badge-subtle-success">New</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="combo-nav.html" target="_blank">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Combo nav</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                </li>
                 <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Site Settings</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#forms" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-file-alt"></span></span><span class="nav-link-text ps-1">General Settings</span></div>
                    </a>
                    <ul class="nav collapse" id="forms">
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#basic" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Site Settings </span></div>
                            </a>
                            <!-- more inner pages-->
                            <ul class="nav collapse" id="basic">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('siteinformation.all')}}">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Site Information</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('preloader.all')}}">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Preloader</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('datetime.all')}}">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Date & Time Formate</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="modules/forms/basic/input-group.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">TimeZone</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('copyright.all')}}">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Copyright</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('iconmanagement.all')}}">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Faveicons</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('customcss.all')}}">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Custom Css</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('customscript.all')}}">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Custom Script</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="modules/forms/basic/input-group.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Cache Settings</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="modules/forms/basic/input-group.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Maintenance Mode</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                
                               
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#advance" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Contact Information</span></div>
                            </a>
                            <!-- more inner pages-->
                            <ul class="nav collapse" id="advance">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('siteemail.all')}}">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Email</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('sitephone.all')}}">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Phone</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('siteaddress.all')}}">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Address</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('embedmap.all')}}">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1"> Google Map</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('sitesocial.all')}}">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Social Media</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modules/forms/floating-labels.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Floating labels</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modules/forms/wizard.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Wizard</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modules/forms/validation.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Validation</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#tables" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="tables">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-table"></span></span><span class="nav-link-text ps-1"> Analytics Integration</span></div>
                    </a>
                    <ul class="nav collapse" id="tables">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('googletagmanager.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Google Tag Manager</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modules/tables/bulk-select.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Mailchimp</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#charts" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="charts">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-line"></span></span><span class="nav-link-text ps-1"> Authentication </span></div>
                    </a>
                    <ul class="nav collapse" id="charts">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('authcredential.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Login with Social</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('authcredential.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Google reCAPTCHA</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('authcredential.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Login & Registration </span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('authcredential.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Two-Factor</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('authcredential.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Email Verification</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('authcredential.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Ip Blacklisting</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('authcredential.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Multiple Attempts</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                       
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#icons" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="icons">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-shapes"></span></span><span class="nav-link-text ps-1">Email & Notification</span></div>
                    </a>
                    <ul class="nav collapse" id="icons">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('emailsetup.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Email Setup</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('siteadminmail.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Admin Mail</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('sendemail.add')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Send Email</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modules/icons/material-icons.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Email Template Manager</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modules/icons/material-icons.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Push Notification</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#maps" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="maps">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-map"></span></span><span class="nav-link-text ps-1"> Payment Gateway </span></div>
                    </a>
                    <ul class="nav collapse" id="maps">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('pgcredential.all')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Payment Gateway</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modules/maps/leaflet-map.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">PayPal</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modules/maps/leaflet-map.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Bkash</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modules/maps/leaflet-map.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Nagad</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modules/maps/leaflet-map.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Rocket</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modules/maps/leaflet-map.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">MasterCard</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                      
                    </ul>
                    <!-- parent pages-->


                    <a class="nav-link dropdown-indicator" href="#logs" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="maps">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-map"></span></span><span class="nav-link-text ps-1">Log Check </span></div>
                    </a>
                    <ul class="nav collapse" id="logs">
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Log File</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->
                    
                   
                    <!-- parent pages-->
                    <a class="nav-link" href="{{route('maintenancemode.all')}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><i class="bi bi-sliders"></i></span><span class="nav-link-text ps-1">Maintenance Mode</span></div>
                    </a>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#multi-level" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="multi-level">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-layer-group"></span></span><span class="nav-link-text ps-1">Multi level</span></div>
                    </a>
                    <ul class="nav collapse" id="multi-level">
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#level-two" data-bs-toggle="collapse" aria-expanded="false" aria-controls="multi-level">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Level two</span></div>
                            </a>
                            <!-- more inner pages-->
                            <ul class="nav collapse" id="level-two">
                                <li class="nav-item">
                                    <a class="nav-link" href="#!.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Item 1</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#!.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Item 2</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#level-three" data-bs-toggle="collapse" aria-expanded="false" aria-controls="multi-level">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Level three</span></div>
                            </a>
                            <!-- more inner pages-->
                            <ul class="nav collapse" id="level-three">
                                <li class="nav-item">
                                    <a class="nav-link" href="#!.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Item 3</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-indicator" href="#item-4" data-bs-toggle="collapse" aria-expanded="false" aria-controls="level-three">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Item 4</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                    <ul class="nav collapse" id="item-4">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#!.html">
                                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Item 5</span></div>
                                            </a>
                                            <!-- more inner pages-->
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#!.html">
                                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Item 6</span></div>
                                            </a>
                                            <!-- more inner pages-->
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#level-four" data-bs-toggle="collapse" aria-expanded="false" aria-controls="multi-level">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Level four</span></div>
                            </a>
                            <!-- more inner pages-->
                            <ul class="nav collapse" id="level-four">
                                <li class="nav-item">
                                    <a class="nav-link" href="#!.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Item 6</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-indicator" href="#item-7" data-bs-toggle="collapse" aria-expanded="false" aria-controls="level-four">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Item 7</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                    <ul class="nav collapse" id="item-7">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#!.html">
                                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Item 8</span></div>
                                            </a>
                                            <!-- more inner pages-->
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link dropdown-indicator" href="#item-9" data-bs-toggle="collapse" aria-expanded="false" aria-controls="item-7">
                                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Item 9</span></div>
                                            </a>
                                            <!-- more inner pages-->
                                            <ul class="nav collapse" id="item-9">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#!.html">
                                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Item 10</span></div>
                                                    </a>
                                                    <!-- more inner pages-->
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#!.html">
                                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Item 11</span></div>
                                                    </a>
                                                    <!-- more inner pages-->
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
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