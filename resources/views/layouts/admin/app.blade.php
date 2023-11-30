<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Admin | Dashboard')</title>
    @include('layouts.admin.styles')
    @yield('styles')
    {{-- 
    <style>
        .bg-primary,
        .btn-primary {
            background-color: <?php echo $settings->color_theme; ?> !important;
            border-color: <?php echo $settings->color_theme; ?> !important;
        }

        .active {
            background-color: <?php echo $settings->color_theme; ?> !important;
            border-color: <?php echo $settings->color_theme; ?> !important;
        }
    </style> --}}
</head>

<body class="g-sidenav-pinned">
    @include('layouts.admin.modal')
    {{-- Side Nav --}}
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <img class="mt-3 custom-avatar-md ml-4" src="{{ handleNullAvatar(auth()->user()->avatar_profile) }}"
                    width="115" alt="avatar" title="{{ auth()->user()->name }}">
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
                        {{ auth()->user()->name }}
                    </h5>
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('admin.dashboard.index')) active @endif"
                                href="{{ route('admin.dashboard.index') }}">
                                <i class="ni ni-tv-2"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('admin.departments.*') ||
                                    Route::is('admin.courses.*') ||
                                    Route::is('admin.platoons.*') ||
                                    Route::is('admin.students.*')) active @endif"
                                href="#to_student_management" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-tables">
                                <i class="fas fa-clipboard-list"></i>
                                <span class="nav-link-text">
                                    Student Management
                                </span>
                            </a>
                            <div class="collapse @if (Route::is('admin.departments.*') ||
                                    Route::is('admin.courses.*') ||
                                    Route::is('admin.platoons.*') ||
                                    Route::is('admin.students.*')) show @endif"
                                id="to_student_management">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.departments.index') }}"
                                            class="nav-link @if (Route::is('admin.departments.*')) text-primary @endif">
                                            Department
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.courses.index') }}"
                                            class="nav-link  @if (Route::is('admin.courses.*')) text-primary @endif">
                                            Course
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('admin.platoons.index') }}"
                                            class="nav-link  @if (Route::is('admin.platoons.*')) text-primary @endif">
                                            Platoon
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('admin.students.index') }}"
                                            class="nav-link  @if (Route::is('admin.students.*')) text-primary @endif">
                                            Student
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('admin.attendances.*')) active @endif"
                                href="{{ route('admin.attendances.index') }}">
                                <i class="fas fa-clipboard"></i>
                                <span class="nav-link-text">Attendance Record</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('admin.performances.*')) active @endif"
                                href="{{ route('admin.performances.index') }}">
                                <i class="fas fa-clipboard-list"></i>
                                <span class="nav-link-text">Performance Record</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('admin.users.index')) active @endif"
                                href="{{ route('admin.users.index') }}">
                                <i class="fas fa-user-cog"></i>
                                <span class="nav-link-text">Auth Management</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('admin.activity_logs.index')) active @endif"
                                href="{{ route('admin.activity_logs.index') }}">
                                <i class="fas fa-history"></i>
                                <span class="nav-link-text">Activity Logs</span>
                            </a>
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
                            <a class="nav-link @if (Route::is('profile.index')) active @endif"
                                href="{{ route('profile.index') }}">
                                <i class="ni ni-single-02"></i>
                                <span class="nav-link-text">Profile</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link @if (Route::is('admin.settings.index')) active @endif"
                                href="{{ route('admin.settings.index') }}">
                                <i class="fas fa-cog"></i>
                                <span class="nav-link-text">Settings</span>
                            </a>
                        </li> --}}
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
                    Date Today - {{ formatDate(now(), 'dateTime') }}
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
                            {{-- </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ni ni-bell-55"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                                <!-- Dropdown header -->
                                <div class="px-3 py-3">
                                    <h6 class="text-sm text-muted m-0">You have <strong class=""">13</strong>
                                        notifications.</h6>
                                </div>
                                <!-- List group -->
                                <div class="list-group
                                            list-group-flush">
                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img src="{{ handleNullAvatar(auth()->user()->avatar_profile) }}"
                                                    class="avatar rounded-circle" alt="Image placeholder">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>2 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <!-- View all -->
                                <a href="javascript:void(0)"
                                    class="dropdown-item text-center font-weight-bold py-3">View all</a>
                            </div>
                        </li> --}}

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

    @include('layouts.admin.scripts')
    <script src="{{ asset('assets/js/admin/script.js') }}"></script>
    @yield('script')
    @routes

</body>

</html>
