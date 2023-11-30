<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
    <link href="{{ asset('assets/css/core/argon.css') }}" rel="stylesheet">
</head>

<body>
    <div class='container'>
        <div class='row justify-content-center py-5'>
            <div class='col-md-12'>
                <figure class="w-100">
                    <img class='img-fluid d-block mx-auto ' src='{{ asset('img/errors/404.svg') }}' width='550'>
                    <figcaption>
                        <p class='text-center font-weight-bold text-dark'>Oops! Page Not Found!</p>
                </figure>
                <center>
                    <a class="btn btn-primary" href="/login">Go Back</a>
                </center>
            </div>
        </div>
    </div>
</body>

</html>
