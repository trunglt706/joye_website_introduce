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
            <td class="text-nowrap">
                <a data-coreui-toggle="tooltip" title="Xem chi tiết"
                    href="{{ route('admin.blog_group.detail', ['id' => $item->id]) }}" class="btn btn-sm btn-secondary">
                    <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                    </svg>
                </a>
                @if ($item->blogs_count == 0)
                    <button data-bs-toggle="tooltip" title="Xóa" class="btn btn-danger btn-sm btn-delete"
                        onclick="confirmDelete('{{ $item->id }}')">
                        <svg class="icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                        </svg>
                    </button>
                @endif
            </td>
            <td>
                <div class="text-nowrap">{{ $item->name }}</div>
            </td>
            <td>
                <div class="text-end">{{ $item->blogs_count }}</div>
            </td>
            <td class="text-end">
                <span class="badge bg-{{ $status[1] }}">
                    {{ $status[0] }}
                </span>
            </td>
            <td class="text-end">
                <div class="text-nowrap">{{ $item->created_at ? date('H:i d/m/Y', strtotime($item->created_at)) : '-' }}
                </div>
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
