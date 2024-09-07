@extends('admin.index')
@section('content')
    <div class="container-lx px-4 mb-3">
        <div class="d-flex justify-content-between">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active">Quản lý khách hàng</li>
                </ol>
            </nav>
        </div>
        @include('admin.customer.filter')
        <div class="table-responsive table-loading">
            <table class="table border mb-0">
                <thead class="fw-semibold text-nowrap">
                    <tr class="align-middle">
                        <th class="bg-body-secondary text-center w-100px">#</th>
                        <th class="bg-body-secondary">Tên khách hàng</th>
                        <th class="bg-body-secondary">Chức vụ</th>
                        <th class="bg-body-secondary w-150px text-center">Hình ảnh</th>
                        <th class="bg-body-secondary text-end w-150px">Trạng thái</th>
                        <th class="bg-body-secondary text-end w-150px">Ngày tạo</th>
                    </tr>
                </thead>
                <tbody id="load-table">
                    <td colspan="6" class="text-center empty-data">
                        <div class="text-center">
                            Không có dữ liệu
                        </div>
                    </td>
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.customer.create')
@endsection
@push('js')
    <script>
        const routeList = "{{ route('admin.customer.table') }}";
        filterTable();

        function filterTable(currentPage = 1) {
            loadTable(routeList, currentPage);
        };

        function confirmDelete(id) {
            deleteData(id, "{{ route('admin.customer.destroy') }}");
        }
    </script>
@endpush
