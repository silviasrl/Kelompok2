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
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$data->title}}">
                    </div>

                    <div class="mb-6">
                        <label for="body" class="form-label">Body</label>
                        <div id="body">
                        {!!$data->body!!}
                        </div>
                        <textarea name="body" class="form-control d-none" rows="8">{!!$data->body!!}</textarea>
                    </div>

                    <div class="min-w-150px mt-10 text-end">
                        @if ($data->id)
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('web.condition.update',$data->id)}}','PATCH');" class="btn btn-sm btn-primary">Simpan</button>
                        @else
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('web.condition.store')}}','POST');" class="btn btn-sm btn-primary">Simpan</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    obj_quill('body');
</script>