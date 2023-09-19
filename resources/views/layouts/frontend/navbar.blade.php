<div class="container">
    <button class="navbar-toggler custom-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-toggler my-2" href="{{ url('/') }}">
        <img src="@if (isset($landingpage->img_logo))
            {{ asset('storage/' . $landingpage->img_logo) }}
        @else
            {{ asset('images/logo.png') }}
        @endif" class="logo-responsive d-inline-block align-text-top">
    </a>
    <div class="collapse navbar-collapse bg-navbar-responsive" id="navbarTogglerDemo03">
        <div class="d-flex me-auto my-2">
            <a class="navbar-brand hidden-responsive" href="{{ url('/') }}">
                <img src="@if (isset($landingpage->img_logo))
                    {{ asset('storage/' . $landingpage->img_logo) }}
                @else
                    {{ asset('images/logo.png') }}
                @endif" width="50" height="50" class="d-inline-block align-text-top">
            </a>
            <div class="text-white">
                <div class="fw-bolder subtitle-2">CV. Arta Mandiri</div>
                <div class="lead subtitle-1">Agricultural And Industrial Export Company</div>
            </div>
        </div>
        
        <ul class="navbar-nav topnav mb-2 mb-lg-0 my-3 subtitle-1 gap-md-4">
            <li class="nav-item text-center">
                <a class="nav-link text-white rounded-3" aria-current="page" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item text-center">
                <a class="nav-link text-white rounded-3" aria-current="page" href="{{ url('/#about') }}">About</a>
            </li>
            <li class="nav-item text-center">
                <a class="nav-link text-white" aria-current="page" href="{{ url('/#profil') }}">Profile</a>
            </li>
            <li class="nav-item text-center">
                <a class="nav-link text-white rounded-3" aria-current="page" href="{{ route('product') }}">Product</a>
            </li>
            <li class="nav-item text-center">
                <a class="nav-link text-white rounded-3 " aria-current="page" href="{{ route('article') }}">Article</a>
            </li>

            @guest
            <li class="nav-item text-center margin-top-1">
                <a class="nav-link text-white rounded-3 subtitle-1" aria-current="page" href="{{ url('login') }}">Sign In</a>
            </li>
            @else
            <li class="margin-top-1">
                <div class="dropdown">
                    <a class="dropdown-toggle px-3 btn btn-light rounded-3 subtitle-1" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Account
                    </a>
                    <ul class="dropdown-menu mt-2" aria-labelledby="navbarDropdown">
                        <li class="text-green px-3">{{ explode(' ', trim(Auth::user()->name))[0] }}</li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center subtitle-1" href="{{ route('dashboard') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-patch-check-fill text-green" viewBox="0 0 16 16">
                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                </svg>
                                <span class="ml-3">Dashboard</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                                    <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                                    <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"/>
                                </svg>
                                <span class="ml-3">Password</span>
                            </a>
                        </li> --}}
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center subtitle-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                </svg>
                                <span class="ml-3">Logout</span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</div>