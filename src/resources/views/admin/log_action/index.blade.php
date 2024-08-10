@extends('admin.index')
@section('content')
    <div class="container-lx px-4 mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active">Lịch sử hoạt động</li>
            </ol>
        </nav>
        @include('admin.log_action.filter')
        <div class="table-responsive table-loading">
            <table class="table border mb-0">
                <thead class="fw-semibold">
                    <tr class="align-middle">
                        <th class="bg-body-secondary text-center w-50px">#</th>
                        <th class="bg-body-secondary w-150px text-nowrap">Thời gian</th>
                        <th class="bg-body-secondary text-nowrap">Tài khoản</th>
                        <th class="bg-body-secondary text-nowrap">Nội dung</th>
                    </tr>
                </thead>
                <tbody id="load-table">
                    <td colspan="4" class="text-center empty-data">
                        <div class="text-center">
                            Không có dữ liệu
                        </div>
                    </td>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('js')
    <script>
        const routeList = "{{ route('admin.log_action.table') }}";
        filterTable();

        function filterTable(currentPage = 1) {
            loadTable(routeList, currentPage);
        };
    </script>
@endpush
