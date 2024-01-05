<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Dashboard')</title>
    @include('layouts.platoon_leader.styles')
    @yield('styles')

</head>

<body class="g-sidenav-pinned">
    @include('layouts.platoon_leader.modal')
    {{-- Side Nav --}}
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <img class="mt-3 custom-avatar-md ml-4" src="{{ handleNullAvatar(auth()->user()->avatar_profile) }}"
                    width="115" alt="avatar" title="{{ auth()->user()->student->full_name }}">
                <div class="d-block d-lg-none">
                    <div class="sidenav-toggler" data-action="sidenav-unpin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <h5 class="font-weight-normal p-0 text-muted mt-2 mt-md-0 mb-1">
                        {{ auth()->user()->student->full_name }}
                    </h5>
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        {{-- <li class="nav-item">
                            <a class="nav-link @if (Route::is('platoon_leader.dashboard.index')) active @endif"
                                href="{{ route('platoon_leader.dashboard.index') }}">
                                <i class="ni ni-tv-2"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('platoon_leader.attendances.*')) active @endif"
                                href="{{ route('platoon_leader.attendances.index') }}">
                                <i class="fas fa-clipboard-list"></i>
                                <span class="nav-link-text">Attendance Management</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('platoon_leader.students.*') || Route::is('platoon_leader.performances.*')) active @endif"
                                href="#to_student_management" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-tables">
                                <i class="fas fa-users"></i>
                                <span class="nav-link-text">
                                    Platoon Management
                                </span>
                            </a>
                            <div class="collapse @if (Route::is('platoon_leader.students.*') || Route::is('platoon_leader.studentfinalgrade.*')  || Route::is('platoon_leader.studentgrade.*') || Route::is('platoon_leader.merits-demerits.*') || Route::is('platoon_leader.attendance-records.*') || Route::is('platoon_leader.performances.*')) show @endif"
                                id="to_student_management">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('platoon_leader.students.index') }}"
                                            class="nav-link  @if (Route::is('platoon_leader.students.*')) text-primary @endif">
                                            Student
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('platoon_leader.performances.index') }}"
                                            class="nav-link  @if (Route::is('platoon_leader.performances.*')) text-primary @endif">
                                            Student Performance
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('platoon_leader.attendance-records.index') }}"
                                            class="nav-link  @if (Route::is('platoon_leader.attendance-records.*')) text-primary @endif">
                                            Student Attendance Records 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('platoon_leader.merits-demerits.index') }}"
                                            class="nav-link  @if (Route::is('platoon_leader.merits-demerits.*')) text-primary @endif">
                                            Student Merits and Demerits Points
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('platoon_leader.studentgrade.index') }}"
                                            class="nav-link  @if (Route::is('platoon_leader.studentgrade.*')) text-primary @endif">
                                            Student Grades
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('platoon_leader.studentfinalgrade.index') }}"
                                            class="nav-link  @if (Route::is('platoon_leader.studentfinalgrade.*')) text-primary @endif">
                                            Student Final Grades
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal">Others</span>
                    </h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">

                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('platoon_leader.attendance-monitoring.index')) active @endif"
                                href="{{ route('platoon_leader.attendance-monitoring.index') }}">
                                <i class="fas fa-camera"></i>
                                <span class="nav-link-text">Attendance Monitoring</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('profile.index')) active @endif"
                                href="{{ route('profile.index') }}">
                                <i class="ni ni-single-02"></i>
                                <span class="nav-link-text">Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav> {{-- End Side Nav --}}

    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <h3 class="text-white d-none d-md-block font-weight-normal">
                    {{ config('app.name') }} | <span class="text-uppercase">Platoon -
                        {{ auth()->user()->student->platoon->name }}</span>
                </h3>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img src="{{ handleNullAvatar(auth()->user()->avatar_profile) }}"
                                            class="avatar rounded-circle" alt="Image placeholder">
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Settings</h6>
                                </div>
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
                                <form action="{{ route('auth.logout') }}" method="post" id="logout">@csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        @yield('content')
    </div>
    {{-- End Main Content --}}

    @include('layouts.platoon_leader.scripts')
    <script src="{{ asset('assets/js/platoon_leader/script.js') }}"></script>
    @yield('script')
    @routes

</body>

</html>
