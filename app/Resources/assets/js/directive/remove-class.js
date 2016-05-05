(function() {
    function RemoveClass(){
        return {
            restrict: 'A',
            link: function (scope, element, attrs) {
                element.removeClass(attrs.removeClass);
            }
        };
    }

    angular.module('dresslab')
        .directive('removeClass', RemoveClass);
})();