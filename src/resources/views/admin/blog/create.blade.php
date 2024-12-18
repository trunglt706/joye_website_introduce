<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('admin.blog.create') }}" id="form-create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tạo mới bài viết</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-1">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-coreui-toggle="tab"
                                data-coreui-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">
                                Thông tin cơ bản
                            </button>
                            <button class="nav-link" id="nav-profile-tab" data-coreui-toggle="tab"
                                data-coreui-target="#nav-profile" type="button" role="tab"
                                aria-controls="nav-profile" aria-selected="false">
                                Nội dung chính
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content pt-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2 form-group">
                                        <label class="form-label">Tiêu đề *</label>
                                        <input type="text" required class="form-control" placeholder="Nhập tên"
                                            name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nhóm</label>
                                    <select class="form-select" name="group_id">
                                        <option value="" selected>-- Chọn --</option>
                                        @foreach ($data['group'] as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                <textarea name="description" rows="2" class="form-control" placeholder="Nhập mô tả ngắn"></textarea>
                            </div>
                            <div class="form-check form-switch my-2">
                                <input class="form-check-input" type="checkbox" role="switch" name="status"
                                    value="active" id="flexSwitchCheckStatus" checked>
                                <label class="form-check-label" for="flexSwitchCheckStatus">
                                    Kích hoạt bài viết
                                </label>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                            tabindex="0">
                            <div class="mb-2 form-group">
                                <label class="form-label">Mục lục</label>
                                <textarea name="muc_luc" id="muc_luc" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="mb-2 form-group">
                                <label class="form-label">Nội dung *</label>
                                <textarea name="content" id="ckeditor" required rows="3" class="form-control" placeholder="Nhập nội dung"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-exist" data-coreui-dismiss="modal">
                        <svg class="icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-left"></use>
                        </svg>
                        Thoát
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <svg class="icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-save"></use>
                        </svg>
                        Tạo mới
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
