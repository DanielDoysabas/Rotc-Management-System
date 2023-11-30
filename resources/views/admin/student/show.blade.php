@extends('layouts.admin.app')

@section('title', "Admin | $student->full_name")

@section('styles')
    <style>
        /* Style for the mobile phone frame */
        .mobile-phone {
            width: 300px;
            height: 600px;
            background-color: #333;
            border: 10px solid #000;
            border-radius: 20px;
            position: relative;
        }

        /* Style for the screen inside the mobile phone */
        .screen {
            background-color: #fff;
            width: 100%;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Style for the QR code image */
        .qr-code {
            max-width: 80%;
            height: auto;
        }

        /* Style for the iPhone-like button */
        .iphone-button {
            width: 50px;
            height: 50px;
            background-color: #333;
            border-radius: 50%;
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Style for the heading */
        h2 {
            text-align: center;
            color: #333;
        }
    </style>
@endsection

@section('content')

    {{-- CONTAINER --}}
    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.students.index') }}">All Student
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $student->full_name }}</li>
            </ol>
        </nav>
        {{-- Nav --}}
        <div class="nav-wrapper pt-0">
            <ul class="nav nav-pills nav-fill flex-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                        href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
                            class="fas fa-graduation-cap mr-2"></i>Basic Info</a>
                </li>
                @if ($student->user->hasRole('student'))
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                            href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                            aria-selected="false"><i class="fas fa-clipboard-list mr-2"></i>Attendance Record</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                            href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                            aria-selected="false"><i class="fas fa-chart-line mr-2"></i>Student Perfomance</a>
                    </li>
                @endif
            </ul>
        </div>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                aria-labelledby="tabs-icons-text-1-tab">

                <div class="row">
                    <div class="col-md-6 d-flex align-self-stretch">
                        <div class="card w-100">
                            <div class="card-body text-capitalize d-flex and flex-column">
                                <img class="img-fluid rounded-circle"
                                    src="{{ handleNullAvatar($student->user->avatar_profile) }}" width="120"
                                    alt="avatar">
                                <br>
                                <p>
                                    Student ID: <span>{{ $student->student_id }}</span>
                                </p>
                                <p>
                                    First Name: <span>{{ $student->first_name }}</span>
                                </p>
                                <p>
                                    Middle Name: <span>{{ $student->middle_name }}</span>
                                </p>
                                <p>
                                    Last Name: <span>{{ $student->last_name }}</span>
                                </p>
                                <p>
                                    Sex: <span>{{ $student->sex }}</span>
                                </p>
                                <p>
                                    Birth Date: <span>{{ formatDate($student->birth_date) }}</span>
                                </p>
                                <p>
                                    Address: <span>{{ $student->address }}</span>
                                </p>
                                <p>
                                    Contact: <span>{{ $student->contact }}</span>
                                </p>
                                <p>
                                    Email: <a class="text-lowercase text-primary"
                                        href="mailto:{{ $student->user->email }}">{{ $student->user->email }}</a>
                                </p>
                                <p>
                                    Course: <span>{{ $student->course->name }} </span>
                                </p>
                                <p>
                                    Department: <span>{{ $student->course->department->name }} </span>
                                </p>
                                <p>
                                    Platoon: <span>{{ $student->platoon->name }} </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-self-stretch">
                        <div class="card w-100">
                            <div class="card-body text-capitalize d-flex flex-column ">


                                <center>
                                    <div class="mobile-phone">
                                        <div class="screen">
                                            <center>
                                                <!-- Insert your QR code image here -->
                                                <img class="qr-code"
                                                    src="data:image/png;base64, {{ base64_encode(
                                                        QrCode::eyeColor(0, 45, 206, 137, 0, 0, 0)->format('png')->size(280)->generate($student->student_id),
                                                    ) }} ">
                                                <h2>Generated QR Code</h2>
                                            </center>
                                        </div>

                                        {{-- <div class="iphone-button"></div> --}}
                                    </div>
                                </center>


                                {{-- start mobile phone --}}
                                {{-- <center>
                                    <img class="img-fluid"
                                        src="data:image/png;base64, {{ base64_encode(
                                            QrCode::eyeColor(0, 45, 206, 137, 0, 0, 0)->format('png')->size(280)->generate($student->student_id),
                                        ) }} ">
                                    <h2 class="mt-2">Generated QR Code</h2>
                                </center> --}}
                                {{-- end mobile phone --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-body">
                            <p class="font-weight-normal">Total Present: {{ $student->presents->count() }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-body">
                            <p class="font-weight-normal">Total Absent: {{ $student->absences->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="card card-body text-capitalize">
                    {{-- <div>
                        <form action="{{ route('attendances.export') }}" method="POST">
                            @csrf
                            <div class="input-group input-group-outline ">
                                <input class="form-control" type="text" name="date_started_at" id="date_started_at"
                                    placeholder="Date Started" onfocus="(this.type = 'date')">
                                <input class="form-control" type="text" name="date_ended_at" id="date_ended_at"
                                    placeholder="Date Ended" onfocus="(this.type = 'date')">
                                <input class="form-control" type="hidden" name="student" value="{{ $student->user->id }}">
                                <button type="button" class="btn btn-primary" onclick="filterAttendance()">Filter</button>
                                <button type="submit" class="btn btn-warning">Export</button>
                            </div>
                        </form>
                    </div><br> --}}

                    <div class="table-responsive">
                        <table class="table table-hover attendance_dt">
                            <caption>Attendance Records <i class="fas fa-clipboard-list ml-1"></i> </caption>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Schedule</th>
                                    <th>Date Time-In</th>
                                    <th>Date Time-Out</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Display Attendance Logs --}}
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">


                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-body">
                            <p class="font-weight-normal">Total Merit (+) :
                                {{ $student->merits->sum('points') }} point/s
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-body">
                            <p class="font-weight-normal">Total Demerit (-) :
                                {{ $student->demerits->sum('points') }} point/s
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-body">
                            <p class="font-weight-normal">Total Results:
                                {{ $student->merits->sum('points') - $student->demerits->sum('points') }}
                                point/s
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card card-body text-capitalize">
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <caption>List of Recently Added Performance Record</caption>
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Points(+/-)</th>
                                    <th>Remark</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Display Student Performance Record --}}
                                @forelse ($student->performances as $performance)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td>
                                            {{ $performance->type }}
                                        </td>
                                        <td>
                                            {{ $performance->type == 'merit' ? "+ $performance->points" : "- $performance->points" }}
                                        </td>
                                        <td>
                                            {{ $performance->remark }}
                                        </td>
                                        <td>
                                            {{ formatDate($performance->created_at) }}
                                        </td>
                                        <td>
                                            <a class="text-muted"
                                                href="{{ route('admin.performances.show', $performance) }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>
                                            Records Not Found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    {{-- End CONTAINER --}}
@endsection

@section('script')
    <script>
        const student = @json($student->id);
        $(() => {
            const columns = [{
                    data: "id",
                    render(data, type, row) {
                        return row.DT_RowIndex;
                    },
                },
                {
                    data: "schedule"
                },
                {
                    data: "date_time_in"
                },
                {
                    data: "date_time_out"
                },
                {
                    data: "status"
                },
            ];
            c_index(
                $(".attendance_dt"),
                route("admin.students.show", student),
                columns
            );
        });

        async function filterAttendance() {
            const date_started_at = $("#date_started_at").val();
            const date_ended_at = $("#date_ended_at").val();
            const columns = [{
                    data: "id",
                    render(data, type, row) {
                        return row.DT_RowIndex;
                    },
                },
                {
                    data: "schedule"
                },
                {
                    data: "date_time_in"
                },
                {
                    data: "date_time_out"
                },
                {
                    data: "status"
                },
            ];
            c_index(
                $(".attendance_dt"),
                route("admin.students.show", {
                    student,
                    date_started_at,
                    date_ended_at,
                }),
                columns,
                null,
                true
            );
        }
    </script>
@endsection
