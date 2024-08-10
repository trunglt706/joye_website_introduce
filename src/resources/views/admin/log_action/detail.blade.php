@extends('admin.index')
@section('content')
    <div class="container-lx px-4 mb-3">
        <nav aria-label="breadcrumb" class="hide-mobile">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.log_action.index') }}">Lịch sử hoạt động</a>
                </li>
                <li class="breadcrumb-item active">Mã #{{ $data->code }}</li>
            </ol>
        </nav>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td class="text-nowrap"><b>- Mã:</b> #{{ $data->code }}</td>
                    <td class="text-nowrap"><b>- Tài khoản:</b> {{ $data->admin->name }}</td>
                    <td class="text-nowrap"><b>- IP address:</b> {{ $data->ip }}</td>
                    <td class="text-nowrap"><b>- Thời gian:</b> {{ date('H:i d/m/Y', $data->created_at) }}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        {!! $data->content !!}
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
