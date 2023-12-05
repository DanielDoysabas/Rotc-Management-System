@extends('layouts.platoon_leader.app')

@section('title', 'Platoon Leader | Students Grades')

@section('content')

    {{-- CONTAINER --}}
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-flush table-hover attendance_dt">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>Grade</th>
                                        <th>Equivalent</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
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
@section('script')
<script>
</script>
@endsection
