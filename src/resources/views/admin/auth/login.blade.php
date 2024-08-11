@extends('admin.base')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card-group d-block d-md-flex row">
                    <div class="card col-md-7 p-2 mb-0">
                        <div class="card-body">
                            <form action="{{ route('login_post') }}" method="post">
                                @csrf
                                <h3 class="text-center mb-2 text-uppercase">Đăng nhập</h3>
                                @include('guest.general.error')
                                <div class="input-group my-3">
                                    <span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-closed"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" type="text" required name="email"
                                        placeholder="Nhập email" value="admin@gmail.com">
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" type="password" name="password" required
                                        placeholder="Nhập mật khẩu" value="123456@#">
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-primary px-4 btn-submit" type="button">
                                        Đăng nhập
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).on('click', '.btn-submit', function() {
            $(this).html(
                `<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status"> Loading...</span>`
            );
        })
    </script>
@endpush
