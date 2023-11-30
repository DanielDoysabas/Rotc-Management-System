@extends('layouts.admin.app')

@section('title', 'Manage Profile')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center align-items-center">
            <form action="{{ route('admin.settings.update', $settings->id) }}" method="POST"
                class="col-md-5 mx-auto bg-white p-5 rounded" id="settings_form">
                @csrf @method('PUT')

                @include('layouts.includes.alert')

                <div class="form-group mb-3 ">
                    <label class="form-label">Select Color Theme</label>
                    <input type="color" class="form-control" name="color_theme" value="{{ $settings->color_theme ?? '' }}"
                        readonly>
                </div>

                {{-- <input type="file" name="avatar" id="logo"> --}}

                <button type="button" class="btn btn-primary form-control"
                    onclick="event.preventDefault();confirm('Do you want to update?', '', 'update').then(res => res.isConfirmed ? $('#settings_form').submit() : false)">Save
                </button>
            </form>
        </div>
    </div>
    {{-- End CONTAINER --}}
@endsection
{{-- @section('script')
    <script>
        initiateFilePond('#logo')
    </script>
@endsection --}}
