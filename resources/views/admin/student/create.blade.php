@extends('layouts.admin.app')

@section('title', 'Admin | Create Student')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="font-weight-normal text-primary">
                            <a class="text-primary float-left" href="{{ route('admin.students.index') }}">
                                <i class='fas fa-arrow-left'></i>
                            </a>
                            <span class="ml-3"> Create Student <i class="fas fa-user ml-1"></i></span>
                        </h2>
                        <div class="row">
                            <div class="col-md-8">
                                <br>
                                @include('layouts.includes.alert')
                                <form class="row" action="{{ route('admin.students.store') }}" method="post"
                                    id="student_form">
                                    @csrf
                                    <div class="col-md-6">

                                        <div class="form-group mb-2">
                                            <label class="form-label">Course *</label>
                                            <select class="form-control" name="course_id" required>
                                                <option value=""></option>
                                                @foreach ($departments as $department)
                                                    <optgroup label="[ {{ $department->name }} ]"></optgroup>

                                                    @foreach ($department->courses as $course)
                                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label">Platoon *</label>
                                            <select class="form-control" name="platoon_id" required>
                                                <option value=""></option>
                                                @foreach ($platoons as $id => $platoon)
                                                    <option value="{{ $id }}">{{ $platoon }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Student ID *</label>
                                            <input type="text" class="form-control" name="student_id"
                                                placeholder="Ex. LRN" required>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label">First Name *</label>
                                            <input type="text" class="form-control" name="first_name" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Middle Name </label>
                                            <input type="text" class="form-control" name="middle_name" required>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="form-label">Last Name *</label>
                                            <input type="text" class="form-control" name="last_name" required>
                                        </div>

                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary"
                                                onclick="promptStore(event, '#student_form')">Submit</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group mb-2">
                                            <label class="form-label">Sex *</label>
                                            <select class="form-control" name="sex" required>
                                                <option value=""></option>
                                                <option value="male">
                                                    Male</option>
                                                <option value="female">
                                                    Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label">Birth Date *</label>
                                            <input type="date" max="2008-01-01" class="form-control" name="birth_date"
                                                required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Address *</label>
                                            <input type="text" class="form-control" name="address" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Contact *</label>
                                            <input type="number" class="form-control" min="0" name="contact"
                                                required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Email *</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label">Is the student a Platoon Leader? *</label> <br>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="yes" name="is_platoon_leader"
                                                    class="custom-control-input is_platoon_leader" value="1">
                                                <label class="custom-control-label" for="yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="no" name="is_platoon_leader"
                                                    class="custom-control-input is_platoon_leader" value="0">
                                                <label class="custom-control-label" for="no">
                                                    No
                                                </label>
                                            </div>
                                        </div>


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

@endsection
