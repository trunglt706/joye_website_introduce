<form action="" method="get" class="mb-2" id="form-filter">
    @csrf
    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <div class="w-20">
                <input name="search" class="form-control" placeholder="Tìm kiếm ...">
            </div>
            {!! generate_limit_select() !!}
        </div>
        <div class="d-flex justify-content-end">
            @if (auth('admin')->user()->can('admin|admin|view'))
                <div class="me-1 w-200px hide-mobile">
                    <select class="form-select form-filter" name="admin_id">
                        <option value="" selected>-- Tài khoản --</option>
                        @foreach ($data['admins'] as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="me-1 w-150px hide-mobile">
                <input type="text" class="form-control datepicker" value="" name="date"
                    placeholder="Chọn ngày">
            </div>
            <div class="btn-group">
                <button class="btn btn-outline-primary" type="submit">
                    <svg class="icon icon-lg">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-reload"></use>
                    </svg>
                    Tải lại
                </button>
            </div>
        </div>
    </div>
</form>
