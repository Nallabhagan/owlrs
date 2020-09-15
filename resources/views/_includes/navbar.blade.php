<div id="main-navbar" class="navbar is-inline-flex is-transparent no-shadow is-hidden-mobile">
    <div class="container is-fluid">
        <div class="navbar-brand">
            <a href="/" class="navbar-item">
                <img class="logo" src="{{ url('assets/img/logo.svg') }}" width="112" height="28" alt="">
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                <!-- Navbar Search -->
                <div class="navbar-item is-icon">
                    <a class="icon-link is-primary @if (Request::path() == '/') is-active @endif" href="{{ url('/') }}">
                        <i data-feather="home"></i> 
                    </a>
                </div>
                <div class="navbar-item is-icon">
                    <a class="icon-link is-primary @if (Request::path() == 'discover-people') is-active @endif" href="{{ url('discover-people') }}">
                        <i data-feather="user"></i> 
                    </a>
                </div>
                <x-navbar.notification />
                
            </div>

            <div class="navbar-end">

                
                @auth
                    <div id="account-dropdown" class="navbar-item is-account drop-trigger has-caret ml-auto">
                        <div class="user-image">
                            <img  src="{{ Helper::profilepic(Auth::id()) }}" alt="Profile Pic">
                        </div>
                        <span class="font-weight-bold ml-3">My Nest <i class="mdi mdi-chevron-down"></i></span>
                        <div class="nav-drop is-account-dropdown">
                            <div class="inner">
                                
                                <div class="nav-drop-body account-items">
                                    <a id="profile-link" href="{{ url('user') }}/{{ Hashids::connection('user')->encode(Auth::id()) }}" class="account-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="image">
                                                    <img  src="{{ Helper::profilepic(Auth::id()) }}" alt="Profile Pic">
                                                    
                                                </div>
                                            </div>
                                            <div class="media-content">
                                                <h3>{{ Auth::user()->name }}</h3>
                                                <small>Main account</small>
                                            </div>
                                            <div class="media-right">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <hr class="account-divider">
                                    <a href="{{ route('logout') }}" 
                                                 onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" role="button" class="account-item">
                                        <div class="media">
                                            <div class="icon-wrap">
                                                <i data-feather="power"></i>
                                            </div>
                                            <div class="media-content">
                                                <h3>Log out</h3>
                                                <small>Log out from your account.</small>
                                            </div>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ url('login') }}" class="navbar-item is-account drop-trigger has-caret ml-auto">
                        <div class="user-image">
                            <img  src="{{ url('assets/img/profile_pics/user.jpg') }}" alt="Profile Pic">
                        </div>
                        <span class="ml-3 font-weight-bold">Sign In/Sign Up</span>
                    </a>
                @endauth
            </div>

        </div>
    </div>
</div>        
<nav class="navbar mobile-navbar is-hidden-desktop" aria-label="main navigation">
    <!-- Brand -->
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <img src="{{ url('assets/img/logo.svg') }}" alt="">
        </a>
        <div class="navbar-item is-icon">
            <a class="icon-link is-primary @if (Request::path() == '/') is-active @endif" href="{{ url('/') }}">
                <i data-feather="home"></i> 
            </a>
        </div>
        <div class="navbar-item is-icon">
            <a class="icon-link is-primary @if (Request::path() == 'discover-people') is-active @endif" href="{{ url('discover-people') }}">
                <i data-feather="user"></i> 
            </a>
        </div>
        <x-navbar.notification />
        @auth
            <div id="account-dropdown" class="navbar-item is-account drop-trigger has-caret ml-auto">
                <div class="user-image">
                    <img  src="{{ Helper::profilepic(Auth::id()) }}" alt="Profile Pic">
                </div>
                <span class="font-weight-bold ml-3">My Nest <i class="mdi mdi-chevron-down"></i></span>
                <div class="nav-drop is-account-dropdown">
                    <div class="inner">
                        
                        <div class="nav-drop-body account-items">
                            <a id="profile-link" href="{{ url('user') }}/{{ Hashids::connection('user')->encode(Auth::id()) }}" class="account-item">
                                <div class="media">
                                    <div class="media-left">
                                        <div class="image">
                                            <img  src="{{ Helper::profilepic(Auth::id()) }}" alt="Profile Pic">
                                            
                                        </div>
                                    </div>
                                    <div class="media-content">
                                        <h3>{{ Auth::user()->name }}</h3>
                                        <small>Main account</small>
                                    </div>
                                    <div class="media-right">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </a>
                            <hr class="account-divider">
                            <a href="{{ route('logout') }}" 
                                         onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" role="button" class="account-item">
                                <div class="media">
                                    <div class="icon-wrap">
                                        <i data-feather="power"></i>
                                    </div>
                                    <div class="media-content">
                                        <h3>Log out</h3>
                                        <small>Log out from your account.</small>
                                    </div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <a href="{{ url('login') }}" class="navbar-item is-account drop-trigger has-caret ml-auto">
                <div class="user-image">
                    <img  src="{{ url('assets/img/profile_pics/user.jpg') }}" alt="Profile Pic">
                </div>
                <span class="ml-3 font-weight-bold">Sign In/Sign Up</span>
            </a>
        @endauth
    </div>
</nav>