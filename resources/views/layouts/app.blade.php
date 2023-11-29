<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>PT Jasamarga Pandaan Tol</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo-jpt.png') }}" rel="icon">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body class="login-dark">
    <main>
        @yield('content')
    </main>
    <script src="{{ asset('assets/js/login/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/login/popper.js') }}"></script>
    <script src="{{ asset('assets/js/login/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/login/main.js') }}"></script>

</body>

</html>