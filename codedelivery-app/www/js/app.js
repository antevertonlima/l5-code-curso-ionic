// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter.controllers',[]);
angular.module('starter.services',[]);
angular.module('starter.filters',[]);

angular.module('starter',
  ['ionic','starter.controllers','starter.services','starter.filters',
  'angular-oauth2','ngResource','ngCordova','uiGmapgoogle-maps','pusher-angular'])

.constant('appConfig', {
  baseUrl: 'http://codedelivery',
  clientId: 'appid01',
  clientSecret: 'secret', // optional
  grantPath: '/oauth/access_token',
  pusherKey: '81c37eda1a576a3e1b58'
})

.run(function($ionicPlatform, $window, appConfig) {
  $window.client = new Pusher(appConfig.pusherKey);
  $ionicPlatform.ready(function() {
    if(window.cordova && window.cordova.plugins.Keyboard) {
      // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
      // for form inputs)
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

      // Don't remove this line unless you know what you are doing. It stops the viewport
      // from snapping when text inputs are focused. Ionic handles this internally for
      // a much nicer keyboard experience.
      cordova.plugins.Keyboard.disableScroll(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
  });
})
.config(function($stateProvider, $urlRouterProvider, OAuthProvider, 
                 OAuthTokenProvider, appConfig, $provide){
    // $urlRouterProvider.otherwise('/');
    OAuthProvider.configure({
        baseUrl: appConfig.baseUrl,
        clientId: appConfig.clientId,
        clientSecret: appConfig.clientSecret, // optional
        grantPath: appConfig.grantPath
    });

    OAuthTokenProvider.configure({
        name: 'token',
        options: {
            secure : false
        }
    });

    $stateProvider
        // .state('inicio', {
        //     url: '/',
        //     templateUrl: 'templates/index.html'
        // })
        .state('login', {
            url: '/login',
            templateUrl: 'templates/login.html',
            controller: 'LoginCtrl'
        })
        .state('home', {
            url: '/',
            templateUrl: 'templates/home.html',
            controller: 'HomeCtrl'
        })
        .state('client',{
          abstract: true,
          cache: false,
          url: '/client',
          templateUrl: 'templates/client/menu.html',
          controller: 'ClientMenuCtrl'
        })
        .state('client.checkout',{
            cache: false,
            url:'/checkout',
            templateUrl: 'templates/client/checkout.html',
            controller: 'ClientCheckoutCtrl'
        })
        .state('client.checkout_item_detail',{
          url:'/checkout/detail/:index',
          templateUrl: 'templates/client/checkout-detail.html',
          controller: 'ClientCheckoutDetailCtrl'
        })
        .state('client.checkout_successful',{
            cache: false,
            url:'/checkout/successful',
            templateUrl: 'templates/client/checkout-successful.html',
            controller: 'ClientCheckoutSuccessfulCtrl'
        })
        .state('client.orders',{
            url:'/orders',
            templateUrl: 'templates/client/orders.html',
            controller: 'ClientOrdersCtrl'
        })
        .state('client.orders_detail',{
            url:'/orders_detail/:id',
            templateUrl: 'templates/client/order-detail.html',
            controller: 'ClientOrderDetailCtrl'
        })
        .state('client.view_delivery',{
            cache: false,
            url:'/view_delivery/:id',
            templateUrl: 'templates/client/view_delivery.html',
            controller: 'ClientViewDeliveryCtrl'
        })
        .state('client.view_products',{
          url:'/view_products',
          templateUrl: 'templates/client/view-product.html',
            controller: 'ClientViewProductCtrl'
        })
        .state('deliveryman',{
          abstract: true,
          cache: false,
          url: '/deliveryman',
          templateUrl: 'templates/deliveryman/menu.html',
          controller: 'DeliverymanMenuCtrl'
        })
        .state('deliveryman.order',{
            url:'/order',
            templateUrl: 'templates/deliveryman/order.html',
            controller: 'DeliverymanOrderCtrl'
        })
        .state('deliveryman.view_order',{
            cache: false,
            url:'/view_order/:id',
            templateUrl: 'templates/deliveryman/view_order.html',
            controller: 'DeliverymanViewOrderCtrl'
        })

		$urlRouterProvider.otherwise('/login');

		$provide.decorator('OAuthToken',['$localStorage', '$delegate', 
    function($localStorage, $delegate){
			Object.defineProperties($delegate,{
				setToken: {
					value: function(data){
						return $localStorage.setObject('token', data);
					},
					enumerable: true,
					configurable: true,
					whitable: true
				},
				getToken: {
					value: function(){
						return $localStorage.getObject('token');
					},
					enumerable: true,
					configurable: true,
					whitable: true
				},
				removeToken:{
					value: function(){
						return $localStorage.setObject('token', null);
					},
					enumerable: true,
					configurable: true,
					whitable: true
				}
			});
			return $delegate;
		}]);
});