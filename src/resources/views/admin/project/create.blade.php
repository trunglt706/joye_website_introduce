<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.project.create') }}" id="form-create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tạo mới dự án</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-1">
                    <div class="mb-2 form-group">
                        <label class="form-label">Tên dự án *</label>
                        <input type="text" required class="form-control" placeholder="Nhập tên" name="name">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="mb-2 form-group">
                                <label class="form-label">Liên kết</label>
                                <input type="text" class="form-control" placeholder="https://" name="link">
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
                        <textarea name="description" rows="2" class="form-control" placeholder="Nhập mô tả"></textarea>
                    </div>
                    <div class="d-flex justify-content-between my-2">
                        <div class="form-check form-switch my-2">
                            <input class="form-check-input" type="checkbox" role="switch" name="project" value="1"
                                id="flexSwitchCheckproject" checked>
                            <label class="form-check-label" for="flexSwitchCheckproject">
                                Là dự án
                            </label>
                        </div>
                        <div class="form-check form-switch my-2">
                            <input class="form-check-input" type="checkbox" role="switch" name="customer"
                                value="1" id="flexSwitchCheckcustomer" checked>
                            <label class="form-check-label" for="flexSwitchCheckcustomer">
                                Là khách hàng
                            </label>
                        </div>
                    </div>
                    <div class="form-check form-switch my-2">
                        <input class="form-check-input" type="checkbox" role="switch" name="status" value="active"
                            id="flexSwitchCheckStatus" checked>
                        <label class="form-check-label" for="flexSwitchCheckStatus">
                            Kích hoạt trạng thái
                        </label>
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
