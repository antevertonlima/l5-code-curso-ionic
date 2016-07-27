angular.module('starter.controllers')
.controller('ClientViewProductCtrl',
	['$scope', '$state', 'Product', '$ionicLoading', '$localStorage', '$cart',
    function($scope, $state, Product, $ionicLoading, $localStorage, $cart){
        var page = 1;
        $scope.products = [];
        $scope.canMoreProducts = true;
        // $ionicLoading.show({ template: 'Carregando...' });

        getProduct().then(function(data){
        	$scope.products = data.data;
        	$ionicLoading.hide();
        },function(dataError){
        	$ionicLoading.hide();
        });

        $scope.addItem = function(item){
        	item.qtd = 1;
        	$cart.addItem(item);
        	$state.go('client.checkout');
        }

        $scope.loadModel = function () {
            getProduct().then(function (data) {
                $scope.products = $scope.products.concat(data.data);
                if ($scope.products.length == data.meta.pagination.total){
                    $scope.canMoreProducts = false;
                }
                page += 1;
                $scope.$broadcast('scroll.infiniteScrollComplete');
            });
        };
        function getProduct(){
            return Product.query({
                page: page
            }).$promise;
        };
}]);