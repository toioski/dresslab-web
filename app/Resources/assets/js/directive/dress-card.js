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
                color: '=',
                image: '='
            },
            templateUrl: '/template/dresscard',
            link: function(scope, element) {
                element.click(function(e) {
                    console.log(scope.id);
                    e.preventDefault();
                    window.location.href = "/camerino/dress/" + scope.id;
                })
            }
        };
    }

    angular.module('dresslab')
        .directive('dressCard', DressCard);
})();