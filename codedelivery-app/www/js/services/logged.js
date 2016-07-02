angular.module('starter.services')
.factory('Logged',['$resource', 'appConfig',
    function($resource, appConfig){
		return $resource(appConfig.baseUrl + '/api/authenticated', {}, {
        	query: {
        		isArray: false
        	}
        });
}]);