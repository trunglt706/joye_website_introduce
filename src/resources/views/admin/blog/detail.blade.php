@php
    use App\Models\Blog;
    $status = Blog::get_status($data['blog']->status);
@endphp
@extends('admin.index')
@section('content')
    <style>
        #cke_2_contents {
            height: 100px !important;
        }
    </style>
    <div class="container-lx px-4 mb-3">
        <nav aria-label="breadcrumb" class="hide-mobile">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.blog.index') }}">Danh sách bài viết</a>
                </li>
                <li class="breadcrumb-item active">Bài viết #{{ $data['blog']->code }}</li>
            </ol>
        </nav>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td class="bg-body-secondary w-175px text-nowrap">- Tiêu đề</td>
                    <td>{{ $data['blog']->name }}</td>
                    <td class="bg-body-secondary text-nowrap">- Nhóm</td>
                    <td>
                        {{ $data['blog']->group ? $data['blog']->group->name : '' }}
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
                            {{ $data['blog']->created_at ? date('H:i d/m/Y', strtotime($data['blog']->created_at)) : '-' }}
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="d-flex">
            <div class="me-2">
                <img src="{{ $data['blog']->image ? get_url($data['blog']->image) : asset('img/no-image.jpg') }}"
                    class="img-thumbnail preview w-100px" alt="img">
                <hr>
                <img src="{{ $data['blog']->background ? get_url($data['blog']->background) : asset('img/no-image.jpg') }}"
                    class="img-thumbnail preview w-100px" alt="img">
            </div>
            <div class="card w-100">
                <div class="card-header">
                    <h5>
                        Thông tin bài viết
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.blog.update') }}" method="POST" class="form-update">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data['blog']->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2 form-group">
                                    <label class="form-label">Tiêu đề *</label>
                                    <input type="text" required class="form-control" placeholder="Nhập tiêu đề"
                                        name="name" value="{{ $data['blog']->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nhóm</label>
                                <select class="form-select" name="group_id">
                                    <option value="" selected>-- Chọn --</option>
                                    @foreach ($data['group'] as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $data['blog']->group_id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2 form-group">
                                    <label class="form-label">Ảnh đại diện</label>
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2 form-group">
                                    <label class="form-label">Ảnh nền</label>
                                    <input type="file" class="form-control" name="background" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 form-group">
                            <label class="form-label">Mô tả ngắn</label>
                            <textarea name="description" rows="2" class="form-control" placeholder="Nhập mô tả ngắn">{{ $data['blog']->description }}</textarea>
                        </div>
                        <div class="mb-2 form-group">
                            <label class="form-label">Mục lục</label>
                            <textarea name="muc_luc" id="muc_luc" rows="3" class="form-control">{{ $data['blog']->muc_luc }}</textarea>
                        </div>
                        <div class="mb-2 form-group">
                            <label class="form-label">Nội dung *</label>
                            <textarea name="content" rows="3" id="ckeditor" class="form-control" placeholder="Nhập nội dung">{{ $data['blog']->content }}</textarea>
                        </div>
                        <div class="form-check form-switch mb-4">
                            <input class="form-check-input" type="checkbox" role="switch" name="status" value="active"
                                id="flexSwitchCheckStatus" {{ $data['blog']->status == 'active' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexSwitchCheckStatus">
                                Kích hoạt bài viết
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

            CKEDITOR.replace('muc_luc', {
                height: 280,
                toolbar: [{
                        name: 'basicstyles',
                        items: ['Bold', 'Strike']
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
