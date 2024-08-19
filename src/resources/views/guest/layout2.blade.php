<!DOCTYPE html>
<html lang="vi">
<head>
	@include("guest.meta")
	@include("guest.style")
</head>
<body>
	@include("guest.header2")
	@yield('content')
	@include("guest.footer2")
	@include("guest.general.alert-status")
	@include("guest.general.modal-contact")
	@include("guest.general.icon-call")
	@include("guest.script")
</body>
</html>
