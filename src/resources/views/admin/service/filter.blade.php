<form action="" method="get" class="mb-2" id="form-filter">
    @csrf
    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <div class="w-250px">
                <input name="search" class="form-control" placeholder="Tìm kiếm ...">
            </div>
            <div class="hide-mobile">{!! generate_limit_select() !!}</div>
        </div>
        <div class="d-flex justify-content-end">
            <div class="me-1 w-200px hide-mobile">
                <select class="form-select form-filter" name="group_id">
                    <option value="" selected>-- Nhóm --</option>
                    @foreach ($data['group'] as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="me-1 w-200px hide-mobile">
                <select class="form-select form-filter" name="status">
                    <option value="">-- Trạng thái --</option>
                    @foreach ($data['status'] as $key => $item)
                        <option value="{{ $key }}">{{ $item[0] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="btn-group">
                <button class="btn btn-outline-primary hide-mobile" type="submit">
                    <svg class="icon icon-lg">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-reload"></use>
                    </svg>
                    Tải lại
                </button>
                <button class="btn btn-primary" type="button" data-coreui-toggle="modal"
                    data-coreui-target="#addModal">
                    <svg class="icon icon-lg">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                    </svg>
                    Tạo mới
                </button>
            </div>
        </div>
    </div>
</form>
