// Pipeline: permette di eseguire i task in maniera sincrona seguendo l'ordine imposto,
// altrimenti normalmente Gulp lavora asicronamente eseguendo tutti i task contemporanemante.
// Fonte: https://knpuniversity.com/screencast/gulp/on-end-async-and-listeners
var Q = require('q');

var Pipeline = function(app) {
    this.entries = [];
    this.app = app;
};
Pipeline.prototype.add = function() {
    this.entries.push(arguments);
};
Pipeline.prototype.run = function(callable) {
    var deferred = Q.defer();
    var i = 0;
    var entries = this.entries;
    var app = this.app;

    var runNextEntry = function() {
        // see if we're all done looping
        if (typeof entries[i] === 'undefined') {
            deferred.resolve();
            return;
        }

        // pass app as this, though we should avoid using "this"
        // in those functions anyways
        callable.apply(app, entries[i]).on('end', function() {
            i++;
            runNextEntry();
        });
    };
    runNextEntry();

    return deferred.promise;
};

module.exports = Pipeline;