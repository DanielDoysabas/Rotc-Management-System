@extends('layouts.platoon_leader.app')

@section('title', 'Platoon Leader | Students Grades')

@section('content')

    {{-- CONTAINER --}}
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-flush table-hover student_dt">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Attendance</th>
                                        <th>Aptitude</th>
                                        <th>ACAD</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
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

      let stid = 0;
      let acad = 0;
      let attendance = 0;
      let aptitude = 0;

      const list_columns = [
                {
                    data: "id",
                    render(data) {
                        return data;
                    },
                },
                {
                    data: "student_id",
                    render(data) {
                        stid = data;
                        return data;
                    },
                },
                {
                    data: "student",
                    render(data) {
                        return data;
                    },
                },
                {
                    data: "percentage_record",
                    render(data) {
                        attendance = data;
                        return "<p id='attendance-"+stid+"'>"+data+"</p>";
                    },
                },
                {
                    data: "percentage",
                    render(data) {
                        aptitude = data;
                        return "<p id='aptitude-"+stid+"'>"+data+"</p>";
                    },
                },
                {
                    data: "acad",
                    render(data) {
                        acad = data;
                        return '<input id="acad-'+stid+'" value="'+data+'" type="number">';
                    },
                },
                {
                    data: "grade",
                    render(data) {
                        let a = parseInt(attendance) + parseInt(aptitude) + parseInt(acad);
                        if(a !== a) {
                            a = 0;
                        }
                        return a;
                    },
                },
                {
                    data: "student_id",
                    render(data) {
                        return "<button class='btn btn-sm btn-primary' onclick=update_records("+data+")>UPDATE </button>";
                    },
                },
        ];

      var table = $('.student_dt').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{URL::to("platoon_leader/studentgrade/show")}}",
            columns: list_columns
        });

        
        function update_records(record_id) {
            let get_attendance = $("#attendance-"+record_id).text();    
            let get_aptitude = $("#aptitude-"+record_id).text();    
            let get_acad = $("#acad-"+record_id).val();   

            var formData_dem = {
                student_id: record_id,
                attendance: get_attendance,
                aptitude: get_aptitude,
                acad: get_acad,
            };

            c_index(
                $(".student_dt"),
                route('platoon_leader.studentgrade.create',formData_dem),
                list_columns,
                null,
                true
            );

            $("#atn_record_alert").delay(1000).fadeIn();
            $("#atn_record_alert").delay(3000).fadeOut();
        }
</script>
@endsection
