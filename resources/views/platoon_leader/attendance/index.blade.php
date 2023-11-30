@extends('layouts.platoon_leader.app')

@section('title', 'Platoon Leader | Attendance Records')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div>
                    <form>
                        <div class="input-group input-group-outline ">
                            <select class="form-control" name="course" id="course">
                                <option value="">All Course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                            <input class="form-control" type="text" name="date_started_at" id="date_started_at"
                                placeholder="Date Started" onfocus="(this.type = 'date')">
                            <input class="form-control" type="text" name="date_ended_at" id="date_ended_at"
                                placeholder="Date Ended" onfocus="(this.type = 'date')">
                            <button type="button" class="btn btn-primary" onclick="filterAttendance()">Filter</button>
                        </div>
                    </form>
                </div><br>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover attendance_dt">
                                <caption>Attendance Records <i class="fas fa-clipboard-list ml-1"></i> </caption>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Student</th>
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
            </div>
        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection

@section('script')
    <script>
        async function filterAttendance() {
            const date_started_at = $('#date_started_at').val();
            const date_ended_at = $('#date_ended_at').val();
            const course = $('#course').val();
            const columns = [{
                    data: "id",
                    render(data, type, row) {
                        return row.DT_RowIndex;
                    },
                },
                {
                    data: 'student_id'
                },
                {
                    data: "student"
                },
                {
                    data: 'schedule'
                },
                {
                    data: "date_time_in",
                    render(data) {
                        log(data)
                        return data ?? "";
                    },
                },
                {
                    data: "date_time_out",
                    render(data) {
                        return data ?? "";
                    },
                },

                {
                    data: 'status'
                },
            ];
            c_index(
                $(".attendance_dt"),
                route("platoon_leader.attendances.index", {
                    date_started_at,
                    date_ended_at,
                    course
                }),
                columns,
                null,
                true
            );
        }
    </script>
@endsection
