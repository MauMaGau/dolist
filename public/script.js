$(document).ready(function(){

    $('.js-show-control').on('click', function(e) {
        e.preventDefault();
        $('.js-show').hide();
        $($(this).data('show')).toggle();
    })

});