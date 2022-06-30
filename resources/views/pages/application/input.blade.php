<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h6>
                        @if ($data->id)
                            Update
                        @else
                            Add
                        @endif
                        Application
                    </h6>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end">
                        <button type="button" onclick="load_list(1);" class="btn btn-sm btn-primary">Kembali</button>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <form id="form_input">
                    <div class="mb-3">
                        <label for="nik" class="form-label">Nik</label>
                        <input type="number" class="form-control" id="nik" name="nik"
                            value="{{ $data->nik }}">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $data->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ $data->phone }}">
                    </div>

                    <div class="mb-3">
                        <label for="kk" class="form-label">Kartu keluarga</label>
                        <input type="file" name="kk" class="form-control" id="kk"
                            value="{{ $data->kk }}">
                    </div>

                    <div class="mb-3">
                        <label for="akta" class="form-label">Akta</label>
                        <input type="file" name="akta" class="form-control" id="akta"
                            value="{{ $data->akta }}">
                    </div>

                    <div class="min-w-150px mt-10 text-end">
                        @if ($data->id)
                            <button id="tombol_simpan"
                                onclick="handle_upload('#tombol_simpan','#form_input','{{ route('web.register.update', $data->id) }}','PATCH');"
                                class="btn btn-sm btn-primary">Simpan</button>
                        @else
                            <button id="tombol_simpan"
                                onclick="handle_upload('#tombol_simpan','#form_input','{{ route('web.register.store') }}','POST');"
                                class="btn btn-sm btn-primary">Simpan</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
