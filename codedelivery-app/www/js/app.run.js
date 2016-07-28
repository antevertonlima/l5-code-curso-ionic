angular.module('starter.run')
.run(['PermissionStore','RoleStore','OAuth','UserData',
    function(PermissionStore,RoleStore,OAuth,UserData){
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
}]);