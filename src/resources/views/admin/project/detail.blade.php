@php
    use App\Models\Project;
    $status = Project::get_status($data->status);
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
                    <a href="{{ route('admin.project.index') }}">Quản lý dự án</a>
                </li>
                <li class="breadcrumb-item active">Chi tiết #{{ $data->name }}</li>
            </ol>
        </nav>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td class="bg-body-secondary w-175px text-nowrap">- Tên dự án</td>
                    <td>{{ $data->name }}</td>
                    <td class="bg-body-secondary w-175px text-nowrap">- Hình ảnh</td>
                    <td>
                        <img src="{{ $data->image }}" alt="" class="h-30px">
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
                            Thông tin dự án
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.project.update') }}" method="POST" class="form-update">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="mb-2 form-group">
                                <label class="form-label">Tên dự án *</label>
                                <input type="text" required class="form-control" placeholder="Nhập tên" name="name"
                                    value="{{ $data->name }}">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="mb-2 form-group">
                                        <label class="form-label">Liên kết</label>
                                        <input type="text" value="{{ $data->link }}" class="form-control"
                                            placeholder="https://" name="link">
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
                                <label class="form-label">Mô tả</label>
                                <textarea name="description" rows="2" class="form-control" placeholder="Nhập mô tả">{{ $data->description }}</textarea>
                            </div>
                            <div class="d-flex justify-content-between my-2">
                                <div class="form-check form-switch my-2">
                                    <input class="form-check-input" type="checkbox" role="switch" name="project"
                                        value="1" id="flexSwitchCheckproject" {{ $data->project ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckproject">
                                        Là dự án
                                    </label>
                                </div>
                                <div class="form-check form-switch my-2">
                                    <input class="form-check-input" type="checkbox" role="switch" name="customer"
                                        value="1" id="flexSwitchCheckcustomer" {{ $data->customer ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckcustomer">
                                        Là khách hàng
                                    </label>
                                </div>
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
