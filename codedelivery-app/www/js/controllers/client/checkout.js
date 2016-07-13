angular.module('starter.controllers')
.controller('ClientCheckoutCtrl',
	['$scope', '$state', '$ionicPopup', '$cart',
    function($scope, $state, $ionicPopup, $cart){
    	var cart = $cart.get();
    	$scope.items = cart.items;
    	$scope.total = cart.total;
}]);