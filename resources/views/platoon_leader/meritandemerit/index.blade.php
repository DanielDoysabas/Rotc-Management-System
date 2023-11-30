@extends('layouts.platoon_leader.app')

@section('title', 'Student | Attendance Records')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- <div>
                    <form>
                        <div class="input-group input-group-outline ">
                            <input class="form-control" type="text" name="date_started_at" id="date_started_at"
                                placeholder="Date Started" onfocus="(this.type = 'date')">
                            <input class="form-control" type="text" name="date_ended_at" id="date_ended_at"
                                placeholder="Date Ended" onfocus="(this.type = 'date')">
                            <button type="button" class="btn btn-primary" onclick="filterAttendance()">Filter</button>
                        </div>
                    </form>
                </div><br> -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover attendance_dt">
                                <caption>Merit and Demerit Points <i class="fas fa-clipboard-list ml-1"></i> </caption>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Students</th>
                                        <th>Merit</th>
                                        <th>Demerits</th>
                                        <th>Total Points</th>
                                        <th>Percentage</th>
                                        <th>Semester</th>
                                        <th>Year</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Acosta Dave D</td>
                                        <td>100</td>
                                        <td>10</td>
                                        <td>90</td>
                                        <td>30</td>
                                        <td>1st Semester</td>
                                        <td>2023</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Acosta Dave D</td>
                                        <td>100</td>
                                        <td>10</td>
                                        <td>90</td>
                                        <td>30</td>
                                        <td>1st Semester</td>
                                        <td>2023</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Acosta Dave D</td>
                                        <td>100</td>
                                        <td>10</td>
                                        <td>90</td>
                                        <td>30</td>
                                        <td>1st Semester</td>
                                        <td>2023</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Acosta Dave D</td>
                                        <td>100</td>
                                        <td>10</td>
                                        <td>90</td>
                                        <td>30</td>
                                        <td>1st Semester</td>
                                        <td>2023</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Acosta Dave D</td>
                                        <td>100</td>
                                        <td>10</td>
                                        <td>90</td>
                                        <td>30</td>
                                        <td>1st Semester</td>
                                        <td>2023</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Acosta Dave D</td>
                                        <td>100</td>
                                        <td>10</td>
                                        <td>90</td>
                                        <td>30</td>
                                        <td>1st Semester</td>
                                        <td>2023</td>
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
                route("student.attendances.index", {
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
