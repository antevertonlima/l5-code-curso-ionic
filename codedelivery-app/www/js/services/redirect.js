angular.module('starter.services')
.service('$redirect',['$state','UserData','appConfig',
    function($state,UserData,appConfig){
		var user = UserData.get();
		this.redirectAfterLogin = function () {
			$state.go(appConfig.redirectAfterLogin[user.role]);
		};
}]);