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
                        <label for="nik" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="" selected disabled>Pilih status</option>
                            <option value="diterima" @if ($data->status == 'diterima') selected @endif>Diterima</option>
                            <option value="ditolak" @if ($data->status == 'ditolak') selected @endif>Ditolak</option>
                            <option value="data tidak lengkap" @if ($data->status == 'data tidak lengkap') selected @endif>Data
                                tidak lengkap</option>
                        </select>
                    </div>
                    <div id="diterima">
                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal Perekaman KTP</label>
                            <input class="form-control" id="tanggal_diambil" name="tanggal_diambil"
                                value="{{ $data->tanggal_diambil }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Jam Perekaman KTP</label>
                            <input class="form-control" id="jam_diambil" name="jam_diambil"
                                value="{{ $data->jam_diambil }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi"
                                value="{{ $data->lokasi }}">
                        </div>
                    </div>

                    <div id="ditolak">
                        <div class="mb-3">
                            <label for="" class="form-label">Alasan</label>
                            <textarea class="form-control" id="reason" name="reason" rows="3">{{ $data->reason }}</textarea>
                        </div>
                    </div>

                    <div id="data_tidak_lengkap">
                        <div class="mb-3">
                            <label for="" class="form-label">Alasan</label>
                            <textarea class="form-control" id="reason" name="reason" rows="3">{{ $data->reason }}</textarea>
                        </div>
                    </div>

                    <div class="min-w-150px mt-10 text-end">
                        <button id="tombol_simpan"
                            onclick="handle_upload('#tombol_simpan','#form_input','{{ route('web.register.do_confirm', $data->id) }}','PATCH');"
                            class="btn btn-sm btn-primary">Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#diterima').hide();
        $('#ditolak').hide();
        $('#data_tidak_lengkap').hide();
        $('#status').change(function() {
            var status = $(this).val();
            if (status == 'diterima') {
                $('#diterima').show();
                $('#ditolak').hide();
                $('#data_tidak_lengkap').hide();
            } else if (status == 'ditolak') {
                $('#diterima').hide();
                $('#ditolak').show();
                $('#data_tidak_lengkap').hide();
            } else if (status == 'data tidak lengkap') {
                $('#diterima').hide();
                $('#ditolak').hide();
                $('#data_tidak_lengkap').show();
            } else {
                $('#diterima').hide();
                $('#ditolak').hide();
                $('#data_tidak_lengkap').hide();
            }
        });
    });
    $('#tanggal_diambil').flatpickr();

    $('#jam_diambil').flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    });
</script>
