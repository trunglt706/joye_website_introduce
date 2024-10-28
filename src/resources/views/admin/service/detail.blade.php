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
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-coreui-toggle="tab"
                                    data-coreui-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">
                                    Nội dung cơ bản
                                </button>
                                <button class="nav-link" id="nav-profile-tab" data-coreui-toggle="tab"
                                    data-coreui-target="#nav-profile" type="button" role="tab"
                                    aria-controls="nav-profile" aria-selected="false">
                                    Nội dung mô tả
                                </button>
                                <button class="nav-link" id="nav-contact-tab" data-coreui-toggle="tab"
                                    data-coreui-target="#nav-contact" type="button" role="tab"
                                    aria-controls="nav-contact" aria-selected="false">
                                    Nội dung khác
                                </button>
                            </div>
                        </nav>
                        <div class="tab-content pt-2" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab" tabindex="0">
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class="mb-2 form-group">
                                    <label class="form-label">Tên dịch vụ *</label>
                                    <input type="text" required class="form-control" placeholder="Nhập tên dịch vụ"
                                        name="name" value="{{ $data->name }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Nhóm</label>
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
                                    <div class="col-md-6">
                                        <div class="mb-2 form-group">
                                            <label class="form-label">Ảnh đại diện</label>
                                            <input type="file" class="form-control" name="image" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check form-switch mb-4">
                                    <input class="form-check-input" type="checkbox" role="switch" name="status"
                                        value="active" id="flexSwitchCheckStatus"
                                        {{ $data->status == 'active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckStatus">
                                        Kích hoạt dịch vụ
                                    </label>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                                tabindex="0">
                                <div class="mb-2 form-group">
                                    <label class="form-label">Mô tả ngắn</label>
                                    <textarea name="description" rows="2" class="form-control" placeholder="Nhập mô tả ngắn">{{ $data->description }}</textarea>
                                </div>
                                <div class="mb-2 form-group">
                                    <label class="form-label">Nội dung chính</label>
                                    <textarea name="content" rows="3" id="ckeditor" placeholder="Nhập nội dung" class="form-control">{{ $data->content }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab" tabindex="0">
                                <div class="mb-2 form-group">
                                    <label class="form-label">Nội dung giá</label>
                                    <textarea name="price" rows="2" id="price" class="form-control">{{ $data->price }}</textarea>
                                </div>
                                <div class="mb-2 form-group">
                                    <label class="form-label">Nội dung đính kèm</label>
                                    <textarea name="dinh_kem" rows="2" id="dinh_kem" class="form-control">{{ $data->dinh_kem }}</textarea>
                                </div>
                                <div class="mb-2 form-group">
                                    <label class="form-label">Nội dung cam kết</label>
                                    <textarea name="cam_ket" rows="2" id="cam_ket" class="form-control">{{ $data->cam_ket }}</textarea>
                                </div>
                            </div>
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
            CKEDITOR.replace('dinh_kem', {
                height: 280,
                toolbar: 'Full',
                filebrowserBrowseUrl: "{{ route('admin.upload_editor') }}",
                filebrowserImageBrowseUrl: "{{ route('admin.upload_editor') . '?type=Images' }}",
                filebrowserUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}",
                filebrowserImageUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
            });
            CKEDITOR.replace('cam_ket', {
                height: 280,
                toolbar: 'Full',
                filebrowserBrowseUrl: "{{ route('admin.upload_editor') }}",
                filebrowserImageBrowseUrl: "{{ route('admin.upload_editor') . '?type=Images' }}",
                filebrowserUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}",
                filebrowserImageUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
            });
            CKEDITOR.replace('price', {
                height: 280,
                toolbar: [{
                        name: 'basicstyles',
                        items: ['Bold', 'Italic', 'Underline', 'Strike']
                    },
                    {
                        name: 'paragraph',
                        items: ['BulletedList']
                    }
                ],
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
