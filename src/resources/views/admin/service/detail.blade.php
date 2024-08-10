@php
    use App\Models\Admin;
    $status = Admin::get_status($data['admin']->status);
@endphp
@extends('admin.index')
@section('content')
    <div class="container-lx px-4 mb-3">
        <nav aria-label="breadcrumb" class="hide-mobile">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.admin.index') }}">Tài khoản quản trị</a>
                </li>
                <li class="breadcrumb-item active">Tài khoản #{{ $data['admin']->code }}</li>
            </ol>
        </nav>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td class="bg-body-secondary w-175px text-nowrap">- Mã tài khoản</td>
                    <td>{{ $data['admin']->code }}</td>
                    <td class="bg-body-secondary w-175px text-nowrap">- Tên tài khoản</td>
                    <td>{{ $data['admin']->name }}</td>
                </tr>
                <tr>
                    <td class="bg-body-secondary text-nowrap">- Email</td>
                    <td>
                        @if ($data['admin']->email)
                            <div class="text-nowrap">
                                <span class="show-data">{{ $data['admin']->email }}</span>
                                <span role="button" data-table="admins" data-column="email"
                                    data-id="{{ $data['admin']->id }}" class="h-20px w-20px show-secret-data"
                                    data-coreui-toggle="tooltip" title="Sao chép dữ liệu">
                                    <i class="fas fa-clone"></i>
                                </span>
                            </div>
                        @endif
                    </td>
                    <td class="bg-body-secondary text-nowrap">- Điện thoại</td>
                    <td>
                        @if ($data['admin']->phone)
                            <div class="text-nowrap">
                                <span class="show-data">{{ $data['admin']->phone }}</span>
                                <span role="button" data-table="admins" data-column="phone"
                                    data-id="{{ $data['admin']->id }}" class="h-20px w-20px show-secret-data"
                                    data-coreui-toggle="tooltip" title="Sao chép dữ liệu">
                                    <i class="fas fa-clone"></i>
                                </span>
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="bg-body-secondary text-nowrap">- Quyền</td>
                    <td>
                        @if ($data['admin']->admin)
                            (Có toàn quyền)
                        @else
                            {{ $data['admin']->role ? $data['admin']->role->name : '-' }}
                        @endif
                    </td>
                    <td class="bg-body-secondary text-nowrap">- Đăng nhập lần cuối</td>
                    <td>
                        <div class="text-nowrap">
                            {{ $data['admin']->last_login ? date('H:i d/m/Y', $data['admin']->last_login) : '(Chưa đăng nhập)' }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="bg-body-secondary text-nowrap">- Trạng thái</td>
                    <td>
                        <span class="badge bg-{{ $status[1] }}">
                            {{ $status[0] }}
                        </span>
                    </td>
                    <td class="bg-body-secondary text-nowrap">- Ngày tạo</td>
                    <td>
                        <div class="text-nowrap">
                            {{ $data['admin']->created_at ? date('H:i d/m/Y', $data['admin']->created_at) : '-' }}</div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            <svg class="nav-icon icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                            </svg>
                            Thông tin cá nhân
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.admin.update') }}" method="POST" class="form-update">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data['admin']->id }}">
                            <div class="mb-2 form-group">
                                <label class="form-label">Họ tên *</label>
                                <input type="text" required class="form-control" placeholder="Nhập họ tên" name="name"
                                    value="{{ $data['admin']->name }}">
                            </div>
                            <div class="mb-2 div-role {{ $data['admin']->admin ? 'd-none' : '' }}">
                                <label class="form-label">Quyền tài khoản *</label>
                                <select class="form-select" name="role_id">
                                    <option value="">-- Chọn --</option>
                                    @foreach ($data['roles'] as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data['admin']->role_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex justify-content-between">
                                @if (auth('admin')->user()->admin)
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" role="switch" name="admin"
                                            value="1" id="flexSwitchCheckAdmin"
                                            {{ $data['admin']->admin ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexSwitchCheckAdmin">
                                            Có toàn quyền
                                        </label>
                                    </div>
                                @endif
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" role="switch" name="status"
                                        value="active" id="flexSwitchCheckStatus"
                                        {{ $data['admin']->status == 'active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckStatus">
                                        Kích hoạt
                                    </label>
                                </div>
                            </div>
                            @if (auth('admin')->user()->can('admin|admin|update'))
                                <div class="pb-4">
                                    {!! NoCaptcha::display() !!}
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <svg class="icon icon-lg">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-save"></use>
                                    </svg>
                                    Cập nhật
                                </button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            <svg class="nav-icon icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                            </svg>
                            Cập nhật mật khẩu
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.admin.update_account') }}" method="POST" class="form-update">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data['admin']->id }}">
                            <div class="row">
                                <div class="mb-2 col-sm-12 col-md-6">
                                    <label class="form-label">Mật khẩu mới *</label>
                                    <input type="password" required class="form-control" placeholder="Nhập mật khẩu"
                                        name="new_password">
                                </div>
                                <div class="mb-2 col-sm-12 col-md-6">
                                    <label class="form-label">Mật khẩu xác nhận *</label>
                                    <input type="password" required class="form-control"
                                        placeholder="Nhập mật khẩu xác nhận" name="confirm_password">
                                </div>
                            </div>
                            @if (auth('admin')->user()->can('admin|admin|update_account'))
                                <div class="pb-4">
                                    {!! NoCaptcha::display() !!}
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <svg class="icon icon-lg">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-save"></use>
                                    </svg>
                                    Cập nhật
                                </button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    {!! NoCaptcha::renderJs() !!}
    <script>
        $(document).on('click', '#flexSwitchCheckAdmin', function() {
            if ($(this).is(":checked")) {
                $('.div-role').addClass('d-none');
            } else {
                $('.div-role').removeClass('d-none');
            }
        })
    </script>
@endpush
