(function () {
    function DettaglioController($timeout, $resource, poller) {
        var $this = this;
        this.vestiti = {};
        this.image = {};
        this.richiesta = false;
        this.loading = false;
        this.angularLoaded = true;

        var parts = window.location.href.split('/');
        this.id = parts[parts.length - 1];
        this.options = {sizes: [], colors: []};

        var tagliaResource = $resource('/camerino/dress/' + this.id + '/taglie');
        var coloreResource = $resource('/camerino/dress/' + this.id + '/colori');

        this.toggleRichiesta = function () {
            $this.loading = true;
            $timeout(function () {
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
            var articoloCorrente = result.filter(function (value) {
                console.log("iterazione: " + value.id);
                console.log("valore: " + $this.id);
                return value.id == $this.id;
            });
            $this.tagliaCorrente = articoloCorrente[0].taglia;
            $this.coloreCorrente = articoloCorrente[0].colore;
            console.log("taglia corrente: " + $this.tagliaCorrente);
            console.log("colore corrente: " + $this.coloreCorrente);

            tagliaResource.get(function (result) {
                $this.options.sizes = result.taglie;
                $this.taglia = $this.tagliaCorrente;
            });

            coloreResource.get(function (result) {
                $this.options.colors = result.colori;
                $this.colore = $this.coloreCorrente;
            });

            $('#number-capi').text(result.length);
            console.log(result);
            myPoller.stop();
        });

        //@TODO: poller messaggio
        this.messaggioArrivato = false;
        var messaggioCommessaResource = $resource('/camerino/getlasttaskmessage');

        // Get poller. This also starts/restarts poller.
        var commessaPoller = poller.get(messaggioCommessaResource);

        commessaPoller.promise.then(null, null, function (result) {
            if(result.success) {
                $this.messaggioArrivato = true;
                $this.messaggioCommessa = result.message;
            }
        });

        this.openRequest = function(){
            var id = $this.id;
            var taglia = $this.taglia;
            var colore = $this.colore;
            var requestResource = $resource('/camerino/product/'+ id + '/taglia/' + taglia + '/colore/' + colore.colore);

            requestResource.get(function(result){
                console.log("chiamata POST fatta: ", result);
                if (result.success) {
                    $this.toggleRichiesta();
                } else {
                    $this.errorMessage = result.message;
                }

            });
        }

    }

    angular.module('dresslab')
        .controller('DettaglioController', ['$timeout', '$resource', 'poller', DettaglioController]);
})();
