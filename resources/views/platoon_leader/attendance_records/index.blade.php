@extends('layouts.platoon_leader.app')

@section('title', 'Platoon Leader | Attendance Records V2')

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
                            <button type="button" class="btn btn-primary" onclick="filterAttendance()">Filter</button>
                        </div>
                    </form>
                </div><br>

                <div>

                </div>
                <div class="card">
                    <div class="card-body">
                    <a class="float-right btn btn-sm btn-primary me-3"
                            href="{{ route('platoon_leader.attendance-records.create') }}">Add
                            Record +</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-hover attendance_dt">
                                <caption>Attendance Records <i class="fas fa-clipboard-list ml-1"></i> </caption>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Student</th>
                                        <th>1st</th>
                                        <th>2nd</th>
                                        <th>3rd</th>
                                        <th>4th</th>
                                        <th>5th</th>
                                        <th>6th</th>
                                        <th>7th</th>
                                        <th>8th</th>
                                        <th>9th</th>
                                        <th>10th</th>
                                        <th>11th</th>
                                        <th>12th</th>
                                        <th>13th</th>
                                        <th>14th</th>
                                        <th>15th</th>
                                        <th>Total Points</th>
                                        <th>Average</th>
                                        <th>Percentage (30%)</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- {{-- Display Attendance Logs --}} -->
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
