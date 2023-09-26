<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/8d4167dd12.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{ asset('logo.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ mix('css/utilities.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <link rel="stylesheet" href="{{ mix('css/queries.css') }}">
    @yield('vue-script')
    <title>causam</title>
</head>
<body id="app">
    @yield('content')
</body>
</html>
