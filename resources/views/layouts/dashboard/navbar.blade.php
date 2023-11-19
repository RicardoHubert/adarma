<nav class="navbar col-lg-12 col-12 p-0 fixed-top">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <!-- Display the logo and background color on larger screens -->
        <a class="brand-logo nav-link d-none d-lg-block" href="{{ url('/') }}">
            <div class="d-flex align-items-center justify-content-center">
                <img src="@if (isset($landingpage->img_logo))
                    {{ asset('storage/' . $landingpage->img_logo) }}
                @else
                    {{ asset('images/logo.png') }}
                @endif" width="100" height="40" alt="logo"/>
            </div>
        </a>
        <!-- Logo for mobile view with a specific width of 100px -->
        <a class="navbar-brand brand-logo-mini d-lg-none" href="{{ url('/') }}">
            <img src="@if (isset($landingpage->img_logo))
                {{ asset('storage/' . $landingpage->img_logo) }}
            @else
                {{ asset('images/logo.png') }}
            @endif" alt="logo" width="100" />
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="search">
                            <i class="icon-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search Projects.." aria-label="search" aria-describedby="search">
                </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-flex">
                <button class="btn btn-primary"> Adarma Learning </button>
            </li>
            <li class="nav-item dropdown d-flex">
                <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                    <i class="icon-bell mx-0"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">No Messages</p>
                </div>
            </li>
            <li class="nav-item dropdown d-flex mr-4 ">
                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="icon-cog"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <p class="mb-0 font-weight-ninormal float-left dropdown-header">Settings</p>
                    <a class="dropdown-item preview-item weight-light small-text text-muted mb-0" href="{{ route('profile') }}">               
                        <i class="icon-head"></i> Profile
                    </a>
                    <a class="dropdown-item preview-item weight-light small-text text-muted mb-0" href="{{ route('home') }}" target="_blank">               
                        <i class="icon-monitor"></i> Website
                    </a>
                    <a class="dropdown-item preview-item weight-light small-text text-muted mb-0"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="icon-inbox"></i> Logout
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
