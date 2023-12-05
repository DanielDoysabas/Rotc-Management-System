@extends('layouts.platoon_leader.app')

@section('title', 'Platoon Leader | Create Student Performance Record')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="font-weight-normal text-primary">
                            <a class="text-primary float-left" href="{{ route('platoon_leader.attendance-records.index') }}">
                                <i class='fas fa-arrow-left'></i>
                            </a>
                            <span class="ml-3"> Add Student Attendance Records <i class="fas fa-user ml-1"></i></span>
                        </h2>
                        <div class="row">
                            <div class="col-md-8">
                                <br>
                                @include('layouts.includes.alert')
                                <form action="{{ route('platoon_leader.attendance-records.store') }}" method="post"
                                    id="performance_form">
                                    @csrf

                                    <div class="form-group">
                                        <label class="form-label">Student ID</label>
                                        <input id="student_id" type="text" class="form-control" name="student_id" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Student Name</label>
                                        <input id="student_name" type="text" class="form-control" name="student_name" required disabled>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Attendance</label>
                                        <div class="container">
                                            <div class="row justify-content-between">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="1st">
                                                    <label class="form-check-label" for="checkbox_1">
                                                        1st
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="2nd">
                                                    <label class="form-check-label" for="checkbox_2">
                                                        2nd
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="3rd">
                                                    <label class="form-check-label" for="checkbox_3">
                                                        3rd
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="4th">
                                                    <label class="form-check-label" for="4">
                                                        4th
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="5th">
                                                    <label class="form-check-label" for="5">
                                                        5th
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="6th">
                                                    <label class="form-check-label" for="6">
                                                        6th
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="7th">
                                                    <label class="form-check-label" for="7">
                                                        7th
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="8th">
                                                    <label class="form-check-label" for="8">
                                                        8th
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="9th">
                                                    <label class="form-check-label" for="9">
                                                        9th
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="10th">
                                                    <label class="form-check-label" for="10">
                                                        10th
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="11th">
                                                    <label class="form-check-label" for="11">
                                                        11th
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="12th">
                                                    <label class="form-check-label" for="12">
                                                        12th
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="13th">
                                                    <label class="form-check-label" for="13">
                                                        13th
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="14th">
                                                    <label class="form-check-label" for="14">
                                                        14th
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="15th">
                                                    <label class="form-check-label" for="15">
                                                        15th
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Total Points*</label>
                                        <input type="number" min="0" class="form-control" id="total_points" name="total_points" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Average*</label>
                                        <input type="number" min="0" class="form-control" id="average" name="average" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Percentage*</label>
                                        <input type="number" min="0" class="form-control" id="percentage" name="percentage" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary"
                                            onclick="promptStore(event, '#performance_form')">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <img class="img-fluid" src="{{ asset('img/crud/default.svg') }}" alt="manage">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- End CONTAINER --}}
<script type="text/javascript">
      
        var input = document.getElementById("student_id");
        input.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
            console.log(input.value);
            console.log("check");
            event.preventDefault();
            let a = input.value.toString();
            console.log(a);
            let APP_URL = {!! json_encode(url('/platoon_leader/attendance-records/')) !!}
            let URL = APP_URL+"/"+a;
            $.get(URL, function (data) {
                let fullname = data[0].first_name +" "+ data[0].middle_name +" "+data[0].last_name; 
                $("#student_name").val(fullname);
            });
        }
        });
  
</script>
@endsection
