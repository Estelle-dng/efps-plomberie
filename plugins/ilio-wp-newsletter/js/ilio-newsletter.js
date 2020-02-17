/*================================================================================== */
/* Jquery START ==================================================================== */
jQuery(document).ready(function ($) {
    "use strict";

    $('#form-newsletter').on('submit', function(ev){

        $('.notice-newsletter').hide();

        var email = $(this).find('input[name="parker_newsletter"]').val();

        $.ajax({
            type: "POST",
            cache: false,
            url: liliouL10n.admin_ajax_uri,
            data: { action : 'ilio_newsletter_insert', email : email },
            clearForm : false,
            success: function (responses) {
                var obj = JSON.parse(responses);

                if (obj.error != true) {
                    $('#form-newsletter').slideUp();
                }

                $('.notice-newsletter').empty().append(obj.msg);
                $('.notice-newsletter').show();
            },
            error: function (responses) {
                alert(liliouL10n.errorAjax);
            }
        });

        return ev.preventDefault();

    });

    $('.notice-newsletter').hide();

});
