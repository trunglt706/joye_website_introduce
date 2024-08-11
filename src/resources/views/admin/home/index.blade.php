@extends('admin.index')
@section('content')
    <div class="container-lx px-4">
        <div class="row g-4">
            <div class="col-6 col-md-3">
                <a class="text-decoration-none" href="{{ route('admin.admin.index') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-warning text-end">
                                <svg class="icon icon-xxl">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                </svg>
                            </div>
                            <div class="fs-4 fw-semibold">{{ $data['admin'] }}</div>
                            <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">
                                Quản trị viên
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.col-->
            <div class="col-6 col-md-3">
                <a href="{{ route('admin.service.index') }}" class="text-decoration-none">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-success text-end">
                                <svg class="icon icon-xxl">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-3d"></use>
                                </svg>
                            </div>
                            <div class="fs-4 fw-semibold">{{ $data['service'] }}</div>
                            <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">
                                Dịch vụ
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="{{ route('admin.blog.index') }}" class="text-decoration-none">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-info text-end">
                                <svg class="icon icon-xxl">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-book"></use>
                                </svg>
                            </div>
                            <div class="fs-4 fw-semibold">{{ $data['blog'] }}</div>
                            <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">
                                Bài viết
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="{{ route('admin.contact.index') }}" class="text-decoration-none">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-danger text-end">
                                <svg class="icon icon-xxl">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-contact"></use>
                                </svg>
                            </div>
                            <div class="fs-4 fw-semibold">{{ $data['contact'] }}</div>
                            <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">
                                Liên hệ
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- /.row-->
    </div>
@endsection
