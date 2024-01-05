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
                                        <th>Grade</th>
                                        <th>Equivalent</th>
                                        <th>Remarks</th>
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
                    data: "grade",
                    render(data) {
                        return "<p id='grade-"+stid+"'>"+data+"</p>";
                    },
                },
                {
                    data: "grade",
                    render(data) {
                        let a = 5.0;
                        if(data>=98){
                            a = 1.0;
                        }
                        else if(data>=95 && data<=97){
                            a = 1.25;
                        }
                        else if(data>=92 && data<=94){
                            a = 1.5;
                        }
                        else if(data>=89 && data<=91){
                            a = 1.75;
                        }
                        else if(data>=86 && data<=88){
                            a = 2.0;
                        }
                        else if(data>=83 && data<=85){
                            a = 2.25;
                        }
                        else if(data>=80 && data<=82){
                            a = 2.5;
                        }
                        else if(data>=77 && data<=79){
                            a = 2.75;
                        }
                        else if(data>=75 && data<=76){
                            a = 3;
                        }
                        else if(data<=74){
                            a = 5;
                        }
                        return "<p id='eq-"+stid+"'>"+a+"</p>";
                    },
                },
                {
                    data: "remarks",
                    render(data) {
                        let a = "";
                        if(data=="0"){
                            a += '<option value="0" selected>PASSED</option>';
                            a += '<option value="1">FAILED</option>';
                            a += '<option value="2">INCOMPLETE</option>';
                            a += '<option value="3">DROPPED</option>';
                        }
                        else if(data=="1"){
                            a += '<option value="0">PASSED</option>';
                            a += '<option value="1" selected>FAILED</option>';
                            a += '<option value="2">INCOMPLETE</option>';
                            a += '<option value="3">DROPPED</option>';
                        }
                        else if(data=="3"){
                            a += '<option value="0">PASSED</option>';
                            a += '<option value="1" >FAILED</option>';
                            a += '<option value="2" >INCOMPLETE</option>';
                            a += '<option value="3" selected>DROPPED</option>';
                        }
                        else{
                            a += '<option value="0">PASSED</option>';
                            a += '<option value="1" >FAILED</option>';
                            a += '<option value="2" selected>INCOMPLETE</option>';
                            a += '<option value="3" >DROPPED</option>';
                        }
                        return '<select id=remarks-'+stid+' class="form-control">'+a+'</select>';
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
            let get_grade = $("#grade-"+record_id).text();    
            let get_remarks = $("#remarks-"+record_id).val();    
            if (get_remarks==0) {
                if (get_grade>=75) {
                    var formData_dem = {
                        student_id: record_id,
                        grade: get_grade,
                        remarks: get_remarks,
                    };
                }else{
                    alert("Student Grade are to low");
                }
            }else{
                var formData_dem = {
                    student_id: record_id,
                    grade: get_grade,
                    remarks: get_remarks,
                };
            }

            // c_index(
            //     $(".student_dt"),
            //     route('platoon_leader.studentgrade.create',formData_dem),
            //     list_columns,
            //     null,
            //     true
            // );

        }
</script>
@endsection
