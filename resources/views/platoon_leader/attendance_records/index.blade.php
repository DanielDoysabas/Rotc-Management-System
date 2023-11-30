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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1010101</td>
                                        <td>Acosta Dave D</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>15</td>
                                        <td>100%</td>
                                        <td>30%</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>1010101</td>
                                        <td>Acosta Dave D</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>15</td>
                                        <td>100%</td>
                                        <td>30%</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>1010101</td>
                                        <td>Acosta Dave D</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>15</td>
                                        <td>100%</td>
                                        <td>30%</td>
                                    </tr>

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
