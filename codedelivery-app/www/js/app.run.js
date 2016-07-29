angular.module('starter.run')
.run(['$state','PermissionStore','RoleStore','OAuth','UserData','$rootScope','authService','httpBuffer',
    function($state,PermissionStore,RoleStore,OAuth,UserData,$rootScope,authService,httpBuffer){
    PermissionStore.definePermission('userPermission',function(){
      return OAuth.isAuthenticated();
    });

    PermissionStore.definePermission('clientPermission',function(){
      var user = UserData.get();
      if (user == null || !user.hasOwnProperty('role')) {
      	return false;
      }
      return user.role == 'client';
    });
    RoleStore.defineRole('clientRole',['userPermission', 'clientPermission']);

    PermissionStore.definePermission('deliverymanPermission',function(){
      var user = UserData.get();
      if (user == null || !user.hasOwnProperty('role')) {
      	return false;
      }
      return user.role == 'deliveryman';
    });
    RoleStore.defineRole('deliverymanRole',['userPermission', 'deliverymanPermission']);

    $rootScope.$on('event:auth-loginRequired',function(event, data){
      switch(data.data.error){
        case 'access_denied':
          if (!$rootScope.refreshingToken) {
            $rootScope.refreshingToken = OAuth.getRefreshToken();
          }
          $rootScope.refreshingToken
          .then(function(data){
            authService.loginConfirmed();
            $rootScope.refreshingToken = null;
          },function(responseError){
            $state.go('logout');
          });
          break;
        case 'invalid_credentials':
          httpBuffer.rejectAll(data);
          break;
        default:
          $state.go('logout');
          break;
      }
    });
}]);