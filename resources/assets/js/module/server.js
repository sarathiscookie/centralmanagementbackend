/**
 * Created by php on 09-May-18.
 */
$(function () {
    /* Checking for the CSRF token */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* Update server detaisl */
    $("body").on("click", ".updateServer", function(e) {
        e.preventDefault();
        var id                = $(this).data("id");
        var updateServer      = $(this).val();
        var serverName        = $("#updateServerName_"+id).val();
        var serverHost        = $("#updateServerHost_"+id).val();
        var serverLocation    = $("#updateServerLocation_"+id).val();
        var serverLimit       = $("#updateServerLimit_"+id).val();
        var serverDescription = $("#updateServerDescription_"+id).val();

        $.ajax({
            url: '/server/'+id,
            dataType: 'JSON',
            type: 'PUT',
            data: { serverName: serverName, serverHost: serverHost, serverLocation: serverLocation, serverLimit: serverLimit, serverDescription: serverDescription, updateServer: updateServer }
        })
            .done(function( data ) {
                if(data.response === 'success') {
                    var redirect_url = '/server';
                    $( "#errors" ).hide();
                    $( "#warning" ).hide();
                    window.location.href = redirect_url;
                 }
            })
            .fail(function(data, jqxhr, textStatus, error) {
                if( data.status === 422 ) {
                 var errors = data.responseJSON.errors;
                 if(errors) {
                 $( "#warning" ).hide();
                 $( "#errors" ).show();
                 errorsHtml = '<div class="alert alert-danger"><ul>';
                 $.each( errors , function( key, value ) {
                 errorsHtml += '<li>' + value + '</li>';
                 });
                 errorsHtml += '</ul></div>';
                 $( "#errors" ).html( errorsHtml );
                 }
                 else {
                 $( "#errors" ).hide();
                 $( "#warning" ).show();
                 var warning = data.responseJSON;
                 errorsHtml = '<div class="alert alert-info"><ul>';
                 $.each( warning , function( key, value ) {
                 errorsHtml += '<li>' + value + '</li>';
                 });
                 errorsHtml += '</ul></div>';
                 $( "#warning" ).html( errorsHtml );
                 }
                 }
            });
    });

    /* Delete server details */
    $("body").on("click", ".deleteServer", function(e) {
        e.preventDefault();
        var delId  = $(this).parent().data("del");

        $.ajax({
            url: '/server/'+delId,
            dataType: 'JSON',
            type: 'DELETE',
            data: { delId: delId }
        })
            .done(function( data ) {
                if(data.response === 'success') {
                    var redirect_url = '/server';
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
