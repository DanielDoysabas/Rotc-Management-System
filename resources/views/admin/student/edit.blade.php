@extends('layouts.admin.app')

@section('title', 'Admin | Edit Student')

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
                            <span class="ml-3"> Edit Student <i class="fas fa-edit ml-1"></i></span>
                        </h2>
                        <div class="row">
                            <div class="col-md-8">
                                <br>
                                @include('layouts.includes.alert')
                                <form class="row" action="{{ route('admin.students.update', $student) }}" method="post"
                                    id="student_form">
                                    @csrf @method('PUT')
                                    <div class="col-md-6">

                                        <div class="form-group mb-2">
                                            <label class="form-label">Course *</label>
                                            <select class="form-control" name="course_id" required>
                                                <option value=""></option>
                                                @foreach ($departments as $department)
                                                    <optgroup label="[ {{ $department->name }} ]"></optgroup>

                                                    @foreach ($department->courses as $course)
                                                        <option value="{{ $course->id }}"
                                                            {{ $student->course_id == $course->id ? 'selected' : '' }}>
                                                            {{ $course->name }}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label">Platoon *</label>
                                            <select class="form-control" name="platoon_id" required>
                                                <option value=""></option>
                                                @foreach ($platoons as $id => $platoon)
                                                    <option value="{{ $id }}"
                                                        {{ $student->platoon_id == $id ? 'selected' : '' }}>
                                                        {{ $platoon }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label">Student ID *</label>
                                            <input type="text" class="form-control" name="student_id"
                                                placeholder="Ex. LRN" value="{{ $student->student_id }}" required>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label">First Name *</label>
                                            <input type="text" class="form-control" name="first_name"
                                                value="{{ $student->first_name }}" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Middle Name *</label>
                                            <input type="text" class="form-control" name="middle_name"
                                                value="{{ $student->middle_name }}" required>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="form-label">Last Name *</label>
                                            <input type="text" class="form-control" name="last_name"
                                                value="{{ $student->last_name }}" required>
                                        </div>

                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary"
                                                onclick="promptUpdate(event, '#student_form')">Save</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="form-label">Sex *</label>
                                            <select class="form-control" name="sex">
                                                <option value=""></option>
                                                <option value="male" @if ($student->sex === 'male') selected @endif>
                                                    Male</option>
                                                <option value="female" @if ($student->sex === 'female') selected @endif>
                                                    Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label">Birth Date *</label>
                                            <input type="date" max="2008-01-01" class="form-control" name="birth_date"
                                                value="{{ formatDate($student->birth_date, 'dateInput') }}" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Address *</label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $student->address }}" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Contact *</label>
                                            <input type="number" class="form-control" min="0" name="contact"
                                                value="{{ $student->contact }}" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Email *</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $student->user->email }}" required>
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

@section('script')
    <script>
        $("#appointment_nav").addClass("active");
        $("#student_nav").addClass("text-primary");
    @endsection
