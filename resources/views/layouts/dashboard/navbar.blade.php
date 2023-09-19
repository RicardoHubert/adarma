<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="brand-logo nav-link" href="{{ url('/') }}">
            <div class="d-flex align-items-center justify-content-center">
                <img src="@if (isset($landingpage->img_logo))
                                        {{ asset('storage/' . $landingpage->img_logo) }}
                                    @else
                                        {{ asset('images/logo.png') }}
                                    @endif" width="40" height="40" alt="logo"/>
                {{-- <span class="text-light ml-2 text-uppercase text-monospace">CV. Arta Mandiri</span> --}}
            </div>
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}"><img src="@if (isset($landingpage->img_logo))
                                        {{ asset('storage/' . $landingpage->img_logo) }}
                                    @else
                                        {{ asset('images/logo.png') }}
                                    @endif" alt="logo"/></a>
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
            <li class="nav-item dropdown d-flex">
                <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                    <i class="icon-bell mx-0"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">No Messages</p>
                    {{-- <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="{{ asset('images/faces/face4.jpg') }}" alt="image" class="profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow">
                            <h6 class="preview-subject ellipsis font-weight-normal weight-light small-text text-muted mb-0">David Grey</h6>
                            <p class="font-weight-light small-text text-muted mb-0">The meeting is cancelled</p>
                        </div>
                    </a> --}}
                </div>
            </li>
            <li class="nav-item dropdown d-flex mr-4 ">
                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="icon-cog"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
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