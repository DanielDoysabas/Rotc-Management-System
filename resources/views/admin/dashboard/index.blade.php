@extends('layouts.admin.app')

@section('content')
    <!-- Header -->
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row py-3">
                    <div class="col-xl-3 col-md-6 d-flex align-self-stretch">
                        <div class="card card-stats w-100">
                            <!-- Card body -->
                            <div class="card-body d-flex and flex-column">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Active User</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $total_active_user }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 d-flex align-self-stretch">
                        <div class="card card-stats w-100">
                            <!-- Card body -->
                            <div class="card-body d-flex and flex-column">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Inactive User</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $total_inactive_user }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 d-flex align-self-stretch">
                        <div class="card card-stats w-100">
                            <!-- Card body -->
                            <div class="card-body d-flex and flex-column">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Platoon</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $total_platoon }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 d-flex align-self-stretch">
                        <div class="card card-stats w-100">
                            <!-- Card body -->
                            <div class="card-body d-flex and flex-column">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Course</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $total_course }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                            <i class="fas fa-graduation-cap"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container-fluid mt--6">

        {{-- Row 1 --}}
        <div class="row">
            <div class="col-12 col-md-12 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-header bg-primary">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-white text-uppercase ls-1 mb-1">Total Student By Platoon</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex and flex-column">
                        <!-- Chart -->
                        <div>
                            <canvas id="chart_total_student_by_platoon"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-header bg-primary">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-white text-uppercase ls-1 mb-1">Total Student By Department</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex and flex-column">
                        <!-- Chart -->
                        <div>
                            <canvas id="chart_total_student_by_department"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Row 2 --}}
        <div class="row">
            <div class="col-12 col-md-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-header bg-primary">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Monthly User</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex and flex-column">
                        <!-- Chart -->
                        <div>
                            <canvas id="chart_monthly_user"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-header bg-primary">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Recent User</h6>
                            </div>
                            <div class="col text-right">
                                <a class="btn btn-sm btn-warning" href="{{ route('admin.users.index') }}">View all</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex and flex-column">
                        <div class="table-responsive">
                            <table class="table align-items-center table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Registered At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>
                                                <img class="avatar avatar-sm rounded-circle"
                                                    src="{{ handleNullAvatar($user->avatar_profile) }}" alt="avatar">
                                            </td>
                                            <td>{{ $user->student->full_name }}</td>
                                            <td><span class="badge badge-primary">{{ $user->role->name }}</span></td>
                                            <td>{{ formatDate($user->created_at) }}</td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>

                    <div class="d-flex mx-auto">
                        {{-- {{ $users->links() }} --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Row 3 --}}
        <div class="row">
            <div class="col-12 col-md-9 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-header bg-primary">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Recent Attendance</h6>
                            </div>
                            <div class="col text-right">
                                <a class="btn btn-sm btn-warning" href="{{ route('admin.attendances.index') }}">View
                                    all</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex and flex-column">
                        <div class="table-responsive">
                            <table class="table align-items-center table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Student</th>
                                        <th>Date Time-In</th>
                                        <th>Date Time-Out</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($attendances as $attendance)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $attendance->student->student_id }}</td>
                                            <td>{{ $attendance->student->full_name }}</td>
                                            <td>{{ formatDate($attendance->date_time_in, 'dateTime') }}</td>
                                            <td>{{ formatDate($attendance->date_time_out, 'dateTime') }}</td>
                                            <td>{{ is_null($attendance->date_time_in) && is_null($attendance->date_time_out) ? 'Absent' : 'Present' }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">Records Not Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>

                    <div class="d-flex mx-auto">
                        {{-- {{ $orders->links() }} --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-header border-0 bg-primary">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-white text-uppercase ls-1 mb-1">Activity Logs</h6>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('admin.activity_logs.index') }}"
                                    class="btn btn-sm btn-warning">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex and flex-column">
                        @forelse ($activities as $al)
                            @php
                                $exploaded = explode('-', $al->description);
                            @endphp
                            <div class='border-left border-primary'>
                                <p class="m-0 pl-2 text-small">{{ $exploaded[0] }} - <span class='txt-lightblue'>
                                        {{ $exploaded[1] ?? '' }} </span> </p>
                                <p class='pl-2 text-small'> {{ $al->created_at->diffForHumans() }} </p>
                            </div>
                            <br>
                        @empty
                            <img class="img-fluid" src="{{ asset('img/nodata.svg') }}" alt="nodata">
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Content -->
@endsection

@section('script')
    <script>
        const bgc = [
            '#16B97A',
            '#f1c40f',
            '#95a5a6',
            '#2c3e50',
            '#ecf0f1',
        ];

        const platoons = @json($chart_total_student_by_platoon[0]);
        const CHART_A_total_student = @json($chart_total_student_by_platoon[1]);

        const chart_total_student_by_platoon = document.getElementById('chart_total_student_by_platoon');
        const CHART_A = new Chart(chart_total_student_by_platoon, {
            type: 'bar', // bar , horizontal, line ,doughnut ,radar , polarArea
            data: {
                labels: platoons,
                datasets: [{
                    label: 'Total Students',
                    data: CHART_A_total_student,
                    backgroundColor: bgc
                }],

            },
            options: {
                title: {
                    display: true,
                    text: 'Total Students'
                }
            }
        });


        const courses = @json($chart_total_student_by_department[0]);
        const CHART_B_total_student = @json($chart_total_student_by_department[1]);

        const chart_total_student_by_department = document.getElementById('chart_total_student_by_department');
        const CHART_B = new Chart(chart_total_student_by_department, {
            type: 'bar', // bar , horizontal, line ,doughnut ,radar , polarArea
            data: {
                labels: courses,
                datasets: [{
                    label: 'Total Student',
                    data: CHART_B_total_student,
                    backgroundColor: bgc
                }],

            },
            options: {
                title: {
                    display: true,
                    text: 'Total Student'
                }
            }
        });

        const months = @json($chart_monthly_user[0]);
        const total_user = @json($chart_monthly_user[1]);

        const chart_monthly_user = document.getElementById('chart_monthly_user');
        const CHART_D = new Chart(chart_monthly_user, {
            type: 'bar', // bar , horizontal, line ,doughnut ,radar , polarArea
            data: {
                labels: months,
                datasets: [{
                    label: 'Total Monthly User',
                    data: total_user,
                    backgroundColor: bgc
                }],

            },
            options: {
                title: {
                    display: true,
                    text: 'Total Monthly User'
                }
            }
        });



        $('#dashboard_nav').addClass('active')
    </script>
@endsection
