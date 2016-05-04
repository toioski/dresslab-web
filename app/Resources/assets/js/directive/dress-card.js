(function() {
    function DressCard(){
        return {
            restrict: 'E',
            replace: true,
            scope: {
                id: '=',
                description:'=',
                price: '=',
                size: '=',
                color: '='
            },
            templateUrl: '/template/dresscard',
            link: function(scope, element) {
                console.log("dresscard");
            }
        };
    }

    angular.module('dresslab')
        .directive('dressCard', DressCard);
})();