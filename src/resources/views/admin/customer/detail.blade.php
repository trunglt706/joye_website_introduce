@php
    use App\Models\Customer;
    $status = Customer::get_status($data->status);
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
                    <a href="{{ route('admin.customer.index') }}">Quản lý khách hàng</a>
                </li>
                <li class="breadcrumb-item active">Chi tiết #{{ $data->name }}</li>
            </ol>
        </nav>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td class="bg-body-secondary w-175px text-nowrap">- Tên khách hàng</td>
                    <td>{{ $data->name }}</td>
                    <td class="bg-body-secondary w-175px text-nowrap">- Hình ảnh</td>
                    <td>
                        <img src="{{ $data->image ?? asset('img/user.png') }}" alt="" class="h-30px">
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
                            {{ $data->created_at ? date('H:i d/m/Y', strtotime($data->created_at)) : '-' }}</div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            Thông tin khách hàng
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.customer.update') }}" method="POST" class="form-update">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2 form-group">
                                        <label class="form-label">Tên khách hàng *</label>
                                        <input type="text" required class="form-control" placeholder="Nhập tên"
                                            name="name" value="{{ $data->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2 form-group">
                                        <label class="form-label">Chức vụ</label>
                                        <input type="text" value="{{ $data->description }}" class="form-control"
                                            placeholder="Nhập chức vụ" name="description">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="mb-2 form-group">
                                        <label class="form-label">Đánh giá sao</label>
                                        <select class="form-select form-filter" name="start">
                                            <option value="">-- Chọn --</option>
                                            @for ($i = 1; $i < 6; $i++)
                                                <option value="{{ $i }}"
                                                    {{ $i == $data->start ? 'selected' : '' }}>{{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Hình ảnh</label>
                                        <input type="file" class="form-control" name="image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 form-group">
                                <label class="form-label">Nội dung bình luận</label>
                                <textarea name="comment" rows="2" class="form-control" placeholder="Nhập nội dung">{{ $data->comment }}</textarea>
                            </div>
                            <div class="form-check form-switch mb-4">
                                <input class="form-check-input" type="checkbox" role="switch" name="status" value="active"
                                    id="flexSwitchCheckStatus" {{ $data->status == 'active' ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexSwitchCheckStatus">
                                    Kích hoạt trạng thái
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <svg class="icon icon-lg">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-save"></use>
                                </svg>
                                Cập nhật
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection