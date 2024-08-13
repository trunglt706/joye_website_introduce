<!DOCTYPE html>
<html>

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ADMIN | {{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ get_option('seo-favico') }}">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.style')
    @stack('css')
</head>

<body>
    @include('admin.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100">
        @include('admin.header')
        <div class="body flex-grow-1">
            @yield('content')
        </div>
        @include('admin.footer')
    </div>
    @include('admin.script')
    @stack('js')
</body>

</html>
