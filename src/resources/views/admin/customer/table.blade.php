@php
    use App\Models\Customer;
@endphp
@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp
    @foreach ($list as $item)
        @php
            $status = Customer::get_status($item->status);
        @endphp
        <tr id="tr-{{ $item->id }}">
            <td class="text-nowrap">
                <a data-coreui-toggle="tooltip" title="Xem chi tiết"
                    href="{{ route('admin.customer.detail', ['id' => $item->id]) }}" class="btn btn-sm btn-secondary">
                    <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                    </svg>
                </a>
                <button data-bs-toggle="tooltip" title="Xóa" class="btn btn-danger btn-sm btn-delete"
                    onclick="confirmDelete('{{ $item->id }}')">
                    <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                    </svg>
                </button>
            </td>
            <td>
                <div class="text-nowrap">{{ $item->name }}</div>
            </td>
            <td class="text-nowrap">
                {{ $item->position }}
            </td>
            <td>
                <div class="text-center">
                    <img src="{{ get_url($item->image) ?? asset('img/user.png') }}" alt="Image" class="h-30px">
                </div>
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
