angular.module('starter.controllers')
.controller('ClientOrdersCtrl',
	['$scope', '$state', '$ionicPopup', '$cart', 'Order', '$ionicLoading',
    function($scope, $state, $ionicPopup, $cart, Order, $ionicLoading){
    	$scope.orders = [];
		$ionicLoading.show({ template: 'Carregando...' });
		Order.query({id: null},function(data){
			$scope.orders = data.data;
			$ionicLoading.hide();
		},function(dataError){
			$ionicLoading.hide();
			$ionicPopup.alert({
				title: 'Advertência',
				template: 'Ocorreu um erro ao resgatar seus pedidos!'
			})
		});
}]);