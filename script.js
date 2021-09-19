$(document).ready(function () {
    $('#hideShow').hide();
});


$(function () {
    $('#fileToUpload').change(function(evnet){
        var x = URL.createObjectURL(event.target.files[0]);
        $('#fileUpload').attr("srcset", x);
        $('#hideShow').show();
        // console.log('show');
    });
});
