<x-auth-layout>
    <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        <div id="login_page">
            <form class="form w-100" novalidate="novalidate" id="form_login">
                <div class="text-center mb-10">
                    <h1 class="text-dark mb-3">LOGIN</h1>
                    <div class="text-gray-400 fw-bold fs-4">Pengguna baru?
                        <a href="javascript:;" onclick="auth_content('register_page');"
                            class="link-primary fw-bolder">Daftar Akun</a>
                    </div>
                </div>
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                    <input class="form-control form-control-lg form-control-solid" type="text" id="email"
                        name="email" autocomplete="off" data-login="1" />
                </div>
                <div class="fv-row mb-10">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                    </div>
                    <input class="form-control form-control-lg form-control-solid" type="password" name="password"
                        autocomplete="off" data-login="2" />
                </div>
                <div class="text-center">
                    <button type="button" id="tombol_login"
                        onclick="handle_post('#tombol_login','#form_login','{{ route('web.auth.login') }}','POST');"
                        class="btn btn-lg btn-primary w-100 mb-5">
                        <span class="indicator-label">Continue</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
        <div id="register_page">
            <form class="form w-100" novalidate="novalidate" id="form_register">
                <div class="mb-10 text-center">
                    <h1 class="text-dark mb-3">Daftar Akun</h1>
                    <div class="text-gray-400 fw-bold fs-4">Sudah mempunyai akun?
                        <a href="javascript:;" onclick="auth_content('login_page');"
                            class="link-primary fw-bolder">Masuk ke sini</a>
                    </div>
                </div>
                <div class="fv-row mb-7">
                    <label class="form-label fw-bolder text-dark fs-6">Nama Lengkap</label>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name"
                        autocomplete="off" />
                </div>
                <div class="row fv-row mb-7">
                    <div class="col-xl-12">
                        <label class="form-label fw-bolder text-dark fs-6">Email</label>
                        <input class="form-control form-control-lg form-control-solid" type="email" name="email"
                            autocomplete="off" />
                    </div>
                </div>
                <div class="mb-10 fv-row" data-kt-password-meter="true">
                    <div class="mb-1">
                        <label class="form-label fw-bolder text-dark fs-6">Password</label>
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg form-control-solid" type="password"
                                placeholder="" name="password" autocomplete="off" />
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                data-kt-password-meter-control="visibility">
                                <i class="bi bi-eye-slash fs-2"></i>
                                <i class="bi bi-eye fs-2 d-none"></i>
                            </span>
                        </div>
                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                    </div>
                    <div class="text-muted">Gunakan 8 karakter atau lebih dengan campuran huruf, angka & simbol.</div>
                </div>
                <div class="fv-row mb-5">
                    <label class="form-label fw-bolder text-dark fs-6">Konfirmasi Password</label>
                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder=""
                        name="confirm-password" autocomplete="off" />
                </div>
                <div class="fv-row mb-10">
                    <label class="form-check form-check-custom form-check-solid form-check-inline">
                        <input class="form-check-input" type="checkbox" name="toc" value="1" />
                        <span class="form-check-label fw-bold text-gray-700 fs-6">Saya setuju
                            <a href="javascript:;" class="ms-1 link-primary">Syarat dan ketentuan</a>.</span>
                    </label>
                </div>
                <div class="text-center">
                    <button type="button" id="tombol_register"
                        onclick="handle_register('#tombol_register','#form_register','{{ route('web.auth.register') }}','POST');"
                        class="btn btn-lg btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    @section('custom_js')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function() {
                auth_content('login_page');
            });

            function handle_post(tombol, form, url, method) {
                $(tombol).submit(function() {
                    return false;
                });
                let data = $(form).serialize();
                $(tombol).prop("disabled", true);
                $(tombol).attr("data-kt-indicator", "on");
                $.ajax({
                    type: method,
                    url: url,
                    data: data,
                    dataType: 'json',
                    beforeSend: function() {

                    },
                    success: function(result) {
                        if (result.alert == "success") {
                            Swal.fire({
                                text: result.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, Mengerti!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                            }).then(function() {
                                window.location.href = result.callback;
                            });
                        } else {
                            Swal.fire({
                                text: result.message,
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, Mengerti!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                            });
                        }
                        $(tombol).prop("disabled", false);
                        $(tombol).removeAttr("data-kt-indicator");
                    },
                });
            }

            function handle_register(tombol, form, url, method) {
                $(tombol).submit(function() {
                    return false;
                });
                let data = $(form).serialize();
                $(tombol).prop("disabled", true);
                $(tombol).attr("data-kt-indicator", "on");
                $.ajax({
                    type: method,
                    url: url,
                    data: data,
                    dataType: 'json',
                    beforeSend: function() {

                    },
                    success: function(result) {
                        if (result.alert == "success") {
                            Swal.fire({
                                text: result.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, Mengerti!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                            }).then(function() {
                                $(form)[0].reset();
                                auth_content('login_page');
                            });
                        } else {
                            Swal.fire({
                                text: result.message,
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, Mengerti!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                            });
                        }
                        $(tombol).prop("disabled", false);
                        $(tombol).removeAttr("data-kt-indicator");
                    },
                });
            }

            function auth_content(cont) {
                $('#login_page').hide();
                $('#register_page').hide();
                $('#forgot_page').hide();
                $('#' + cont).show();
            }
            $("#email").focus();
        </script>
    @endsection
</x-auth-layout>
