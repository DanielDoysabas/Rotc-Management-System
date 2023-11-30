@extends('layouts.student.app')

@section('title', 'Manage Profile')

@section('styles')
    <style>
        /* Style for the mobile phone frame */
        .mobile-phone {
            width: 300px;
            height: 600px;
            background-color: #333;
            border: 10px solid #000;
            border-radius: 20px;
            position: relative;
        }

        /* Style for the screen inside the mobile phone */
        .screen {
            background-color: #fff;
            width: 100%;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Style for the QR code image */
        .qr-code {
            max-width: 80%;
            height: auto;
        }

        /* Style for the iPhone-like button */
        .iphone-button {
            width: 50px;
            height: 50px;
            background-color: #333;
            border-radius: 50%;
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Style for the heading */
        h2 {
            text-align: center;
            color: #333;
        }
    </style>
@endsection

@section('content')

    {{-- CONTAINER --}}
    <div class="container mt-0 mt-md-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-body  d-flex flex-column">
                        <form action="{{ route('profile.update', auth()->id()) }}" method="POST" id="profile_form">
                            @csrf @method('PUT')

                            <img src="{{ handleNullAvatar(auth()->user()->avatar_profile) }}"
                                class="custom-avatar d-block mx-auto" width='130' alt="avatar.svg">
                            <br>

                            @include('layouts.includes.alert')

                            <div class="form-group mb-2 ">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->student->full_name }}"
                                    readonly>
                            </div>

                            <div class="form-group mb-2 ">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                            </div>

                            <div class="form-group mb-2 ">
                                <label class="form-label">Current Password</label>
                                <input type="text" class="form-control"" name=" old">
                            </div>

                            <div class="form-group mb-2 ">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control"" name=" password" placeholder="•••••••••"
                                    autocomplete="new-password">
                            </div>

                            <div class="form-group mb-2 ">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control"" name=" password_confirmation"
                                    placeholder="•••••••••" autocomplete="new-password">
                            </div>

                            <input type="file" name="avatar" id="user_image">
                            <button type="button" class="btn btn-primary form-control"
                                onclick="promptUpdate(event, '#profile_form')">Update
                                Profile
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-body text-capitalize d-flex flex-column ">
                        <center>
                            <div class="mobile-phone">
                                <div class="screen">
                                    <center>
                                        <!-- Insert your QR code image here -->
                                        <img class="qr-code"
                                            src="data:image/png;base64, {{ base64_encode(
                                                QrCode::eyeColor(0, 45, 206, 137, 0, 0, 0)->format('png')->size(280)->generate(auth()->user()->student->student_id),
                                            ) }} ">
                                        <br><br>
                                        <h2>My QR Code</h2>
                                    </center>
                                </div>

                                {{-- <div class="iphone-button"></div> --}}
                            </div>
                        </center>


                        {{-- start mobile phone --}}
                        {{-- <center>
                            <img class="img-fluid"
                                src="data:image/png;base64, {{ base64_encode(
                                    QrCode::eyeColor(0, 45, 206, 137, 0, 0, 0)->format('png')->size(280)->generate($student->student_id),
                                ) }} ">
                            <h2 class="mt-2">Generated QR Code</h2>
                        </center> --}}
                        {{-- end mobile phone --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End CONTAINER --}}
@endsection
@section('script')
    <script>
        initiateFilePond('#user_image', ["image/png", "image/jpeg", "image/jpg", "image/webp"],
            'Drag & Drop or <span class="filepond--label-action"> Browse Avatar</span>')
    </script>
@endsection
