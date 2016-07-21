angular.module('starter.controllers')
.controller('ClientCheckoutCtrl',
	['$scope', '$state', '$ionicPopup', '$cart', 'Order', '$ionicLoading', 'Cupom', '$cordovaBarcodeScanner',
    function($scope, $state, $ionicPopup, $cart, Order, $ionicLoading, Cupom, $cordovaBarcodeScanner){
		var cart = $cart.get();
		$scope.cupom = cart.cupom;
    	$scope.items = cart.items;
    	$scope.total = $cart.getTotalFinal();
		$scope.removeItem = function (i) {
			$cart.removeItem(i);
			$scope.items.splice(i,1);
			$scope.total = $cart.getTotalFinal();
		}
		$scope.openProductDetail = function (i) {
			$state.go('client.checkout_item_detail',{index: i});
		}
		$scope.openListProducts = function () {
			$state.go('client.view_products');
		}
		$scope.save = function () {
			var o = {items: angular.copy($scope.items)};
			angular.forEach(o.items,function (item) {
				item.product_id = item.id;
			});
			$ionicLoading.show({ template: 'Carregando...' });
			if ($scope.cupom.value){
				o.cupom_code = $scope.cupom.code;
			}
			Order.save({id: null}, o,function (data) {
				$ionicLoading.hide();
				$state.go('client.checkout_successful');
			},function (resError) {
				$ionicLoading.hide();
				$ionicPopup.alert({
					title: 'Advertência',
					template: 'Erro ao finalizar o pedido! Tente novamente!'
				});
			});
		};
		$scope.readBarCode = function () {
			$cordovaBarcodeScanner.scan()
			  .then(function(barcodeData) {
				getValueCupom(barcodeData.text);
			  }, function(error) {
				$ionicPopup.alert({
					title: 'Advertência',
					template: 'Não foi possivel ler o cupom! Tente novamente!'
				});
			  });
		};
		$scope.removeCupom = function () {
			$cart.removeCupom();
			$scope.cupom = $cart.get().cupom;
			$scope.total = $cart.getTotalFinal();
		};
		function getValueCupom(code) {
			$ionicLoading.show({ template: 'Carregando...' });
			Cupom.get({code: code},function (data) {
				var cupomCode = data.data.code, cupomValue = data.data.value;
				if (cupomValue > $scope.total) {
					$cart.setCupom(cupomCode, cupomValue);
					$scope.cupom = $cart.get().cupom;
					$scope.total = $cart.getTotalFinal();
					$ionicLoading.hide();
				} else(){
					$ionicLoading.hide();
					$ionicPopup.alert({
						title: 'Advertência',
						template: 'Para utilizar este cupom você precisa adicionar mais  itens ao seu pedido!'
					});
				}
			},function (responseError) {
				$ionicLoading.hide();
				$ionicPopup.alert({
					title: 'Advertência',
					template: 'Cupom inválido!'
				});
			});
		};
}]);