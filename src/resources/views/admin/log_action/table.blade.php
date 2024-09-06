@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp
    @foreach ($list as $item)
        <tr id="tr-{{ $item->id }}">
            <td class="text-center">
                <a data-coreui-toggle="tooltip" title="Xem chi tiết"
                    href="{{ route('admin.log_action.detail', ['id' => $item->id]) }}" class="btn btn-sm btn-secondary">
                    <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-level-down"></use>
                    </svg>
                </a>
            </td>
            <td>
                <div class="text-nowrap">{{ $item->created_at ? date('H:i d/m/Y', $item->created_at) : '-' }}</div>
            </td>
            <td>
                <div class="text-nowrap">
                    @if ($item->admin)
                        <a class="text-decoration-none"
                            href="{{ route('admin.admin.detail', ['id' => $item->admin_id]) }}">
                            {{ $item->admin->name }}
                        </a>
                    @else
                        (Hệ thống)
                    @endif
                </div>
            </td>
            <td>
                {!! $item->content !!}
            </td>
        </tr>
    @endforeach
    @if ($paginate != '')
        <tr>
            <td colspan="4">
                <div class="mt-2">
                    {{ $paginate }}
                </div>
            </td>
        </tr>
    @endif
@else
    <tr>
        <td colspan="4" class="text-center empty-data">
            Không có dữ liệu
        </td>
    </tr>
@endif
