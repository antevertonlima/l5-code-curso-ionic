angular.module('starter.services')
.service('$logout',['OAuthToken', 'UserData', '$state', '$ionicHistory',
        function(OAuthToken, UserData, $state, $ionicHistory){

		this.logOff = function () {
			OAuthToken.removeToken();
            UserData.set('');
            $ionicHistory.clearCache();
            $ionicHistory.clearHistory();
            $ionicHistory.nextViewOptions({
                disableBack: true,
                historyRoot: true,
            });
            $state.go('login');
		};

}]);