<table class="table align-middle table-row-dashed fs-6 gy-5">
    <thead>
        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
            <th class="text-center pe-3 min-w-100px">Title</th>
            <th class="text-center pe-3 min-w-150px">Body</th>
            <th class="text-center pe-3 min-w-100px">Thumbnail</th>
            <th class="text-center pe-3 min-w-100px">Created By</th>
            <th class="text-center pe-3 min-w-50px">Created at</th>
            <th class="text-center pe-0 min-w-25px">Update at</th>
            <th class="text-center pe-0 min-w-25px">Action</th>
        </tr>
    </thead>
    <tbody class="fw-bold text-gray-600">
        @foreach ($collection as $item)
            <tr>
                <!--begin::Product ID-->
                <td class="text-center">{{ $item->title }}</td>
                <!--end::Product ID-->
                <!--begin::Date added-->
                <td class="text-center">{{ $item->body }}</td>
                <!--end::Date added-->
                <!--begin::Price-->
                <td class="text-center">
                    <div class="container-image-table">
                        <img src="{{ asset('images/news/' . $item->thumbnail) }}" class="image-table"
                            alt="" />
                    </div>
                </td>
                <!--end::Price-->
                <!--begin::Price-->
                <td class="text-center">{{ $item->user->name }}</td>
                <!--end::Price-->
                <!--begin::Status-->
                <td class="text-center">{{ $item->created_at }}</td>
                <!--end::Status-->
                <!--begin::Qty-->
                <td class="text-center">{{ $item->updated_at }}</td>
                <!--end::Qty-->
                <!--begin::Qty-->
                <td class="text-center d-flex flex-column align-item-center gap-3">
                    @if ($user->role === 'a')
                        <div class="">
                            <a class="btn btn-sm btn-info" href="javascript:;"
                                onclick="load_input('{{ route('web.news.edit', $item->id) }}');"
                                class="menu-link px-3">Update</a>
                        </div>

                        <div class="">
                            <button class="btn btn-sm btn-danger"
                                onclick="handle_confirm('Are you sure?','Yes','No','DELETE','{{ route('web.news.destroy', $item->id) }}');">Delete</button>
                        </div>
                    @endif
                </td>
                <!--end::Qty-->
            </tr>
        @endforeach
    </tbody>
</table>
{{ $collection->links('themes.app.pagination') }}
