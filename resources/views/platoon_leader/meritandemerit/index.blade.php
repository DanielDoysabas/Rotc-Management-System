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
                    data: "merits",
                    render(data) {
                        return data;
                    },
                },
                {
                    data: "demerits",
                    render(data) {
                        return data;
                    },
                },
                {
                    data: "total_points",
                    render(data) {
                        return data;
                    },
                },
                {
                    data: "percentage",
                    render(data) {
                        return data;
                    },
                },
                {
                    data: "semester",
                    render(data) {
                        return data;
                    },
                },
                {
                    data: "year",
                    render(data) {
                        return data;
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
        
        // c_index(
        //     $(".student_dt"),
        //     route("platoon_leader.records", {
        //         course:$('#course').val(),
        //     }),
        //     record_columns,
        //     null,
        //     true
        // );
    }

    // function add_record(checkbox,stud_id) {
    //     if(checkbox.checked == true){
    //         if (obj.hasOwnProperty(stud_id)) {
    //         }else{
    //             obj.push(
    //                 {
    //                     student_id: stud_id
    //                 }
    //             );
    //         }
    //     }else{
    //         obj.pop(
    //             {
    //                 student_id: stud_id
    //             }
    //             );
    //     }
    //     // console.log(obj);
    // }

    // function submit_record() {
    //     var formData = {
    //         data: obj
    //     };

    //     var type = "GET";
    //     var ajaxurl = '/platoon_leader/attendance-records/create';

    //     $.ajax({
    //         type: type,
    //         url: ajaxurl,
    //         data: formData,
    //         dataType: 'json',
    //         success: function (data) {
    //             console.log(data);
    //         },
    //         error: function (data) {
    //             console.log(data);
    //         }
    //     });

    //     c_index(
    //         $(".attendance_dt"),
    //         route("platoon_leader.show"),
    //         list_columns,
    //         null,
    //         true
    //     );
    // }

    // function update_records(record_id) {
    //     let list_days = ["day_one","day_two",
    //     "day_three","day_four","day_five","day_six",
    //     "day_seven","day_eight","day_nine","day_ten",
    //     "day_eleven","day_twelve","day_thirtheen","day_fourtheen",
    //     "day_fiftheen",
    //     ];
        
    //     let list_to_update_days =[{}];

    //     list_days.forEach(element => {
    //         // console.log(element);    
    //         $get_data = $("#"+record_id+"-"+element).is(':checked');    
    //         if ($get_data) {
    //                 list_to_update_days.push(
    //                 {
    //                     element : true
    //                 }
    //                 );
    //             }else{
    //                 list_to_update_days.push(
    //                 {
    //                     element: false
    //                 }
    //                 );
    //         }
    //     });

    //     var formData = {
    //         student_id: record_id,
    //         data: list_to_update_days
    //     };


    //     var type = "GET";
    //     var ajaxurls = '/platoon_leader/update_records';

    //     c_index(
    //         $(".attendance_dt"),
    //         route("platoon_leader.update_records", formData),
    //         list_columns,
    //         null,
    //         true
    //     );

    // }
    </script>
@endsection
