@extends('admin.index')
@section('content')
    <div class="container-lx px-4 mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active">Danh sách liên hệ</li>
            </ol>
        </nav>
        @include('admin.contact.filter')
        <div class="table-responsive table-loading">
            <table class="table border mb-0">
                <thead class="fw-semibold text-nowrap">
                    <tr class="align-middle">
                        <th class="bg-body-secondary text-center w-100px">#</th>
                        <th class="bg-body-secondary">Họ tên</th>
                        <th class="bg-body-secondary">Số ĐT/Email</th>
                        <th class="bg-body-secondary">Dịch vụ</th>
                        <th class="bg-body-secondary text-end w-150px">Trạng thái</th>
                        <th class="bg-body-secondary text-end w-150px">Thời gian</th>
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
@endsection
@push('js')
    <script>
        const routeList = "{{ route('admin.contact.table') }}";
        filterTable();

        function filterTable(currentPage = 1) {
            loadTable(routeList, currentPage);
        };
    </script>
@endpush
