$(function() {
    console.log( "ready!" );

    // Selezione sidebar
    $('.option').click(function(e) {
        $(this).toggleClass('selected');
        $(this).siblings().removeClass('selected');
    })
});
