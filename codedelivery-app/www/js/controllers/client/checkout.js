angular.module('starter.controllers')
.controller('ClientCheckoutCtrl',
	['$scope', '$state', '$ionicPopup', '$cart', 'Logged',
    function($scope, $state, $ionicPopup, $cart, Logged){
    	Logged.authenticated({include: 'client'}, function(data){
    		console.log(data.data);
    	},function(responseError){
    		console.log(responseError);
    	});
    	var cart = $cart.get();
    	$scope.items = cart.items;
    	$scope.total = cart.total;
}]);