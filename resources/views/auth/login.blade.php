@extends('layouts.main.app')

@section('title', 'ROTC Students Performance Record Management and Monitoring System | Login')

@section('content')
    <!-- Page content -->
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-12">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-6 d-none d-md-block my-auto">
                                <img src="{{ asset('img/auth/student.svg') }}" alt="login" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-6 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="{{ route('auth.login') }}" method="POST">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img class="img-fluid rounded-circle mr-3"
                                                src="{{ asset('img/logo/logo.png') }}" width="75" alt="logo">
                                            <span class="h2 fw-bold mb-0 text-dark">{{ config('app.name') }}</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign in to your account
                                        </h5>
                                        @include('layouts.includes.alert')

                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-merge input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                </div>
                                                <input class="form-control" type="email" name="email"
                                                    placeholder="Email" autocomplete="email" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group-merge input-group-alternative">
                                                <div class="input-group-prepend" id="password">
                                                    <span class="input-group-text"><i class="fas fa-eye"></i></span>
                                                </div>
                                                <input class="form-control" type="password" name="password"
                                                    placeholder="Password" autocomplete="new-password" value=""
                                                    id="password_field" required>
                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <a class="text-sm text-primary" href="{{ route('password.request') }}">Forgot
                                                Password?</a>
                                        </div>

                                        <div class="mt-3 mb-4">
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Page content -->
@endsection
@section('script')
    <script>
        const password_field = document.getElementById('password_field');
        document.getElementById('password').addEventListener('click', function() {
            return password_field.getAttribute('type') == "password" ?
                password_field.setAttribute('type', 'text') :
                password_field.setAttribute('type', 'password')
        })

        $('#main_login_nav').addClass('active')
    </script>
@endsection
