angular.module('starter.controllers')
.controller('ClientOrdersCtrl',
	['$scope', '$state', '$ionicPopup', '$ionicActionSheet', '$cart', 'ClientOrder', '$ionicLoading', '$timeout',
    function($scope, $state, $ionicPopup, $ionicActionSheet, $cart, ClientOrder, $ionicLoading, $timeout){
		var page = 1;
    	$scope.orders = [];
		$scope.canMoreOrders = true;
		// $ionicLoading.show({ template: 'Carregando...' });
		$scope.doRefresh = function () {
			page = 1;
			$scope.orders = [];
			$scope.canMoreOrders = true;
			$scope.loadModel();
			$timeout(function () {
				$scope.$broadcast('scroll.refreshComplete');
			},200);
			// getOrders().then(function(data){
			// 	$scope.orders = data.data;
			// 	$scope.$broadcast('scroll.refreshComplete');
			// },function(dataError){
			// 	$scope.$broadcast('scroll.refreshComplete');
			// 	$ionicPopup.alert({
			// 		title: 'Advertência',
			// 		template: 'Ocorreu um erro ao resgatar seus pedidos!'
			// 	})
			// });
		};
		$scope.openOrderDetail = function (order) {
			$state.go('client.orders_detail', {id: order.id});
		};
		$scope.showActionSheet = function(order){
			$ionicActionSheet.show({
				buttons: [
					{text: 'Ver Detalhes'},
					{text: 'Acompanhar Entrega'}
				],
				titleText: 'O que Fazer?',
				cancelText: 'Cancelar',
				cancel: function(){
					//acao de cancelamento
				},
				buttonClicked: function(index){
					switch (index){
						case 0:
							$state.go('client.orders_detail', {id: order.id});
							break;
						case 1:
							$state.go('client.view_delivery', {id: order.id});
							break;
					}
				}
			});
		};
		$scope.loadModel = function () {
			getOrders().then(function (data) {
				$scope.orders = $scope.orders.concat(data.data);
				if ($scope.orders.length == data.meta.pagination.total){
					$scope.canMoreOrders = false;
				}
				page += 1;
				$scope.$broadcast('scroll.infiniteScrollComplete');
			});
		};
		function getOrders(){
			return ClientOrder.query({
				id: null,
				page: page,
				orderBy: 'created_at',
				sortedBy: 'desc'
			}).$promise;
		};

		// getOrders().then(function(data){
		// 	$scope.orders = data.data;
		// 	$ionicLoading.hide();
		// },function(dataError){
		// 	$ionicLoading.hide();
		// 	$ionicPopup.alert({
		// 		title: 'Advertência',
		// 		template: 'Ocorreu um erro ao resgatar seus pedidos!'
		// 	})
		// });
}]);