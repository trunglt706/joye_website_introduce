@extends('admin.index')
@section('content')
    <div class="container-lx px-4">
        <div class="row g-4">
            <div class="col-6 col-md-3">
                <a class="text-decoration-none" href="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-warning text-end">
                                <svg class="icon icon-xxl">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-gift"></use>
                                </svg>
                            </div>
                            <div class="fs-4 fw-semibold">0</div>
                            <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">
                                Vouchers
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.col-->
            @if (auth('admin')->user()->can('admin|distributor|view'))
                <div class="col-6 col-md-3">
                    <a href="{{ route('admin.distributor.index') }}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-success text-end">
                                    <svg class="icon icon-xxl">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                                    </svg>
                                </div>
                                <div class="fs-4 fw-semibold">0</div>
                                <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">
                                    Đại lý
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            <!-- /.col-->
            @if (auth('admin')->user()->can('admin|admin|view'))
                <div class="col-6 col-md-3">
                    <a href="{{ route('admin.admin.index') }}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-info text-end">
                                    <svg class="icon icon-xxl">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                    </svg>
                                </div>
                                <div class="fs-4 fw-semibold">0</div>
                                <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">
                                    Quản trị viên
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            <!-- /.col-->
            @if (auth('admin')->user()->can('admin|brand|view'))
                <div class="col-6 col-md-3">
                    <a href="{{ route('admin.brand.index') }}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-danger text-end">
                                    <svg class="icon icon-xxl">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-factory"></use>
                                    </svg>
                                </div>
                                <div class="fs-4 fw-semibold">0</div>
                                <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">
                                    Nhãn hàng
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        </div>
        <!-- /.row-->
    </div>
@endsection
