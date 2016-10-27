angular.module('starter.controllers')
.controller('LoginCtrl',
    ['$scope', 'OAuth', '$state', '$ionicPopup', 'UserData','Logged', '$localStorage','Redirect',
    function($scope, OAuth, $state, $ionicPopup, UserData, Logged, $localStorage, Redirect){

        $scope.user = {
            username: '',
            password: ''
        };

        $scope.login = function (){
            var promise = OAuth.getAccessToken($scope.user);
            promise
                .then(function(data){
                    var token = $localStorage.get('device_token');
                    return Logged.updateDeviceToken({},{device_token: token}).$promise;
                })
                .then(function(data){
                    return Logged.authenticated({include: 'client'}).$promise;
                })
                .then(function(data){
                    UserData.set(data.data);
                    Redirect.redirectAfterLogin(UserData.get().role);
                }, function(responseError) {
                    UserData.set(null);
                    $ionicPopup.alert({
                        title: 'Advertência',
                        template: 'Login e/ou senha inválidos'
                    });
                    console.debug(responseError);
                });
        };
}]);