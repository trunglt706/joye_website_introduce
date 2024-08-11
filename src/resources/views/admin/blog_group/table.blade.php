@php
    use App\Models\BlogGroup;
@endphp
@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp
    @foreach ($list as $item)
        @php
            $status = BlogGroup::get_status($item->status);
        @endphp
        <tr id="tr-{{ $item->id }}">
            <td class="text-center">
                <a data-coreui-toggle="tooltip" title="Xem chi tiết"
                    href="{{ route('admin.blog_group.detail', ['id' => $item->id]) }}" class="btn btn-sm btn-secondary">
                    <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                    </svg>
                </a>
            </td>
            <td>
                <div class="text-nowrap">{{ $item->name }}</div>
            </td>
            <td>
                <div class="text-end">{{ $item->counts_blog }}</div>
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
            <td colspan="5">
                <div class="mt-2">
                    {{ $paginate }}
                </div>
            </td>
        </tr>
    @endif
@else
    <tr>
        <td colspan="5" class="text-center empty-data">
            Không có dữ liệu
        </td>
    </tr>
@endif
