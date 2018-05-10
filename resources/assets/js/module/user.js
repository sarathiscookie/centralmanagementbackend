/**
 * Created by php on 10-May-18.
 */

$(function () {
    /* Checking for the CSRF token */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* Delete user details*/
    $("body").on("click", ".deleteUser", function(e) {
        e.preventDefault();
        var delId  = $(this).parent().data("del");

        $.ajax({
            url: '/user/'+delId,
            dataType: 'JSON',
            type: 'DELETE',
            data: { delId: delId }
        })
            .done(function( data ) {
                if(data.response === 'success') {
                    var redirect_url = '/user';
                    $( "#warning" ).hide();
                    window.location.href = redirect_url;
                }
            })
            .fail(function(data, jqxhr, textStatus, error) {
                if( data.status === 422 ) {
                    $( "#warning" ).show();
                    var warning = data.responseJSON;
                    errorsHtml = '<div class="alert alert-info"><ul>';
                    $.each( warning , function( key, value ) {
                        errorsHtml += '<li>' + value + '</li>';
                    });
                    errorsHtml += '</ul></div>';
                    $( "#warning" ).html( errorsHtml );
                }
            });

    });

});

