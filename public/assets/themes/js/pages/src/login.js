/* ------------------------------------------------------------------------------
*
*  Login page
*
* ---------------------------------------------------------------------------- */

$(function() {
    
    // default initialization
    $('.styled, .multiselect-container input').uniform({
        radioClass: 'choice'
    });

    var _tn = $('meta[name="_tn"]').attr('content');

    var btn = $('.btn-loading');

    // show loading button
    $('.btn-loading').click(function () {
        btn.button('loading');
    });

    $('#login-form').on('submit', function (e) {
        e.preventDefault();
        var me = $(this);

        // notified running
        me.data('requestRunning', true);

        $.ajax({
            url: me.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            cache: false,
        })
            .done(function (json) {
                var valid = json.valid_form;
                var succeed = json.succeed;
                var msg = json.messages;
                
                // replace token with new value
                $('input[name="'+ _tn +'"]').val(json.sec_h);

                if (typeof valid !== 'undefined' && valid === true) {
                    $('label#basic-error').remove();
                    $('.form-group').removeClass('has-error');
                    $('#messages').html(msg);

                    if (succeed)
                    {
                        $('#messages').children('.alert').remove();

                        $('#messages').html(msg);

                        setTimeout(function () {
                            var uri = location.protocol + '//' + location.host;
                            window.location.replace(uri + '/dashboard');
                        }, 500);
                    }

                    // reset the form
                    me[0].reset();
                    $('input#identity').focus();

                } else {
                    $('.alert').remove();
                    $.each(json.validation_message_errors, function (key, value) {
                        var element = $('#' + key + '_error');
                        var setfocus = $('input#' + key);
                        element.empty();
                        element.closest('div.form-group')
                        .removeClass('has-error')
                        .addClass(value.length > 0 ? 'has-error' : '');
                        element.html(value);

                        // focusing first class of error
                        setfocus.removeClass('error')
                        .addClass(value.length > 0 ? 'error' : '');
                        $("input.error:first").focus();
                    });
                }
            })

            .fail(function (xhr, textStatus, errorThrown) {
                // get error text
                var msger = $(xhr.responseText).find('.er-column > p').text();
                // set different message
                if (xhr.status === 403) {
                    swal(
                        {
                            title:
                                "<span style='color:#ef5350'>" +
                                xhr.statusText +
                                '</span>',
                            text: msger,
                            confirmButtonColor: '#ef5350',
                            type: 'error',
                            html: true,
                        },
                        function (isConfirm) {
                            if (isConfirm) {
                                location.reload();
                            }
                        }
                    );
                } else {
                    swal(
                        {
                            title:
                                "<span style='color:#ef5350'>An error has occurred</span>",
                            text:
                                "If this error persists, contact your system administrator.<br/><span style='color:#ef5350; font-size:12px'>ERROR: " +
                                xhr.status +
                                '</span>',
                            confirmButtonColor: '#ef5350',
                            type: 'error',
                            html: true,
                        },
                        function (isConfirm) {
                            if (isConfirm) {
                                location.reload();
                            }
                        }
                    );
                }
            })

            .always(function () {
                // reset loading button
                btn.button('reset');
                me.data('requestRunning', false);
            });
    });
});
