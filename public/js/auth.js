$("body").on("contextmenu", "img", function(e) {
    return false;
});
$('img').attr('draggable', false);

function number_only(obj) {
    $('#' + obj).bind('keypress', function (event) {
        var regex = new RegExp("^[0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
}
function format_email(obj) {
    $('#' + obj).bind('keypress', function (event) {
        var regex = new RegExp("^[A-Za-z0-9@_.]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
}
toastr.options = {
    "closeButton": true,
    "debug": true,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "2000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
function success_toastr(msg) {
    toastr.success(msg);
}
function info_toastr(msg) {
    toastr.info(msg);
}
function error_toastr(msg) {
    toastr.error(msg);
}
function auth_content(cont){
    $('#login_page').hide();
    $('#register_page').hide();
    $('#forgot_page').hide();
    if(cont == "login_page"){
        $('#form_login')[0].reset();
        $("#email_login").focus();
    }
    if(cont == "register_page"){
        $('#form_register')[0].reset();
        $("#fullname").focus();
    }
    if(cont == "forgot_page"){
        $('#form_forgot')[0].reset();
        $("#email_forgot").focus();
    }
    $('#' + cont).show();
}
$("#email_login").focus();
$("#form_login").on('keydown', 'input', function (event) {
    if (event.which == 9 || event.which == 13) {
        event.preventDefault();
        var $this = $(event.target);
        var index = parseFloat($this.attr('data-login'));
        var val = $($this).val();
        if(index < 2){
            $('[data-login="' + (index + 1).toString() + '"]').focus();
        }else{
            $('#tombol_login').trigger("click");
        }
    }
});
