angular.module('starter.controllers')
.controller('ClientViewProductCtrl',
	['$scope', '$state', 'Product', '$ionicLoading','$localStorage',
    function($scope, $state, Product, $ionicLoading, $localStorage){
        $scope.products = [];
        $ionicLoading.show({
        	template: 'Caregando...'
        });
        Product.query({},function(data){
        	$scope.products = data.data;
        	$ionicLoading.hide();
        },function(dataError){
        	$ionicLoading.hide();
        });
}]);