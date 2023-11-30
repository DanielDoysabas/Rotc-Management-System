@extends('layouts.admin.app')

@section('title', 'Admin | Manage Student')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        @include('layouts.includes.alert')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <select class="form-control form-control-sm" onchange="filterStudentByPlatoon(this)">
                            <option value="0">--- All Platoon---
                            </option>
                            @foreach ($platoons as $id => $platoon)
                                <option value="{{ $id }}">{{ $platoon }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
                <div class="card">
                    <div class="card-body">
                        <a class="float-right btn btn-sm btn-primary me-3"
                            href="{{ route('admin.students.create') }}">Create
                            Student +</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-flush table-hover student_dt">
                                <caption>List of Student</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Sex</th>
                                        <th>Course</th>
                                        <th>Platoon</th>
                                        <th>Registered At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display students --}}
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
