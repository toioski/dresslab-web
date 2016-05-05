(function () {
    function GuardarobaController($resource, poller) {
        var $this = this;
        this.vestiti = {};
        // Define your resource object.
        var myResource = $resource('/camerino/dress/list');


        // Get poller. This also starts/restarts poller.
        var myPoller = poller.get(myResource, {
            action: "query"
        });

        // Update view. Since a promise can only be resolved or rejected once but we want
        // to keep track of all requests, poller service uses the notifyCallback. By default
        // poller only gets notified of success responses.
        myPoller.promise.then(null, null, function(result){
            $this.vestiti = result;
            console.log(result); 
        });
    }

    angular.module('dresslab')
        .controller('GuardarobaController', ['$resource','poller', GuardarobaController]);
})();
