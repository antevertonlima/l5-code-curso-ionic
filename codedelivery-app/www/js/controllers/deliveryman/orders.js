angular.module('starter.controllers')
.controller('DeliverymanOrderCtrl',
	['$scope', '$state', '$ionicPopup', '$cart', 'DeliverymanOrder', '$ionicLoading',
    function($scope, $state, $ionicPopup, $cart, DeliverymanOrder, $ionicLoading){
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
			$state.go('deliveryman.view_order', {id: order.id});
		}
		function getOrders(){
			return DeliverymanOrder.query({
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