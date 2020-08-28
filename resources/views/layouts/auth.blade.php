<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @section('head-tag')
        @show
    <link rel="icon" type="image/png" href="{{ url('assets/img/favicon-32x32.png') }}" sizes="32x32" />
        <link rel="icon" type="image/png" href="{{ url('assets/img/favicon-16x16.png') }}" sizes="16x16" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/css/bulma.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body class="is-white">

    <!-- Pageloader -->
    <div class="pageloader"></div>
    <div class="infraloader is-active"></div>
    <div class="login-wrapper">
        @yield('content')
        
    </div>

    <!-- Concatenated js plugins and jQuery -->
    <script src="assets/js/app.js"></script>
    
    <!-- Core js -->
    <script src="assets/data/tipuedrop_content.js"></script>
    <script src="assets/js/global.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>