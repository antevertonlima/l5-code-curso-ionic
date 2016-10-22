angular.module('starter.controllers')
.controller('DeliverymanViewOrderCtrl',
	['$scope', '$stateParams', '$ionicPopup', 'DeliverymanOrder', '$ionicLoading','$cordovaGeolocation',
    function($scope, $stateParams, $ionicPopup, DeliverymanOrder, $ionicLoading, $cordovaGeolocation){
        var watch;
        $scope.order = {};
        $ionicLoading.show({ template: 'Carregando...' });
        DeliverymanOrder.get({id: $stateParams.id, include: "items,cupom"},function(data){
        	$scope.order = data.data;
        	$ionicLoading.hide();
        },function(dataError){
        	$ionicLoading.hide();
        });

        $scope.goToDelivery = function (){
            $ionicPopup.alert({
                title: 'Advertência',
                template: 'Para parar a localização de ok!'
            }).then(function(){
                stopWatchPosition();
            });
            DeliverymanOrder.updateStatus({id: $stateParams.id},{status: 1},function(data){
                var watchOptions = {
                    timeout: 3000,
                    enableHighAccuracy: false
                };
                watch = $cordovaGeolocation.watchPosition(watchOptions);
                watch.then(null,
                    function(responseError){
                        console.log(responseError);
                    },function(position){
                        console.log(position);
                        DeliverymanOrder.geo({id: $stateParams.id},{
                            lat: position.coords.latitude,
                            long: position.coords.longitude
                        },function(data){
                            console.log(data);
                        });
                    });
            });
        };
        function stopWatchPosition(){
            if (watch && typeof watch == 'object' && watch.hasOwnProperty('watchID')) {
                $cordovaGeolocation.clearWatch(watch.watchID);
            }
        }

}]);