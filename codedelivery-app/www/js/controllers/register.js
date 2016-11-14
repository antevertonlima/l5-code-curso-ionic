angular.module('starter.controllers')
.controller('RegisterCtrl',
    ['$scope', 'OAuth', '$state', '$ionicPopup', 'UserData','Logged', '$localStorage','Redirect','appConfig','$resource',
    function($scope, OAuth, $state, $ionicPopup, UserData, Logged, $localStorage, Redirect, appConfig, $resource){

        $scope.user = {
            username: '',
            password: ''
        };

        $scope.newUser = {
            name:  '',
            email: '',
            password: ''
        };

        var newUser = $resource(appConfig.baseUrl + '/auth/api-register',{},{
            query:{
                isArray: false
            }
        });

        $scope.register = function () {
            var user = new newUser({});
            user.name = $scope.newUser.name;
            user.email = $scope.newUser.email;
            user.password = $scope.newUser.password;
            user.$save().then(function (data) {
                $scope.user = {
                    username: $scope.newUser.email,
                    password: $scope.newUser.password
                };
                $scope.login();
            });
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