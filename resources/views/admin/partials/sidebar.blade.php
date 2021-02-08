<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
    <div class="container">

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="{{route('user.index')}}">
            <img src="{{ asset('frontend/img/logos/logo-2.png')}}" class="navbar-brand-img
          mx-auto" alt="..."> Admin
        </a>

        <!-- User (xs) -->
        <div class="navbar-user d-md-none">

            <!-- Dropdown -->
            <div class="dropdown">

                <!-- Toggle -->
                <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <img src="@if(auth()->user()->avatar) {{ auth()->user()->avatar }} @else {{ asset('backend/assets/img/avatars/profiles/avatar-1.jpg') }} @endif" class="avatar-img rounded-circle" alt="...">
                    </div>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                    <a href="./profile-posts.html" class="dropdown-item">Profile</a>
                    <a href="./account-general.html" class="dropdown-item">Settings</a>
                    <hr class="dropdown-divider">
                    <a href="./sign-in.html" class="dropdown-item">Logout</a>
                </div>

            </div>

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fe fe-search"></span>
                        </div>
                    </div>
                </div>
            </form>


            <!-- Navigation -->
            <ul class="navbar-nav mb-3">

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin') }}">
                        <i class="fe fe-home"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('notification.index') }}">
                        <i class="fe fe-bell"></i>Notification
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('business.index') }}">
                        <i class="fe fe-shopping-cart"></i> Food Truck
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('business.reviews') }}">
                        <i class="fe fe-shopping-bag"></i> Food Truck Reviews
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">
                        <i class="fe fe-briefcase"></i> Foods
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('order.index') }}">
                        <i class="fe fe-box"></i> Orders
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('coupon.index') }}">
                        <i class="fe fe-clipboard"></i> Coupon
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('booking_list.index') }}">
                        <i class="fe fe-clipboard"></i> Event
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('business_category.index') }}">
                        <i class="fe fe-align-justify"></i>Categories
                    </a>
                </li>

                 
                {{-- <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fe fe-calendar"></i>Events
                    </a>
                </li> --}}
               
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('package.index') }}" >
                        <i class="fe fe-box"></i>Package
                    </a>
                </li>

                
               
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <i class="fe fe-users"></i> Users
                    </a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roles.index') }}">
                        <i class="fe fe-star"></i> Roles
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('permissions.index') }}">
                        <i class="fe fe-shield"></i> Permissions
                    </a>
                </li>

             
            </ul>

            





            <!-- User (md) -->
            <div class="navbar-user d-none d-md-flex" id="sidebarUser">

                <!-- Icon -->
                <a href="#sidebarModalActivity" class="navbar-user-link" data-toggle="modal">
              <span class="icon">
                <i class="fe fe-bell"></i>
              </span>
                </a>

                <!-- Dropup -->
                <div class="dropup">

                    <!-- Toggle -->
                    <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-sm avatar-online">
                            <img src="@if(auth()->user()->avatar) {{ auth()->user()->avatar }} @else {{ asset('backend/assets/img/avatars/profiles/avatar-1.jpg') }} @endif" class="avatar-img rounded-circle" alt="...">
                        </div>
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                        <a href="{{ route('users.edit',Auth::user()->id) }}" class="dropdown-item">Profile</a>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                </div>

                <!-- Icon -->
                <a href="#sidebarModalSearch" class="navbar-user-link" data-toggle="modal">
              <span class="icon">
                <i class="fe fe-search"></i>
              </span>
                </a>

            </div>


        </div> <!-- / .navbar-collapse -->

    </div>
</nav>