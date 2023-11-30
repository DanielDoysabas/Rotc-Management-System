@extends('layouts.student.app')

@section('title', 'Student | Student Performance Record')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        @include('layouts.includes.alert')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover performance_dt">
                                <caption>My Performance Records <i class="fas fa-clipboard-list ml-1"></i> </caption>
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
