@extends('layouts.admin.app')

@section('title', 'Admin | Manage Platoon')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="float-right btn btn-sm btn-primary me-3" href="javascript:void(0)"
                            onclick="toggle_modal('#m_platoon', '.platoon_form', ['#m_platoon_title','Add Platoon'], ['.btn_add_platoon','.btn_update_platoon'])">Create
                            Platoon +</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-flush table-hover platoon_dt">
                                <caption>List of Platoon</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Platoon</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display Platoons --}}
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
