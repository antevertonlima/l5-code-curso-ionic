angular.module('starter.controllers')
.controller('RegisterCtrl',
    ['$scope', 'OAuth', '$state', '$ionicPopup', 'UserData','Logged', '$localStorage','Redirect','appConfig','$http',
    function($scope, OAuth, $state, $ionicPopup, UserData, Logged, $localStorage, Redirect, appConfig, $http){

        $scope.user = {
            username: '',
            password: ''
        };

        $scope.newUser = {
            name:  '',
            email: '',
            password: ''
        };
        
        $scope.register = function (newUser) {
            $http.post(appConfig.baseUrl + '/api/auth/register', $scope.newUser)
                .then(function (data) {
                    $scope.user = {
                        username: $scope.newUser.email,
                        password: $scope.newUser.password
                    };
                    console.log($scope.user);
                    $scope.login();
                });
        }

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