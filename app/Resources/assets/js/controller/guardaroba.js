(function () {
    function GuardarobaController(PollingService) {
        this.data = PollingService.data;
    }

    angular.module('dresslab')
        .controller('GuardarobaController', ['PollingService', GuardarobaController]);
})();
