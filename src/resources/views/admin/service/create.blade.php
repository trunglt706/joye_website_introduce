<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('admin.service.create') }}" id="form-create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tạo mới dịch vụ</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-1">
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
                            <div class="mb-2 form-group">
                                <label class="form-label">Tên dịch vụ *</label>
                                <input type="text" required class="form-control" placeholder="Nhập tên dịch vụ"
                                    name="name">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Nhóm</label>
                                    <select class="form-select" name="group_id">
                                        <option value="" selected>-- Chọn --</option>
                                        @foreach ($data['group'] as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                            <div class="form-check form-switch my-2">
                                <input class="form-check-input" type="checkbox" role="switch" name="status"
                                    value="active" id="flexSwitchCheckStatus" checked>
                                <label class="form-check-label" for="flexSwitchCheckStatus">
                                    Kích hoạt dịch vụ
                                </label>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                            tabindex="0">
                            <div class="mb-2 form-group">
                                <label class="form-label">Mô tả ngắn</label>
                                <textarea name="description" rows="2" class="form-control" placeholder="Nhập mô tả ngắn"></textarea>
                            </div>
                            <div class="mb-2 form-group">
                                <label class="form-label">Nội dung chính</label>
                                <textarea name="content" rows="3" id="ckeditor" class="form-control" placeholder="Nhập nội dung"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"
                            tabindex="0">
                            <div class="mb-2 form-group">
                                <label class="form-label">Nội dung giá</label>
                                <textarea name="price" rows="2" id="price" class="form-control"></textarea>
                            </div>
                            <div class="mb-2 form-group">
                                <label class="form-label">Nội dung đính kèm</label>
                                <textarea name="dinh_kem" rows="2" id="dinh_kem" class="form-control"></textarea>
                            </div>
                            <div class="mb-2 form-group">
                                <label class="form-label">Nội dung cam kết</label>
                                <textarea name="cam_ket" rows="2" id="cam_ket" class="form-control"></textarea>
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
