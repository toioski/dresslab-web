(function () {
    function DettaglioController($timeout, $resource, poller) {
        var $this = this;
        this.vestiti = {};
        this.image = {};
        this.richiesta = true;
        this.loading = false;

        this.toggleRichiesta = function () {
            console.log("dio porco");
            $this.loading = true;
            $timeout(function() {
                $this.loading = false;
                $this.richiesta = !$this.richiesta;
            }, 400);
        };
        // Define your resource object.
        var myResource = $resource('/camerino/dress/list');


        // Get poller. This also starts/restarts poller.
        var myPoller = poller.get(myResource, {
            action: "query"
        });

        // Update view. Since a promise can only be resolved or rejected once but we want
        // to keep track of all requests, poller service uses the notifyCallback. By default
        // poller only gets notified of success responses.
        myPoller.promise.then(null, null, function (result) {
            $this.vestiti = result;
            $('#number-capi').text(result.length);
            console.log(result);
            //@TODO togliere PORCODIOOO
            myPoller.stop();
        });

    }

    angular.module('dresslab')
        .controller('DettaglioController', ['$timeout', '$resource', 'poller', DettaglioController]);
})();
