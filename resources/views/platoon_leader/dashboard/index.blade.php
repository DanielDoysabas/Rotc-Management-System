@extends('layouts.platoon_leader.app')

@section('content')
    <!-- Header -->
    <div class="header pb-6">
        {{-- <div class="container-fluid">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Inactive User</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $total_inactive_user }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Product</h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                            <i class="fas fa-clipboard-list"></i>
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Order</h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                            <i class="fas fa-shopping-cart"></i>
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
        </div> --}}
    </div>

    <!-- Page Content -->
    <div class="container-fluid mt--6">

        {{-- Row 1 --}}
        {{-- <div class="row">
            <div class="col-12 col-md-4 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-header bg-primary">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Total Products By Category</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex and flex-column">
                        <!-- Chart -->
                        <div>
                            <canvas id="chart_products_by_category"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-header bg-primary">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Monthly Sales</h6>
                            </div>
                            <div class="col">
                                <form action="{{ route('admin.dashboard.index') }}" method="get">
                                    <div class="form-group mb-0">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <select class="form-control form-control-sm" name="month">
                                                <option value="">-- Select Month --</option>
                                                <option value="01" @if (request('month') == 1) selected @endif>
                                                    January
                                                </option>
                                                <option value="02" @if (request('month') == 2) selected @endif>
                                                    February
                                                </option>
                                                <option value="03" @if (request('month') == 3) selected @endif>
                                                    March
                                                </option>
                                                <option value="04" @if (request('month') == 4) selected @endif>
                                                    April
                                                </option>
                                                <option value="05" @if (request('month') == 5) selected @endif>May
                                                </option>
                                                <option value="06" @if (request('month') == 6) selected @endif>
                                                    June
                                                </option>
                                                <option value="07" @if (request('month') == 7) selected @endif>
                                                    July
                                                </option>
                                                <option value="08" @if (request('month') == 8) selected @endif>
                                                    August
                                                </option>
                                                <option value="09" @if (request('month') == 9) selected @endif>
                                                    September
                                                </option>
                                                <option value="10" @if (request('month') == 10) selected @endif>
                                                    October
                                                </option>
                                                <option value="11" @if (request('month') == 11) selected @endif>
                                                    November
                                                </option>
                                                <option value="12" @if (request('month') == 12) selected @endif>
                                                    December
                                                </option>
                                            </select>
                                            <div class="input-group-prepend">
                                                <button class="btn btn-sm btn-warning">Filter</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex and flex-column">
                        <!-- Chart -->
                        <div>
                            <canvas id="monthly_sales"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- Row 2 --}}
        {{-- <div class="row">
            <div class="col-12 col-md-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-header bg-primary">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Monthly Customer</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex and flex-column">
                        <!-- Chart -->
                        <div>
                            <canvas id="monthly_customers"></canvas>
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
                                            <td>{{ $user->name }}</td>
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
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- Row 3 --}}
        {{-- <div class="row">
            <div class="col-12 col-md-9 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-header bg-primary">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Recent Orders</h6>
                            </div>
                            <div class="col text-right">
                                <a class="btn btn-sm btn-warning" href="#">View all</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex and flex-column">
                        <div class="table-responsive">
                            <table class="table align-items-center table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Transaction No</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3">Record Not Found</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>

                    <div class="d-flex mx-auto">
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
                                <a href="{{ route('admin.activity_logs.index') }}" class="btn btn-sm btn-warning">View</a>
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
                                        {{ $exploaded[1] }} </span> </p>
                                <p class='pl-2 text-small'> {{ $al->created_at->diffForHumans() }} </p>
                            </div>
                            <br>
                        @empty
                            <img class="img-fluid" src="{{ asset('img/nodata.svg') }}" alt="nodata">
                        @endforelse
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- End Page Content -->
@endsection

@section('script')
    <script>
        // const bgc = [
        //     '#8b2518',
        //     '#f1c40f',
        //     '#95a5a6',
        //     '#2c3e50',
        //     '#ecf0f1',
        // ];

        $('#dashboard_nav').addClass('active')
    </script>
@endsection
