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
