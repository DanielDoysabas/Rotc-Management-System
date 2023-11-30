@extends('layouts.admin.app')

@section('title', 'Admin | Create Patient')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="font-weight-normal text-primary">
                            <a class="text-primary float-left" href="{{ route('admin.patients.index') }}">
                                <i class='fas fa-arrow-left'></i>
                            </a>
                            <span class="ml-3"> Create Patient <i class="fas fa-user ml-1"></i></span>
                        </h2>
                        <div class="row">
                            <div class="col-md-8">
                                <br>
                                @include('layouts.includes.alert')
                                <form class="row" action="{{ route('admin.patients.store') }}" method="post"
                                    id="patient_form">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="form-label">First Name *</label>
                                            <input type="text" class="form-control" name="first_name" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Middle Name </label>
                                            <input type="text" class="form-control" name="middle_name" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Last Name *</label>
                                            <input type="text" class="form-control" name="last_name" required>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="form-label">Gender *</label>
                                            <select class="form-control" name="gender" required>
                                                <option value=""></option>
                                                <option value="male">
                                                    Male</option>
                                                <option value="female">
                                                    Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary"
                                                onclick="promptStore(event, '#patient_form')">Save</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                        <div class="form-group mb-2">
                                            <label class="form-label">Email *</label>
                                            <input type="email" class="form-control" name="email" required>
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
        $("#patient_nav").addClass("active");
    </script>
@endsection
