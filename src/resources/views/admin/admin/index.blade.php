@extends('admin.index')
@section('content')
    <div class="container-lx px-4 mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active">Tài khoản quản trị</li>
            </ol>
        </nav>
        @include('admin.admin.filter')
        <div class="table-responsive table-loading">
            <table class="table border mb-0">
                <thead class="fw-semibold text-nowrap">
                    <tr class="align-middle">
                        <th class="bg-body-secondary text-center w-100px">#</th>
                        <th class="bg-body-secondary">Họ tên</th>
                        <th class="bg-body-secondary">Email</th>
                        <th class="bg-body-secondary text-end w-150px">Trạng thái</th>
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
    @include('admin.admin.create')
@endsection
@push('js')
    <script>
        const routeList = "{{ route('admin.admin.table') }}";
        filterTable();

        function filterTable(currentPage = 1) {
            loadTable(routeList, currentPage);
        };

        function confirmDelete(id) {
            deleteData(id, "{{ route('admin.admin.destroy') }}");
        }
    </script>
@endpush
