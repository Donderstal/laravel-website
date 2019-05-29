window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');
    require("bootstrap");
    window.toastr = require("toastr/toastr");
    require('@coreui/coreui');
} catch (e) {
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

// toastr plugin settings
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut",
}

// Upload avatar place holder
function readURL(input) {

}

$("#avatar_file").change(function () {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(this.files[0]);
    }
});

// Delete Confirmation modal
$('button[rel=delete]').on('click', function (e) {
    e.preventDefault();
    $('#deleteConfirmation').find('input[type=hidden][name=route]').val($(this).data('route'));
    $('#deleteConfirmation').modal('show')
});

$(document).on('click', '.confirm-delete', function () {
    $(this).parents('#deleteConfirmation').find('form').attr('action', $(this).parent().find('input[type=hidden][name=route]').val()).submit();
});

$('#deleteConfirmation').on('hide.bs.modal', function (e) {
    $('#deleteConfirmation').find('input[type=hidden][name=route]').val('');
});

// Update the "Choose file ..." with the file name
$('.custom-file-input').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName.replace(/^.*\\/, ""));
});