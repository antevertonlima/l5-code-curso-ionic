angular.module('starter.controllers')
.controller('DeliverymanOrderCtrl',
	['$scope', '$state', '$ionicPopup', '$cart', 'Order', '$ionicLoading',
    function($scope, $state, $ionicPopup, $cart, Order, $ionicLoading){
    	$scope.orders = [];
		$ionicLoading.show({ template: 'Carregando...' });
		$scope.doRefresh = function () {
			getOrders().then(function(data){
				$scope.orders = data.data;
				$scope.$broadcast('scroll.refreshComplete');
			},function(dataError){
				$scope.$broadcast('scroll.refreshComplete');
				$ionicPopup.alert({
					title: 'Advertência',
					template: 'Ocorreu um erro ao resgatar seus pedidos!'
				})
			});
		}
		$scope.openOrderDetail = function (order) {
			$state.go('client.orders_detail', {id: order.id});
		}
		function getOrders(){
			return Order.query({
				id: null,
				orderBy: 'created_at',
				sortedBy: 'desc'
			}).$promise;
		}
		getOrders().then(function(data){
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