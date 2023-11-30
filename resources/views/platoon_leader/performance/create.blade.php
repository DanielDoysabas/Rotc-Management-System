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
                            <a class="text-primary float-left" href="{{ route('platoon_leader.performances.index') }}">
                                <i class='fas fa-arrow-left'></i>
                            </a>
                            <span class="ml-3"> Add Student Performance Record <i class="fas fa-user ml-1"></i></span>
                        </h2>
                        <div class="row">
                            <div class="col-md-8">
                                <br>
                                @include('layouts.includes.alert')
                                <form action="{{ route('platoon_leader.performances.store') }}" method="post"
                                    id="performance_form">
                                    @csrf


                                    <div class="form-group">
                                        <label class="form-label">Select Student *</label>
                                        <select class="form-control" name="student_id" required>
                                            <option value=""></option>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}">{{ $student->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Type *</label>
                                        <select class="form-control" name="type" required>
                                            <option value=""></option>
                                            <option value="merit">
                                                Merit
                                            </option>
                                            <option value="demerit">
                                                Demerit
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Points (+/-) *</label>
                                        <input type="number" min="0" class="form-control" name="points" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Remark </label>
                                        <input type="text" class="form-control" name="remark"
                                            placeholder="Add Remark (Eg. Indicate the behavior of the student)" required>
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

@endsection
