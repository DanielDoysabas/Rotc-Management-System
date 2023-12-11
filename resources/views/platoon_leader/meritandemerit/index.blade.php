@extends('layouts.platoon_leader.app')

@section('title', 'Platoon Leader | Merit and Demerit Records V2')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div>
                    <div class="card">
                        <div class="card-header">
                            Add Student to Merits and Demerits Record
                        </div>
                        <div class="card-body">
                            <div class="form">
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="course" id="course" onchange="filterAttendanceRecords()">
                                            <option value="">All Course</option>
                                            <?php foreach ($course as $data => $value) {  ?>
                                                <option value=<?php echo $value->id; ?>><?php echo $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table id="student_dt" class="table table-hover student_dt">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Student ID</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Course</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <button onclick=submit_record() class="float-right btn btn-sm btn-primary me-3" >
                                Add Record +
                        </button>
                        </div>
                    </div>
                </div>
                <br>
                <div>

                </div>
                <div class="card">
                    <div class="card-header">
                        List Merits and Demerits Record
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover attendance_dt">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Students</th>
                                        <th>Merit</th>
                                        <th>Demerits</th>
                                        <th>Total Points</th>
                                        <th>Percentage</th>
                                        <th>Semester</th>
                                        <th>Year</th>
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
        let obj =[{student_id:""}];

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
                    data: "full_day",
                    render(data) {
                        console.log(data);
                        const ar = data.split("-");
                        return '<input class="form-control" type="number" id="merits-'+ar[0]+'" value="'+ar[2]+'">';
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        const ar = data.split("-");
                        return '<input class="form-control" type="number" id="demerits-'+ar[0]+'" value="'+ar[3]+'">';
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        const ar = data.split("-");
                        return '<input class="form-control" type="number" id="totalpoints-'+ar[0]+'" value="'+ar[4]+'">';
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        const ar = data.split("-");
                        return '<input class="form-control" type="number" id="percentage-'+ar[0]+'" value="'+ar[5]+'">';
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        const ar = data.split("-");
                        let a = "";
                        if(ar[1]=="1"){
                            a += '<option value="0" >1st Semester</option>';
                            a += '<option value="1" selected>2nd Semester</option>';
                        }else{
                            a += '<option value="0" selected>1st Semester</option>';
                            a += '<option value="1" >2nd Semester</option>';
                        }
                        return '<select id=semester-'+ar[0]+' class="form-control">'+a+'</select>';
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        const ar = data.split("-");
                        return '<input class="form-control" type="text" id="year-'+ar[0]+'" value="'+ar[6]+'">';
                    },
                },
                {
                    data: "student_id",
                    render(data) {
                        return "<button class='btn btn-sm btn-primary' onclick=update_records("+data+")>UPDATE </button>";
                    },
                },
        ];
        
        $('.attendance_dt').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{URL::to("platoon_leader/merits-demerits/show")}}',
            columns: list_columns,
        });

        var table = $('.student_dt').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('platoon_leader.records') }}",
            columns: [
                {
                data: "student_id",
                render(data) {
                    return "<input type='checkbox' onchange=add_record(this,"+data+")>";
                },
                },
                {
                    data: "student_id",
                    render(data) {
                        return data;
                    },
                },
                {
                    data: "first_name",
                    render(data) {
                        return data;
                    },
                },
                {
                    data: "middle_name",
                    render(data) {
                        return data;
                    },
                },
                {
                    data: "last_name",
                    render(data) {
                        return data;
                    },
                },
                {
                    data: "name",
                    render(data) {
                        return data;
                    },
                },
            ]
        });
       
        
       function filterAttendanceRecords() {
        const record_columns = [
            {
                data: "id",
                render(data) {
                    return "<input type='checkbox'>";
                },
            },
            {
                data: "student_id",
                render(data) {
                    return data;
                },
            },
            {
                data: "first_name",
                render(data) {
                    return data;
                },
            },
            {
                data: "middle_name",
                render(data) {
                    return data;
                },
            },
            {
                data: "last_name",
                render(data) {
                    return data;
                },
            },
            {
                data: "name",
                render(data) {
                    return data;
                },
            },
        ];
        
        c_index(
            $(".student_dt"),
            route("platoon_leader.records", {
                course:$('#course').val(),
            }),
            record_columns,
            null,
            true
        );
    }

    function add_record(checkbox,stud_id) {
        if(checkbox.checked == true){
            if (obj.hasOwnProperty(stud_id)) {
            }else{
                obj.push(
                    {
                        student_id: stud_id
                    }
                );
            }
        }else{
            obj.pop(
                {
                    student_id: stud_id
                }
                );
        }
    }

    function submit_record() {
        
        var formData = {
            data: obj
        };

        var type = "GET";
        var ajaxurl = '/platoon_leader/merits-demerits/create';

        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        });

        c_index(
            $(".attendance_dt"),
            '{{URL::to("platoon_leader/merits-demerits/show")}}',
            list_columns,
            null,
            true
        );
    }

    function update_records(record_id) {
        let get_merits = $("#merits-"+record_id).val();    
        let get_demerits = $("#demerits-"+record_id).val();    
        let get_totalpoints = $("#totalpoints-"+record_id).val();    
        let get_percentage = $("#percentage-"+record_id).val();    
        let get_semester = $("#semester-"+record_id).is(':selected');   
        let get_year = $("#year-"+record_id).val();    

        var formData_dem = {
            student_id: record_id,
            merits: get_merits,
            demerits: get_demerits,
            total_points: get_totalpoints,
            percentage: get_percentage,
            semester: get_semester,
            year: get_year,
        };

        c_index(
            $(".attendance_dt"),
            route('platoon_leader.update_merits',formData_dem),
            list_columns,
            null,
            true
        );
    }
    </script>
@endsection
