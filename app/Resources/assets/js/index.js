(function () {
    console.log("angular loaded!");

    angular.module('dresslab', ['emguo.poller', 'ngResource', 'nya.bootstrap.select']);

    // Selezione sidebar
    $('.option').click(function (e) {
        $(this).toggleClass('selected');
        $(this).siblings().removeClass('selected');
    })
})();
