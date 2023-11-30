@extends('layouts.platoon_leader.app')

@section('title', 'Platoon Leader | Student Performance Record')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        @include('layouts.includes.alert')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <select class="form-control form-control-sm" onchange="filterStudentByCourse(this)">
                            <option value="0">--- All Courses---
                            </option>
                            @foreach ($courses as $id => $course)
                                <option value="{{ $id }}">{{ $course }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
                <div class="card">
                    <div class="card-body">
                        <a class="float-right btn btn-sm btn-primary me-3"
                            href="{{ route('platoon_leader.performances.create') }}">Add
                            Record +</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-hover performance_dt">
                                <caption>Student Performance Records <i class="fas fa-clipboard-list ml-1"></i> </caption>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Student</th>
                                        <th>Course</th>
                                        <th>Type</th>
                                        <th>Points (+/-)</th>
                                        <th>Remark</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display Student Performance Logs --}}
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
