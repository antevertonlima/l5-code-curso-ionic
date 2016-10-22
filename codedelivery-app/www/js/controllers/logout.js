angular.module('starter.controllers')
.controller('LogoutCtrl',
    ['$scope', 'OAuthToken', 'UserData', '$state', '$ionicHistory','$localStorage',
        function($scope, OAuthToken, UserData, $state, $ionicHistory,$localStorage){
            $scope.logout = function(){
                OAuthToken.removeToken();
                UserData.set('');
                $ionicHistory.clearCache();
                $ionicHistory.clearHistory();
                $ionicHistory.nextViewOptions({
                    disableBack: true,
                    historyRoot: true,
                });
                $state.go('login');
            }
}]);