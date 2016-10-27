angular.module('starter.services')
.service('Redirect',['$state','appConfig',
    function($state,appConfig){
		this.redirectAfterLogin = function (role) {
			$state.go(appConfig.redirAfterLogin[role]);
		};
}]);