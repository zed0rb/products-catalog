// tinycme WYSIWYG

tinymce.init({
    mode : "specific_textareas",
    editor_selector : "myTextEditor",
});

$(document).ready(function(){

    // checkbox checker
    $('.selectall').click(function() {
        $('.selectbox').prop('checked', $(this).prop('checked'));
    });

    $('.selectbox').change(function () {
        var total = $('.selectbox').length;
        var number = $('.selectbox:checked').lenght;
        if(total == number){
            $('.selectall').prop('checked', true);
        } else {
            $('.selectall').prop('checked', false);
        }
    });




});