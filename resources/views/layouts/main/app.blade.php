<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>@yield('title', 'ROTC Students Performance Record Management and Monitoring System')</title>
    @include('layouts.main.styles')

</head>

<body>

    @if (url()->current() !== route('auth.login') && url()->current() !== route('auth.register') && !Route::is('password.*'))
        <!-- Navbar -->
        <nav id="navbar-main"
            class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg bg-primary py-2">
            <div class="container">
                <a class="" href="/">
                    <img class="img-fluid rounded-circle" src="{{ asset('img/logo/logo.png') }}" width="50">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                    aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="/">
                                    <img src="{{ asset('img/logo/logo.png') }}">
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse"
                                    data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link" id="main_home_nav">
                                <span class="nav-link-inner--text">Home</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="about" role="button"
                                data-toggle="dropdown" aria-expanded="false" id="main_about_nav">
                                About
                            </a>
                            <div class="dropdown-menu" aria-labelledby="contact">
                                <a class="dropdown-item" href="">Contact Us</a>
                                <a class="dropdown-item" href="">FAQS</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link" id="main_community_nav">
                                <span class="nav-link-inner--text">Another Tab</span>
                            </a>
                        </li>

                    </ul>
                    <hr class="d-lg-none" />
                    <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                        @guest
                            <li class="nav-item">
                                <a href="{{ route('auth.login') }}" class="nav-link" id="main_login_nav">
                                    <span class="nav-link-inner--text">Login</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('auth.register') }}" class="nav-link" id="main_register_nav">
                                    <span class="nav-link-inner--text">Register</span>
                                </a>
                            </li>
                        @endguest

                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <div class="media align-items-center">
                                        <span class="avatar avatar-sm rounded-circle">
                                            <img src="{{ handleNullAvatar(auth()->user()->avatar_profile) }}"
                                                class="avatar rounded-circle" alt="Image placeholder">
                                        </span>
                                        <div class="media-body  ml-2  d-none d-lg-block">
                                            <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu  dropdown-menu-right ">
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Settings</h6>
                                    </div>
                                    @if (auth()->user()->hasRole('admin'))
                                        <a href="{{ route('admin.dashboard.index') }}" class="dropdown-item">
                                            <i class="ni ni-tv-2"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    @elseif (auth()->user()->hasRole('platoon_leader'))
                                        <a class="nav-link @if (Route::is('platoon_leader.dashboard.index')) active @endif"
                                            href="{{ route('platoon_leader.dashboard.index') }}">
                                            <i class="ni ni-tv-2"></i>
                                            <span class="nav-link-text">Dashboard</span>
                                        </a>
                                    @else
                                        <a href="{{ route('user.dashboard.index') }}" class="dropdown-item">
                                            <i class="ni ni-tv-2"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    @endif
                                    <a href="{{ route('profile.index') }}" class="dropdown-item">
                                        <i class="ni ni-single-02"></i>
                                        <span>Profile</span>
                                    </a>

                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"
                                        onclick="confirm('Do you want to Logout?', '', 'Yes').then(res => res.isConfirmed ? $('#logout').submit() : false)">
                                        <i class="fas fa-power-off"></i>
                                        <span>Logout</span>
                                    </a>
                                    <form action="{{ route('auth.logout') }}" method="post" id="logout">@csrf</form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    @endif
    <!-- Main content -->
    <main class="main-content">
        @yield('content')

    </main>

    @if (!Route::is('auth.login') && !Route::is('auth.register') && !Route::is('password.*'))
        @include('layouts.main.footer')
    @endif

    @include('layouts.main.scripts')

    @auth
        <script src="{{ asset('assets/js/client/script.js') }}"></script>
    @endauth

    @yield('script')

    @routes()

</body>

</html>
