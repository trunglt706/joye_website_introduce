<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.service.create') }}" id="form-create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tạo mới dịch vụ</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-1">
                    <div class="mb-2 form-group">
                        <label class="form-label">Tên dịch vụ *</label>
                        <input type="text" required class="form-control" placeholder="Nhập tên dịch vụ"
                            name="name">
                    </div>
                    <div class="mb-2 form-group">
                        <label class="form-label">Mô tả</label>
                        <textarea name="content" rows="3" class="form-control" placeholder="Nhập nội dung"></textarea>
                    </div>
                    <div class="form-check form-switch my-2">
                        <input class="form-check-input" type="checkbox" role="switch" name="status" value="active"
                            id="flexSwitchCheckStatus" checked>
                        <label class="form-check-label" for="flexSwitchCheckStatus">
                            Kích hoạt dịch vụ
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
