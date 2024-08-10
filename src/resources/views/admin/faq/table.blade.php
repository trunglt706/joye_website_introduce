@php
    use App\Models\Admin;
@endphp
@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp
    @foreach ($list as $item)
        @php
            $status = Admin::get_status($item->status);
        @endphp
        <tr id="tr-{{ $item->id }}">
            <td class="text-center">
                <a data-coreui-toggle="tooltip" title="Xem chi tiết"
                    href="{{ route('admin.admin.detail', ['id' => $item->id]) }}" class="btn btn-sm btn-secondary">
                    <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                    </svg>
                </a>
            </td>
            <td>
                <div class="text-nowrap">{{ $item->name }}</div>
            </td>
            <td>
                <div class="text-nowrap">
                    <span class="show-data">{{ $item->email }}</span>
                    <span role="button" data-table="admins" data-column="email" data-id="{{ $item->id }}"
                        class="h-20px w-20px show-secret-data" data-coreui-toggle="tooltip" title="Sao chép dữ liệu">
                        <i class="fas fa-clone"></i>
                    </span>
                </div>
            </td>
            <td>
                <div class="text-nowrap">{{ $item->role ? $item->role->name : '-' }}</div>
            </td>
            <td class="text-end">
                <span class="badge bg-{{ $status[1] }}">
                    {{ $status[0] }}
                </span>
            </td>
            <td class="text-end">
                <div class="text-nowrap">{{ $item->last_login ? date('H:i d/m/Y', $item->last_login) : '-' }}</div>
            </td>
        </tr>
    @endforeach
    @if ($paginate != '')
        <tr>
            <td colspan="6">
                <div class="mt-2">
                    {{ $paginate }}
                </div>
            </td>
        </tr>
    @endif
@else
    <tr>
        <td colspan="6" class="text-center empty-data">
            Không có dữ liệu
        </td>
    </tr>
@endif
