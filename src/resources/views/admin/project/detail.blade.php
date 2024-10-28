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
                    <a href="{{ route('admin.project.index') }}">Dự án</a>
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
                        <img src="{{ $data->image }}" alt="Image" class="h-30px">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2 form-group">
                                        <label class="form-label">Tên dự án *</label>
                                        <input type="text" required class="form-control" placeholder="Nhập tên"
                                            name="name" value="{{ $data->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Dịch vụ</label>
                                    <select class="form-select" name="group_id">
                                        <option value="" selected>-- Chọn --</option>
                                        @foreach ($groups as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $data->group_id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
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
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="mb-2 form-group">
                                        <label class="form-label">Lượt truy cập</label>
                                        <input type="text" class="form-control" name="truy_cap"
                                            value="{{ $data->truy_cap }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Doanh thu</label>
                                        <input type="text" class="form-control" name="doanh_thu"
                                            value="{{ $data->doanh_thu }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 form-group">
                                <label class="form-label">Mô tả</label>
                                <textarea name="description" rows="2" class="form-control" placeholder="Nhập mô tả">{{ $data->description }}</textarea>
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
