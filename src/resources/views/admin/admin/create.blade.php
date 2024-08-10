<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.admin.create') }}" id="form-create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tạo mới tài khoản</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-1">
                    <div class="row">
                        <div class="mb-2 col-md-6">
                            <label class="form-label">Họ tên *</label>
                            <input type="text" required class="form-control" placeholder="Nhập tên" name="name"
                                value="">
                        </div>
                        <div class="mb-2 col-md-6">
                            <label class="form-label">Email *</label>
                            <input type="email" required class="form-control" placeholder="Nhập email" name="email"
                                value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-6">
                            <label class="form-label">Số ĐT</label>
                            <input type="text" class="form-control" placeholder="Nhập số ĐT" name="phone"
                                value="">
                        </div>
                        <div class="mb-2 col-md-6">
                            <label class="form-label">Mật khẩu *</label>
                            <input type="password" required class="form-control" placeholder="Nhập mật khẩu"
                                name="password">
                        </div>
                    </div>
                    <div class="mb-2 div-role">
                        <label class="form-label">Quyền tài khoản *</label>
                        <select class="form-select" name="role_id">
                            <option value="">-- Chọn --</option>
                            @foreach ($data['roles'] as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        @if (auth('admin')->user()->admin)
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" role="switch" name="admin"
                                    value="1" id="flexSwitchCheckAdmin">
                                <label class="form-check-label" for="flexSwitchCheckAdmin">
                                    Có toàn quyền
                                </label>
                            </div>
                        @endif
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" role="switch" name="status" value="active"
                                id="flexSwitchCheckStatus" checked>
                            <label class="form-check-label" for="flexSwitchCheckStatus">
                                Kích hoạt tài khoản
                            </label>
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