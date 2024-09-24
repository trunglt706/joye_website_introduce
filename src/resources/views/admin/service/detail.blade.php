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
        <div class="d-flex">
            <div class="me-2">
                <img src="{{ $data->image ? get_url($data->image) : asset('img/no-image.jpg') }}"
                    class="img-thumbnail preview w-100px" alt="img">
            </div>
            <div class="card w-100">
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2 form-group">
                                    <label class="form-label">Giá cả</label>
                                    <input type="text" class="form-control" placeholder="VD: 2 triệu / phiên"
                                        name="price" value="{{ $data->price }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2 form-group">
                                    <label class="form-label">Ảnh đại diện</label>
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 form-group">
                            <label class="form-label">Mô tả ngắn</label>
                            <textarea name="description" rows="2" class="form-control" placeholder="Nhập mô tả ngắn">{{ $data->description }}</textarea>
                        </div>
                        <div class="mb-2 form-group">
                            <label class="form-label">Nội dung</label>
                            <textarea name="content" rows="3" id="ckeditor" placeholder="Nhập nội dung" class="form-control">{{ $data->content }}</textarea>
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
@endsection
@push('js')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('ckeditor', {
                height: 280,
                toolbar: 'Full',
                filebrowserBrowseUrl: "{{ route('admin.upload_editor') }}",
                filebrowserImageBrowseUrl: "{{ route('admin.upload_editor') . '?type=Images' }}",
                filebrowserUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}",
                filebrowserImageUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
            });

            $(document).on('click', 'button[type="submit"]', function() {
                for (var instanceName in CKEDITOR.instances) {
                    CKEDITOR.instances[instanceName].updateElement();
                }
            })
        })
    </script>
@endpush
