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
                    <div id="diterima">
                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal Diambil</label>
                            <input class="form-control" id="tanggal_diambil" name="tanggal_diambil">
                        </div>
                        <div class="mb-3">
                            <label for="">Jam Diambil</label>
                            <input class="form-control" id="jam_diambil" name="jam_diambil">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi">
                        </div>
                    </div>

                    <div class="min-w-150px mt-10 text-end">
                        <button id="tombol_simpan"
                            onclick="handle_upload('#tombol_simpan','#form_input','{{ route('web.register.do_process', $data->id) }}','PATCH');"
                            class="btn btn-sm btn-primary">Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#tanggal_diambil').flatpickr();

    $('#jam_diambil').flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    });
</script>