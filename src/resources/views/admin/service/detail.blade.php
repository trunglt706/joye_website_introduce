@php
    use App\Models\Service;
    $status = Service::get_status($data->status);
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
                    <a href="{{ route('admin.service.index') }}">Danh sách dịch vụ</a>
                </li>
                <li class="breadcrumb-item active">Dịch vụ #{{ $data->code }}</li>
            </ol>
        </nav>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td class="bg-body-secondary w-175px text-nowrap">- Tên dịch vụ</td>
                    <td colspan="3">{{ $data->name }}</td>
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
                            Thông tin dịch vụ
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.service.update') }}" method="POST" class="form-update">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="mb-2 form-group">
                                <label class="form-label">Tên dịch vụ *</label>
                                <input type="text" required class="form-control" placeholder="Nhập tên dịch vụ"
                                    name="name" value="{{ $data->name }}">
                            </div>
                            <div class="mb-2 form-group">
                                <label class="form-label">Mô tả</label>
                                <textarea name="content" rows="3" class="form-control">{{ $data->content }}</textarea>
                            </div>
                            <div class="form-check form-switch mb-4">
                                <input class="form-check-input" type="checkbox" role="switch" name="status" value="active"
                                    id="flexSwitchCheckStatus" {{ $data->status == 'active' ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexSwitchCheckStatus">
                                    Kích hoạt dịch vụ
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
