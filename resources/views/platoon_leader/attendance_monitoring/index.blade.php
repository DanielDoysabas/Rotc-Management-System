@extends('layouts.platoon_leader.app')

@section('title', 'Platoon Leader | Attendance Monitoring')

@section('content')

    {{-- CONTAINER --}}
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-body d-flex and flex-column" id="display_camera">
                        <img class="img-fluid d-block mx-auto" src="{{ asset('img/monitoring/no-camera.png') }}">
                    </div>
                    <div class="card-footer border-0">
                        <center>
                            <button class="btn btn-dark" onclick="startCamera()" id="start_camera"> Start Webcam
                                <i class="fas fa-camera ml-1"></i></button>
                            <button class="btn btn-danger" onclick="stopCamera()" id="stop_camera" style="display:none">
                                Stop</button>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-body d-flex and flex-column" id="display_student">

                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-flush table-hover attendance_dt">
                                <caption>Daily Attendance Logs <i class="fas fa-history ml-1"></i></caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Activity</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display Attendance Logs --}}
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

    <script type="text/javascript">
        let scanner;

        function startCamera() {

            let video = `<video class="w-100" id="preview"></video>`
            $('#display_camera').html(video)
            $('#start_camera').css('display', 'none');
            $('#stop_camera').css('display', 'block');

            /* initiate Scanner */
            scanner = new Instascan.Scanner({
                video: document.getElementById('preview'),
                mirror: false,
            });

            /*Get Camera */
            Instascan.Camera.getCameras()
                .then(function(cameras) {
                    if (cameras.length > 0) {
                        scanner.start(cameras[0]);
                    } else {
                        console.error('No cameras found.');
                    }
                }).catch(function(e) {
                    console.error(e);
                });

            /* Handle QR Code Scanning */
            scanner.addListener('scan', async function(content) {

                try {
                    const res = await axios.post(route('platoon_leader.attendance-monitoring.store', {
                        code: content,
                    }));

                    const student = res.data.student

                    let output = `
                       <center>
                            ${handleNullAvatar(student.avatar, '', 150)} <br> <br>
                            <p>ID No.: ${student.student_id}</p>
                            <p>Student: ${student.full_name}</p>
                            <p>Course: ${student.course}</p>
                            <p>Department: ${student.department}</p>
                            <p>Platoon: ${student.platoon}</p>
                            <p>Contact: ${student.contact}</p>
                        </center>
                    `
                    $('#display_student').html(output)
                    $('.attendance_dt').DataTable().draw(); // update dt
                    success(res.data.success);
                } catch (e) {
                    const responses = e.response.data.errors;
                    if (responses) {
                        const errors = Object.values(responses);
                        errors.forEach((e) => {
                            toastDanger(e);
                        });
                    } else {
                        error(e.response.data.message);
                    }
                    $('#display_student').html(``)
                }

            });
        }

        // Stop Camera
        function stopCamera() {
            scanner.stop()
                .then(res => {
                    log(res);

                    $('#display_camera').html(
                        `<img class="img-fluid d-block mx-auto" src="/img/monitoring/no-camera.png">`)
                    $('#start_camera').css('display', 'block');
                    $('#stop_camera').css('display', 'none');
                })
                .catch(e => log(e))
        }
    </script>
@endsection
