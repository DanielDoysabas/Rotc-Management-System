@extends('layouts.admin.app')

@section('title', 'Admin | Student Performance Record')



@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.performances.index') }}">All Record
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.students.show', $performance->student) }}">
                        {{ $performance->student->full_name }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Performance Records</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-4">
                <div class="card card-body">
                    <p class="font-weight-normal">Total Merit (+) :
                        {{ $performance->student->merits->sum('points') }} point/s
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body">
                    <p class="font-weight-normal">Total Demerit (-) :
                        {{ $performance->student->demerits->sum('points') }} point/s
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body">
                    <p class="font-weight-normal">Total Results:
                        {{ $performance->student->merits->sum('points') - $performance->student->demerits->sum('points') }}
                        point/s
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-body text-capitalize d-flex and flex-column">

                        <h2>Student Performance Record # {{ $performance->id }} <i class="fas fa-info-circle ml-1"></i></h2>
                        <h3 class='font-weight-normal'>
                            Type: {{ $performance->type }}
                        </h3>
                        <h3 class='font-weight-normal'>
                            Points:
                            {{ $performance->type == 'merit' ? "+ $performance->points" : "- $performance->points" }}
                        </h3>
                        <h3 class='font-weight-normal'>
                            Remark: {{ $performance->remark }}
                        </h3>
                        <h3 class='font-weight-normal'>
                            Date: {{ formatDate($performance->created_at) }}
                        </h3>

                        <hr class="w-100">

                        <img class="img-fluid rounded-circle"
                            src="{{ handleNullAvatar($performance->student->user->avatar_profile) }}" width="50"
                            alt="avatar">
                        <br>
                        <p>
                            Student ID: <span>{{ $performance->student->student_id }}</span>
                        </p>
                        <p>
                            Complete Name:
                            <a href="{{ route('admin.students.show', $performance->student) }}">
                                {{ $performance->student->full_name }}
                            </a>
                        </p>
                        <p>
                            Course: <span>{{ $performance->student->course->name }} </span>
                        </p>
                        <p>
                            Department: <span>{{ $performance->student->course->department->name }} </span>
                        </p>
                        <p>
                            Platoon: <span>{{ $performance->student->platoon->name }} </span>
                        </p>


                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-body text-capitalize d-flex flex-column ">

                        <div class="table-responsive">
                            <table class="table table-flush table-hover">
                                <caption>List of Recently Added Performance Record</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Points(+/-)</th>
                                        <th>Remark</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display Student Performance Record --}}
                                    @forelse ($performances as $other_performance)
                                        <tr>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td>
                                                {{ $other_performance->type }}
                                            </td>
                                            <td>
                                                {{ $other_performance->type == 'merit' ? "+ $other_performance->points" : "- $other_performance->points" }}
                                            </td>
                                            <td>
                                                {{ $other_performance->remark }}
                                            </td>
                                            <td>
                                                {{ formatDate($other_performance->created_at) }}
                                            </td>
                                            <td>
                                                <a class="text-muted"
                                                    href="{{ route('admin.performances.show', $other_performance) }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>
                                                Records Not Found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div>
                                @if ($performances->isNotEmpty())
                                    {{ $performances->links() }}
                                @endif
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>


    </div>
    {{-- End CONTAINER --}}
@endsection
