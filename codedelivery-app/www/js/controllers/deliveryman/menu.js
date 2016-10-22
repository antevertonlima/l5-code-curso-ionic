angular.module('starter.controllers')
.controller('DeliverymanMenuCtrl',
	['$scope', '$state', '$ionicLoading', 'UserData','$logout',
    function($scope, $state, $ionicLoading, UserData, $logout){
    	$scope.user = UserData.get();

		$scope.logout = function () {
			$logout.logOff();
			$state.go('login');
		};
}]);