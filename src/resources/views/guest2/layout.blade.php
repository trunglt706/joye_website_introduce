<!DOCTYPE html>
<html lang="vi">

<head>
    @include('guest2.meta')
    @include('guest2.style')
</head>

<body>
    @include('guest2.header')
    @yield('content')
    @include('guest2.footer')
    @include('guest2.general.modal-contact')
    @include('guest2.script')
</body>

</html>
