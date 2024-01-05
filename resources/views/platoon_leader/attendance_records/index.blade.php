@extends('layouts.platoon_leader.app')

@section('title', 'Platoon Leader | Attendance Records V2')

@section('content')
<style>
.hide{
    display:none;
}
</style>
    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div id="atn_record_alert" class="alert alert-success hide" role="alert">
                    {{ __('Successfully Added to Attendance Record') }}
                </div>
                <div>
                    <div class="card">
                        <div class="card-header">
                            Add Attendance Record
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
                        List Attendance Record
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover attendance_dt">
                                <thead>
                                    <tr>
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
                        let cleardata = data.split(" ").join("");
                        const ar = cleardata.split("-");
                        console.log(ar);
                        if (ar[1]==0 || ar[1]=="") {
                            return "<input id='"+ar[0]+"-day_one'  type='checkbox' value=''>";
                        }else{
                            return "<input id='"+ar[0]+"-day_one' checked type='checkbox' value=''>";
                        }
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        let cleardata = data.split(" ").join("");
                        const ar = cleardata.split("-");
                        if (ar[2]==0 || ar[2]=="") {
                            return "<input id='"+ar[0]+"-day_two' type='checkbox' value=''>";
                        }else{
                            return "<input id='"+ar[0]+"-day_two' checked type='checkbox' value=''>";
                        }
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        let cleardata = data.split(" ").join("");
                        const ar = cleardata.split("-");
                        if (ar[3]==0 || ar[3]=="") {
                            return "<input id='"+ar[0]+"-day_three' type='checkbox' value=''>";
                        }else{
                            return "<input id='"+ar[0]+"-day_three' checked type='checkbox' value=''>";
                        }
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        let cleardata = data.split(" ").join("");
                        const ar = cleardata.split("-");
                        if (ar[4]==0 || ar[4]=="") {
                            return "<input id='"+ar[0]+"-day_four' type='checkbox' value=''>";
                        }else{
                            return "<input id='"+ar[0]+"-day_four' checked type='checkbox' value=''>";
                        }
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        let cleardata = data.split(" ").join("");
                        const ar = cleardata.split("-");
                        if (ar[5]==0 || ar[5]=="") {
                            return "<input id='"+ar[0]+"-day_five' type='checkbox' value=''>";
                        }else{
                            return "<input id='"+ar[0]+"-day_five' checked type='checkbox' value=''>";
                        }
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        let cleardata = data.split(" ").join("");
                        const ar = cleardata.split("-");
                        if (ar[6]==0 || ar[6]=="") {
                            return "<input id='"+ar[0]+"-day_six' type='checkbox' value=''>";
                        }else{
                            return "<input id='"+ar[0]+"-day_six' checked type='checkbox' value=''>";
                        }
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        let cleardata = data.split(" ").join("");
                        const ar = cleardata.split("-");
                        if (ar[7]==0 || ar[7]=="") {
                            return "<input id='"+ar[0]+"-day_seven' type='checkbox' value=''>";
                        }else{
                            return "<input id='"+ar[0]+"-day_seven' type='checkbox' value='' checked>";
                        }
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        let cleardata = data.split(" ").join("");
                        const ar = cleardata.split("-");
                        if (ar[8]==0 || ar[8]=="") {
                            return "<input id='"+ar[0]+"-day_eight' type='checkbox' value=''>";
                        }else{
                            return "<input id='"+ar[0]+"-day_eight' type='checkbox' value='' checked>";
                        }
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        let cleardata = data.split(" ").join("");
                        const ar = cleardata.split("-");
                        if (ar[9]==0 || ar[9]=="") {
                            return "<input id='"+ar[0]+"-day_nine' type='checkbox' value=''>";
                        }else{
                            return "<input id='"+ar[0]+"-day_nine' type='checkbox' value='' checked>";
                        }
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        let cleardata = data.split(" ").join("");
                        const ar = cleardata.split("-");
                        if (ar[10]==0 || ar[10]=="") {
                            return "<input id='"+ar[0]+"-day_ten' type='checkbox' value=''>";
                        }else{
                            return "<input id='"+ar[0]+"-day_ten' type='checkbox' value='' checked>";
                        }
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        let cleardata = data.split(" ").join("");
                        const ar = cleardata.split("-");
                        if (ar[11]==0 || ar[11]=="") {
                            return "<input id='"+ar[0]+"-day_eleven' type='checkbox' value=''>";
                        }else{
                            return "<input id='"+ar[0]+"-day_eleven' type='checkbox' value='' checked>";
                        }
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        let cleardata = data.split(" ").join("");
                        const ar = cleardata.split("-");
                        if (ar[12]==0 || ar[12]=="") {
                            return "<input id='"+ar[0]+"-day_twelve' type='checkbox' value=''>";
                        }else{
                            return "<input id='"+ar[0]+"-day_twelve' type='checkbox' value='' checked>";
                        }
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        let cleardata = data.split(" ").join("");
                        const ar = cleardata.split("-");
                        if (ar[13]==0 || ar[13]=="") {
                            return "<input id='"+ar[0]+"-day_thirtheen' type='checkbox' value=''>";
                        }else{
                            return "<input id='"+ar[0]+"-day_thirtheen' type='checkbox' value='' checked>";
                        }
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        let cleardata = data.split(" ").join("");
                        const ar = cleardata.split("-");
                        if (ar[14]==0 || ar[14]=="") {
                            return "<input id='"+ar[0]+"-day_fourtheen' type='checkbox' value=''>";
                        }else{
                            return "<input id='"+ar[0]+"-day_fourtheen' type='checkbox' value='' checked>";
                        }
                    },
                },
                {
                    data: "full_day",
                    render(data) {
                        let cleardata = data.split(" ").join("");
                        const ar = cleardata.split("-");
                        if (ar[15]==0 || ar[15]=="") {
                            return "<input id='"+ar[0]+"-day_fiftheen' type='checkbox' value=''>";
                        }else{
                            return "<input id='"+ar[0]+"-day_fiftheen' type='checkbox' value='' checked>";
                        }
                    },
                },
                {
                    data: "total_points",
                    render(data) {
                        return data;
                    },
                },
                {
                    data: "average",
                    render(data) {
                        return data;
                    },
                },
                {
                    data: "percentage_record",
                    render(data) {
                        if (data=="" || data==null) {
                            return "0%";
                        }else{
                            return data+"%";
                        }
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

        $('.attendance_dt').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('platoon_leader.show') }}",
            columns: list_columns,
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
        // console.log(obj);
    }

    function submit_record() {
        var formData = {
            data: obj
        };
        console.log(formData);
        var type = "GET";
        var ajaxurl = '/platoon_leader/attendance-records/create';

        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            success: function (data) {
                if (data=="true") {
                    $("#atn_record_alert").delay(1000).fadeIn();
                    $("#atn_record_alert").delay(3000).fadeOut();
                }else{
                    console.log(data);
                }
            },
            error: function (data) {
                console.log(data);
            }
        });

        c_index(
            $(".attendance_dt"),
            route("platoon_leader.show"),
            list_columns,
            null,
            true
        );
    }

    function update_records(record_id) {
        let list_days = ["day_one","day_two",
        "day_three","day_four","day_five","day_six",
        "day_seven","day_eight","day_nine","day_ten",
        "day_eleven","day_twelve","day_thirtheen","day_fourtheen",
        "day_fiftheen",
        ];
        
        let list_to_update_days =[{}];

        list_days.forEach(element => {
            // console.log(element);    
            $get_data = $("#"+record_id+"-"+element).is(':checked');    
            if ($get_data) {
                    list_to_update_days.push(
                    {
                        element : true
                    }
                    );
                }else{
                    list_to_update_days.push(
                    {
                        element: false
                    }
                    );
            }
        });

        var formData = {
            student_id: record_id,
            data: list_to_update_days
        };


        var type = "GET";
        var ajaxurls = '/platoon_leader/update_records';

        c_index(
            $(".attendance_dt"),
            route("platoon_leader.update_records", formData),
            list_columns,
            null,
            true
        );

    }
    </script>
 
@endsection
