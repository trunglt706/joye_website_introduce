@php
    use App\Models\Blog;
    $status = Blog::get_status($data['blog']->status);
@endphp
@extends('admin.index')
@section('content')
    <div class="container-lx px-4 mb-3">
        <nav aria-label="breadcrumb" class="hide-mobile">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.blog.index') }}">Danh sách bài viết</a>
                </li>
                <li class="breadcrumb-item active">Bài viết #{{ $data['blog']->code }}</li>
            </ol>
        </nav>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td class="bg-body-secondary w-175px text-nowrap">- Tiêu đề</td>
                    <td>{{ $data['blog']->name }}</td>
                    <td class="bg-body-secondary text-nowrap">- Nhóm</td>
                    <td>
                        {{ $data['blog']->group ? $data['blog']->group->name : '' }}
                    </td>
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
                            {{ $data['blog']->created_at ? date('H:i d/m/Y', $data['blog']->created_at) : '-' }}</div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
