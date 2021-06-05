<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown d-none d-lg-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                    <i class="fe-maximize noti-icon"></i>
                </a>
            </li>

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                    @if(Auth::user()->role==1)
                        <img src="{{asset('storage/employees/'.Auth::user()->employee->image)}}" alt="image" class="avatar-sm rounded-circle">
                        {{ Auth::user()->employee->first_name }} {{ Auth::user()->employee->last_name }}
                    @elseif((Auth::user()->role==0))
                        <img src="{{asset('assets/images/users/user-6.jpg')}}" alt="image" class="avatar-sm rounded-circle">
                        Admin
                    @endif


                    <span class="pro-user-name ml-1">

                        <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('navbar.welcome') }}</h6>
                    </div>

                    <!-- item-->
                    <a href="{{ url('/profile') }}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>{{ __('navbar.account') }}</span>
                    </a>




                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="{{url('/logout')}}" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>{{ __('navbar.logout') }}</span>
                    </a>

                </div>
            </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <!--<a href="index.html" class="logo logo-light text-center">-->
            <a href="/#" class="logo logo-light text-center">
                <span class="logo-lg">
                    <img src="{{asset('assets/images/logo_ibma.png')}}" alt="" height="20">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
