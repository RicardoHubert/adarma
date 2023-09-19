<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
        <div class="user-image">
            <a href="{{ route('profile') }}">
                <img src=" 
                @if (isset(auth()->user()->image))
                    {{ asset('storage/' . auth()->user()->image) }}
                @else
                    {{ asset('images/user.png') }}
                @endif
                " style="object-fit: cover;">
            </a>
        </div>
        <div class="user-name">
            {{ auth()->user()->name }}
        </div>
        {{-- <div class="user-designation mt-3" style="font-size: 0.7em">
            <span class="p-1 bg-secondary rounded text-black">
                {{ auth()->user()->role->name }}
            </span>
        </div> --}}
    </div>
    <ul class="nav">
        <li class="nav-item mb-1 @if ($title == 'Dashboard') active @endif">
            <a class="nav-link @if ($title == 'Dashboard') active @endif" href="{{ route('dashboard') }}">
                <i class="icon-box menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if ( 
            auth()->user()->role->name == 'super_admin' 
            || auth()->user()->role->name == 'admin' 
            )
            <li class="nav-item mb-1 @if ($title == 'Users') active @endif">
                <a class="nav-link @if ($title == 'Users') active @endif" href="{{ route('users') }}">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Users</span>
                </a>
            </li>
            <li class="nav-item mb-1 @if ($title == 'Landing Page') active @endif">
                <a class="nav-link @if ($title == 'Landing Page') active @endif" href="{{ route('landingpage') }}">
                    <i class="icon-content-left menu-icon"></i>
                    <span class="menu-title">Landing Page</span>
                </a>
            </li>
        @endif
        @if (
            auth()->user()->role->name != 'user'
        )
            <li class="nav-item mb-1">
                <a class="nav-link" data-toggle="collapse" href="#article" aria-expanded="false" aria-controls="article">
                    <i class="icon-paper menu-icon"></i>
                        <span class="menu-title">Article</span>
                    <i class="menu-arrow"></i>
                </a>            
                <div class="collapse" id="article">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item mb-1 @if ($title == 'Article') active @endif"> <a class="nav-link @if ($title == 'Article') active @endif" href="{{ route('article.index') }}">Post</a></li>
                        @if (
                            auth()->user()->role->name == 'super_admin'
                            || auth()->user()->role->name == 'admin'
                        )
                            <li class="nav-item mb-1 @if ($title == 'Category Article') active @endif"> <a class="nav-link @if ($title == 'Category Article') active @endif" href="{{ route('category_article.index') }}">Category</a></li>
                            <li class="nav-item mb-1 @if ($title == 'Writer') active @endif"> <a class="nav-link @if ($title == 'Writer') active @endif" href="{{ route('writer.index') }}">Writer</a></li>
                            <li class="nav-item mb-1 @if ($title == 'Editor') active @endif"> <a class="nav-link @if ($title == 'Editor') active @endif" href="{{ route('editor') }}">Editor</a></li>
                        @endif
                    </ul>
                </div>
            </li>
        @endif
        @if (
            auth()->user()->role->name == 'super_admin'
            || auth()->user()->role->name == 'admin'
        )
            <li class="nav-item mb-1">
                <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
                    <i class="icon-bag menu-icon"></i>
                        <span class="menu-title">Product</span>
                    <i class="menu-arrow"></i>
                </a>            
                <div class="collapse" id="product">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item mb-1 @if ($title == 'Product') active @endif"> <a class="nav-link @if ($title == 'Product') active @endif" href="{{ route('product.index') }}">Item</a></li>
                        <li class="nav-item mb-1 @if ($title == 'Category Product') active @endif"> <a class="nav-link @if ($title == 'Category Product') active @endif" href="{{ route('category_product.index') }}">Category</a></li>
                        <li class="nav-item mb-1 @if ($title == 'Product Request') active @endif"> <a class="nav-link @if ($title == 'Product Request') active @endif" href="{{ route('product.request.index') }}">Request</a></li>
                    </ul>
                </div>
            </li>
        @endif
    </ul>
</nav>