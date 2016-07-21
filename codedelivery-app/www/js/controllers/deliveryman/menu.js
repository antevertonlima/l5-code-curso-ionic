angular.module('starter.controllers')
.controller('DeliverymanMenuCtrl',
	['$scope', '$state', '$ionicLoading', 'Logged',
    function($scope, $state, $ionicLoading, Logged){
    	$scope.user = [];

    	$ionicLoading.show({
        	template: 'Caregando...'
        });

    	Logged.authenticated({include: 'client'}, function(data){
    		$scope.user = data.data;
        	$ionicLoading.hide();
    	},function(responseError){
    		$ionicLoading.hide();
    	});
}]);