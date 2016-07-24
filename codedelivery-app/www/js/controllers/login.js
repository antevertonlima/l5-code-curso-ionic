angular.module('starter.controllers')
.controller('LoginCtrl',
    ['$scope', 'OAuth', '$state', '$ionicPopup', 'UserData','Logged', 
    function($scope, OAuth, $state, $ionicPopup, UserData, Logged){

        $scope.user = {
            username: '',
            password: ''
        };

        $scope.login = function (){
            var promise = OAuth.getAccessToken($scope.user);
            promise
                .then(function(data){
                    return Logged.authenticated({include: 'client'}).$promise;
                })
                .then(function(data){
                    UserData.set(data.data);
                    var user = UserData.get();
                    if(user.role == 'client'){
                        $state.go('client.checkout');
                    }else{
                        $state.go('deliveryman.order');
                    }
                }, function(responseError) {
                    UserData.set(null);
                    $ionicPopup.alert({
                        title: 'Advertência',
                        template: 'Login e/ou senha inválidos'
                    })
                    console.debug(responseError);
                });
        };
}]);