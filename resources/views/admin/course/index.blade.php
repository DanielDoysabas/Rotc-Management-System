@extends('layouts.admin.app')

@section('title', 'Admin | Manage Course')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="float-right btn btn-sm btn-primary me-3" href="javascript:void(0)"
                            onclick="toggle_modal('#m_course', '.course_form', ['#m_course_title','Add Course'], ['.btn_add_course','.btn_update_course'], {rname:'admin.courses.create', target:['#d_departments'], column:'name'})">Create
                            Course +</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-flush table-hover course_dt">
                                <caption>List of Course</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Course</th>
                                        <th>Abbreviation</th>
                                        <th>Department</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display Courses --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection
