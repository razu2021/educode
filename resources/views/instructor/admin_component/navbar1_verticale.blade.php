
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
                        <div class="col-auto navbar-vertical-label">Product Management </div>
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
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-shopping-cart"></span></span><span class="nav-link-text ps-1">E commerce</span></div>
                    </a>
                    <ul class="nav collapse" id="e-commerce">
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#product" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product</span></div>
                            </a>
                            <!-- more inner pages-->
                            <ul class="nav collapse" id="product">
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product list</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-grid.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product grid</span></div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-details.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product details</span></div>
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