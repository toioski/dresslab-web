(function() {
    function DressCard(){
        return {
            restrict: 'E',
            replace: true,
            scope: {
                title:'@',
                btntext: '@',
                pathimg: '@',
                link: '@'
            },
            templateUrl: '../../views/components/tile.html',
            link: function(scope, element) {
                console.log("tile");
            }
        };
    }

    angular.module('dresslab')
        .directive('dress-card', DressCard);
})();