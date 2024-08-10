<!-- CoreUI and necessary plugins-->
<script src="{{ asset('vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
<script src="{{ asset('vendors/simplebar/js/simplebar.min.js') }}"></script>
<script>
    const header = document.querySelector('header.header');

    document.addEventListener('scroll', () => {
        if (header) {
            header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
    });
</script>
<!-- Plugins and scripts required by this view-->
<script src="{{ asset('vendors/chart.js/js/chart.umd.js') }}"></script>
<script src="{{ asset('vendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>
<script src="{{ asset('vendors/@coreui/utils/js/index.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/flatpickr.min.js') }}"></script>
<script>
    var urlLogout = "{{ route('admin.logout') }}";

    let page = 1;
    const Toast = Swal.mixin({
        toast: true,
        position: "bottom-end",
        showConfirmButton: false,
        timer: 3000,
    });

    @if (session('success'))
        Toast.fire({
            icon: 'success',
            title: "{{ session('success') }}"
        });
    @endif

    @if (session('error'))
        Toast.fire({
            icon: 'error',
            title: "{{ session('error') }}"
        });
    @endif

    @if ($errors->any())
        Toast.fire({
            icon: 'error',
            title: "{{ $errors->first() }}"
        });
    @endif
</script>
<script src="{{ asset('js/custom.js') }}"></script>
