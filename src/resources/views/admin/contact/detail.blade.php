@php
    use App\Models\Contact;
    $status = Contact::get_status($data->status);
@endphp
@extends('admin.index')
@section('content')
    <div class="container-lx px-4 mb-3">
        <div class="d-flex justify-content-between">
            <nav aria-label="breadcrumb" class="hide-mobile">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.contact.index') }}">Danh sách liên hệ</a>
                    </li>
                    <li class="breadcrumb-item active">Liên hệ #{{ $data->code }}</li>
                </ol>
            </nav>
            @if ($data->status == 'un_active')
                <div class="btn-group mb-2">
                    <a href="{{ route('admin.contact.update', ['id' => $data->id]) }}?status=active"
                        class="btn btn-success btn-loading">
                        <svg class="icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-check-alt"></use>
                        </svg> Đã xử lý
                    </a>
                    <a href="{{ route('admin.contact.update', ['id' => $data->id]) }}?status=blocked"
                        class="btn btn-danger btn-loading">
                        <svg class="icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-x"></use>
                        </svg> Không xử lý
                    </a>
                </div>
            @endif
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td class="bg-body-secondary w-175px text-nowrap">- Họ tên</td>
                    <td>{{ $data->name }}</td>
                    <td class="bg-body-secondary w-175px text-nowrap">- Số ĐT</td>
                    <td>{{ $data->phone }}</td>
                </tr>
                <tr>
                    <td class="bg-body-secondary text-nowrap">- Trạng thái</td>
                    <td>
                        <span class="badge bg-{{ $status[1] }}">
                            {{ $status[0] }}
                        </span>
                    </td>
                    <td class="bg-body-secondary text-nowrap">- Ngày tạo</td>
                    <td>
                        <div class="text-nowrap">
                            {{ $data->created_at ? date('H:i d/m/Y', strtotime($data->created_at)) : '-' }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="bg-body-secondary text-nowrap">- Nội dung</td>
                    <td colspan="3">
                        {!! $data->comment !!}
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
