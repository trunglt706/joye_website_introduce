@php
    use App\Models\Social;
@endphp
@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp
    @foreach ($list as $item)
        @php
            $status = Social::get_status($item->status);
        @endphp
        <tr id="tr-{{ $item->id }}">
            <td>
                <a data-coreui-toggle="tooltip" title="Xem chi tiết"
                    href="{{ route('admin.social.detail', ['id' => $item->id]) }}" class="btn btn-sm btn-secondary">
                    <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                    </svg>
                </a>
            </td>
            <td>
                <div class="text-nowrap">{{ $item->name }}</div>
            </td>
            <td>
                <div class="text-center">
                    <img src="{{ $item->image }}" alt="" class="h-30px">
                </div>
            </td>
            <td class="text-center">
                <a href="{{ $item->link ?? '#' }}" target="_blank">Liên kết</a>
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