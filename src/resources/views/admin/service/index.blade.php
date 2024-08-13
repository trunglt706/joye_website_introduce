@extends('admin.index')
@section('content')
    <div class="container-lx px-4 mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active">Danh sách dịch vụ</li>
            </ol>
        </nav>
        @include('admin.service.filter')
        <div class="table-responsive table-loading">
            <table class="table border mb-0">
                <thead class="fw-semibold text-nowrap">
                    <tr class="align-middle">
                        <th class="bg-body-secondary text-center w-100px">#</th>
                        <th class="bg-body-secondary">Tên dịch vụ</th>
                        <th class="bg-body-secondary text-end w-150px">Trạng thái</th>
                        <th class="bg-body-secondary text-end w-150px">Ngày tạo</th>
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
    @include('admin.service.create')
@endsection
@push('js')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
    <script>
        const routeList = "{{ route('admin.service.table') }}";
        filterTable();

        function filterTable(currentPage = 1) {
            loadTable(routeList, currentPage);
        };

        function confirmDelete(id) {
            deleteData(id, "{{ route('admin.service.destroy') }}");
        }

        $(document).ready(function() {
            CKEDITOR.replace('ckeditor', {
                height: 280,
                toolbar: 'Full',
                filebrowserBrowseUrl: "{{ route('admin.upload_editor') }}",
                filebrowserImageBrowseUrl: "{{ route('admin.upload_editor') . '?type=Images' }}",
                filebrowserUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}",
                filebrowserImageUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
            });

            $(document).on('click', 'button[type="submit"]', function() {
                for (var instanceName in CKEDITOR.instances) {
                    CKEDITOR.instances[instanceName].updateElement();
                }
            })
        })
    </script>
@endpush
