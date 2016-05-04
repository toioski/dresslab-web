(function () {
    function PollingService($http, $timeout) {
        var data = {resp: {}, count: 0};
        var count = 0;
        var poller = function () {
            count++;
            $http.get('/template/test').then(function (r) {

                data.resp = r.data;
                data.count = count;
                console.log(data);
                $timeout(poller, 500);
            });

        };
        poller();

        return {
            data: data
        }
    }
    
    angular.module('dresslab')
        .factory('PollingService', ['$http', '$timeout', PollingService]);
})();
