<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="{{ config('app.name') }}" />
<meta name="author" content="{{ config('app.name') }}">
<meta name="keywords" content="{{ config('app.name') }}">
<meta name="robots" content="index, follow" />
<meta property="og:title" content="{{ config('app.name') }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="/" />
<meta property="og:image" content="{{ asset('img/sitecover/sitecover.png') }}" />
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="og:image:alt" />
<meta property="og:description" content="{{ config('app.name') }}" />
<meta property="og:site_name" content="{{ config('app.name') }}" />
<meta property="og:locale" content="en_US" />
<meta property="article:author" content="{{ config('app.name') }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Fonts -->
<link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap"
    rel="stylesheet">

<link href="{{ asset('assets/css/utils/nucleo/nucleo.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/utils/nucleo/nucleo-icons.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/utils/nucleo/nucleo-svg.css') }}" rel="stylesheet" />

<!--Fav Icon-->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}">

{{-- FA --}}
<link rel="stylesheet" href="{{ asset('assets/css/utils/fa/css/all.min.css') }}" />

<!-- CSS Files -->
<link href="{{ asset('assets/css/core/argon.css') }}?v=1.2.0" rel="stylesheet" />
<link href="{{ asset('assets/css/shared/styles.css') }}" rel="stylesheet">
