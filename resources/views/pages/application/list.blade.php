<table class="table align-middle table-row-dashed fs-6 gy-5">
    <thead>
        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
            <th class="text-center pe-3 min-w-50">Nik</th>
            <th class="text-center pe-3 min-w-150px">Name</th>
            <th class="text-center pe-3 min-w-100px">Phone</th>
            <th class="text-center pe-3 min-w-50px">Kartu keluarga</th>
            <th class="text-center pe-3 min-w-50px">Akta</th>
            <th class="text-center pe-0 min-w-25px">Status</th>
            @if ($user->role === 'a')
                <th class="text-center pe-0 min-w-50px">Action</th>
            @endif
        </tr>
    </thead>
    <tbody class="fw-bold text-gray-600">
        @foreach ($collection as $item)
            <tr>
                <!--begin::Product ID-->
                <td class="text-center">{{ $item->nik }}</td>
                <!--end::Product ID-->
                <!--begin::Date added-->
                <td class="text-center">{{ $item->name }}</td>
                <!--end::Date added-->
                <!--begin::Price-->
                <td class="text-center">{{ $item->phone }}</td>
                <!--end::Price-->
                <!--begin::Status-->
                <td class="text-center">
                    <div class="container-image-table">
                        <a href="{{ asset('storage/' . $item->kk) }}" target="_blank">
                            <img src="{{ asset('storage/' . $item->kk) }}" alt="image kk" class="image-table">
                        </a>
                    </div>
                </td>
                <!--end::Status-->
                <!--begin::Status-->
                <td class="text-center">
                    <div class="container-image-table">
                        <a href="{{ asset('storage/' . $item->akta) }}" target="_blank">
                            <img src="{{ asset('storage/' . $item->akta) }}" alt="image akta" class="image-table">
                        </a>
                    </div>
                </td>
                <!--end::Status-->
                <!--begin::Status-->
                <td class="text-center">
                    {{ $item->st }}
                </td>
                <!--end::Status-->
                <!--begin::Qty-->
                <td class="text-center">
                    @if ($user->role === 'u')
                    @elseif ($user->role === 'a')
                        @if ($item->st === 'menunggu konfirmasi')
                            <div class="btn-group">
                                <button class="btn btn-sm btn-primary"
                                    onclick="load_input('{{ route('web.register.confirm', $item->id) }}')">
                                    <i class="fa fa-edit"></i>
                                    Konfirmasi
                                </button>
                                <button class="btn btn-sm btn-danger"
                                    onclick="handle_confirm('Are you sure?','Yes','No','DELETE','{{ route('web.register.destroy', $item->id) }}');">
                                    <i class="fa fa-trash"></i>
                                    Delete
                                </button>
                            @elseif ($item->st === 'diterima')
                                <button class="btn btn-sm btn-primary"
                                    onclick="load_input('{{ route('web.register.process', $item->id) }}')">
                                    <i class="fa fa-edit"></i>
                                    Prosess
                                </button>
                            </div>
                        @endif
                    @endif
                </td>
                <!--end::Qty-->
            </tr>
        @endforeach
    </tbody>
</table>
{{ $collection->links('themes.app.pagination') }}
