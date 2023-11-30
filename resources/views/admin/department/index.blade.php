@extends('layouts.admin.app')

@section('title', 'Admin | Manage Department')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="float-right btn btn-sm btn-primary me-3" href="javascript:void(0)"
                            onclick="toggle_modal('#m_department', '.department_form', ['#m_department_title','Add Department'], ['.btn_add_department','.btn_update_department'], {rname:'admin.departments.create', target:['#d_departments'], column:'name'})">Create
                            Department +</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-flush table-hover department_dt">
                                <caption>List of Department</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Department</th>
                                        <th>Abbreviation</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display Departments --}}
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
