<!DOCTYPE html>
<html lang="vi">

<head>
    @include('guest.meta')
    @include('guest.style')
    @if (in_array(Route::currentRouteName(), ['blog.detail', 'service.detail']))
        <script type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=65dd20dcd41ded001ab5b52f&product=inline-share-buttons&source=platform"
            async="async"></script>
    @endif
</head>

<body>
    @include('guest.header')
    @yield('content')
    @include('guest.footer')
    @include('guest.general.alert-status')
    @include('guest.general.modal-contact')
    @include('guest.general.icon-call')
    @include('guest.script')
</body>

</html>
