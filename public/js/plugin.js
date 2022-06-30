$('#mode_toggle').change(function () {
    if (this.value == "dark") {
        KTApp.setThemeMode("dark", function () {
            $("#dark_mode").hide();
            $("#light_mode").show();
        }); // set dark mode
        $("#mode_toggle").val('light');
    } else {
        KTApp.setThemeMode("light", function () {
            $("#light_mode").hide();
            $("#dark_mode").show();
        }); // set light mode
        $("#mode_toggle").val('dark');
    }
});
$("#light_mode").hide();

function mode(type) {
    if (type == "dark") {
        $('#mode_toggle').prop('checked', true);
        KTApp.setThemeMode("dark", function () {
            $("#dark_mode").hide();
            $("#light_mode").show();
        }); // set dark mode
        $("#mode_toggle").val('light');
    } else {
        $('#mode_toggle').prop('checked', false);
        KTApp.setThemeMode("light", function () {
            $("#light_mode").hide();
            $("#dark_mode").show();
        }); // set light mode
        $("#mode_toggle").val('dark');
    }
}
var target = document.querySelector("#content_input");
var target_modal = document.querySelector("#contentListResult");

var blockUI = new KTBlockUI(target, {
    message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Harap tunggu...</div>',
});

var blockModal = new KTBlockUI(target_modal);

function loading() {
    blockUI.block();
}

function loaded() {
    blockUI.release();
}

function loading_modal() {
    blockModal.block();
}

function loaded_modal() {
    blockModal.release();
}
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
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

function success_toastr(pesan) {
    toastr.success(pesan, "SIPP KTP SAMOSIR");
}

function error_toastr(pesan) {
    toastr.error(pesan, "SIPP KTP SAMOSIR");
}

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

function npwp_format(obj) {
    Inputmask({
        "mask": "99.999.999.9-999.999"
    }).mask("#" + obj);
}

function format_ribuan(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function ribuan(obj) {
    $('#' + obj).keyup(function (event) {
        if (event.which >= 37 && event.which <= 40) return;
        // format number
        $(this).val(function (index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        var id = $(this).data("id-selector");
        var classs = $(this).data("class-selector");
        var value = $(this).val();
        var noCommas = value.replace(/,/g, "");
        $('#' + id).val(noCommas);
        $('.' + classs).val(noCommas);
    });
}

function obj_tinymce(obj) {
    tinymce.init({
        selector: '#' + obj
    });
}

function obj_quill(obj) {
    var quill = new Quill('#' + obj, {
        modules: {
            toolbar: [
                [{
                    header: [1, 2, false]
                }],
                ['bold', 'italic', 'underline'],
                ['image', 'code-block']
            ]
        },
        placeholder: 'Type your text here...',
        theme: 'snow' // or 'bubble'
    });
    quill.on('text-change', function (delta, oldDelta, source) {
        document.querySelector("textarea[name='" + obj + "']").value = quill.root.innerHTML;
    });
}

function obj_ckeditor(obj) {
    ClassicEditor
        .create(document.querySelector('#' + obj))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
}

function obj_autosize(obj) {
    autosize($('#' + obj));
}

function obj_time(obj) {
    $("#" + obj).flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    });
}

function obj_date_time(obj) {
    $("#" + obj).flatpickr({
        dateFormat: "Y-m-d H:i",
        enableTime: true,
    });
}

function obj_date(obj) {
    $("#" + obj).flatpickr({
        dateFormat: "Y-m-d",
    });
}

function obj_year(obj) {
    $("#" + obj).flatpickr({
        plugins: [new monthSelectPlugin({
            shorthand: true,
            dateFormat: "Y",
            altFormat: "Y"
        })]
    });
}

function obj_startdatenow(obj) {
    $("#" + obj).flatpickr({
        dateFormat: "Y-m-d",
        minDate: "today"
    });
}

function obj_enddatenow(obj) {
    $("#" + obj).flatpickr({
        dateFormat: "Y-m-d",
        maxDate: "today"
    });
}

function obj_jstree(obj) {
    $('#' + obj).jstree({
        "core": {
            "themes": {
                "responsive": false
            }
        },
        "types": {
            "default": {
                "icon": "fa fa-folder text-warning"
            },
            "file": {
                "icon": "fa fa-file  text-warning"
            }
        },
        "plugins": ["types"]
    });

    // handle link clicks in tree nodes(support target="_blank" as well)
    $('#' + obj).on('select_node.jstree', function (e, data) {
        var link = $('#' + data.selected).find('a');
        if (link.attr("href") != "#" && link.attr("href") != "javascript:;" && link.attr("href") != "") {
            if (link.attr("target") == "_blank") {
                link.attr("href").target = "_blank";
            }
            document.location.href = link.attr("href");
            return false;
        }
    });
}

function obj_select(obj, title) {
    $('#' + obj).select2({
        placeholder: title,
        language: {
            // You can find all of the options in the language files provided in the
            // build. They all must be functions that return the string that should be
            // displayed.
            "noResults": function () {
                return "Data Tidak ditemukan";
            },
            "inputTooShort": function () {
                return "Anda harus memasukkan setidaknya 1 karakter";
            }
        },
        width: '100%',
    });
}

function obj_select_multiple(obj, title) {
    $('#' + obj).select2({
        placeholder: title,
        language: {
            // You can find all of the options in the language files provided in the
            // build. They all must be functions that return the string that should be
            // displayed.
            "noResults": function () {
                return "Data Tidak ditemukan";
            },
            "inputTooShort": function () {
                return "Anda harus memasukkan setidaknya 1 karakter";
            }
        },
        width: '100%',
        tags: true,
        tokenSeparators: [',', ' ']
    });
}

function obj_select_ajax(obj, title, url) {
    $('#' + obj).select2({
        placeholder: title,
        width: '90%',
        language: {
            // You can find all of the options in the language files provided in the
            // build. They all must be functions that return the string that should be
            // displayed.
            "noResults": function () {
                return "Data Tidak ditemukan";
            },
            "inputTooShort": function () {
                return "Anda harus memasukkan setidaknya 1 karakter";
            }
        },
        minimumInputLength: 1,
        ajax: {
            method: 'POST',
            url: url,
            data: function (params) {
                var query = {
                    search: params.term
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.title,
                            id: item.id
                        }
                    })
                };
            }
        }
    });
}

function obj_tagify(obj) {
    var input = document.querySelector(obj);
    new Tagify(input);
}

function obj_image(obj) {
    var input = document.querySelector(obj);
    var imageInput = KTImageInput.getInstance(input);
}
function obj_dropzone(obj,route, amount){
    var uploadedDocumentMap = {}
    var myDropzone = new Dropzone("#"+obj, {
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: route, // Set the url for your upload script location
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: amount,
        maxFilesize: amount, // MB
        addRemoveLinks: true,
        success: function(file, response) {
            $('form').append('<input type="hidden" name="'+obj+'[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name;
            success_toastr('File Uploaded');
        },
        removedfile: function (file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('form').find('input[name="' + obj + '[]"][value="' + name + '"]').remove()
        },
        init: function () {
            this.on("maxfilesexceeded", function (file) {
                error_toastr("Maksimal File Upload " + amount + " File");
            });
        }
    });
}

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
