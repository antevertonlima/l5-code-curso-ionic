// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter.controllers',[]);
angular.module('starter.services',[]);
angular.module('starter.filters',[]);
angular.module('starter.run',[]);

angular.module('starter',
  ['ionic','ionic.cloud',
  'starter.controllers','starter.services','starter.filters','starter.run',
  'angular-oauth2','ngResource','ngCordova','uiGmapgoogle-maps',
  'pusher-angular','permission','http-auth-interceptor','ionic-toast'])

.constant('appConfig', {
  baseUrl: 'http://dtsce.top',
  clientId: 'appid01',
  clientSecret: 'secret', // optional
  grantPath: '/oauth/access_token',
  pusherKey: '81c37eda1a576a3e1b58',
  redirAfterLogin: {
      client: 'client.orders',
      deliveryman: 'deliveryman.order'
  }
})

.run(function($window, appConfig, $localStorage,ionicToast,$ionicPush,$rootScope) {
  $window.client = new Pusher(appConfig.pusherKey);
  ionic.Platform.ready(function() {
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

    $ionicPush.register().then(function(t) {
      $localStorage.set('device_token',t.token)
      return $ionicPush.saveToken(t);
    }).then(function(t) {
      console.log('Token saved:', t.token);
    });

    $rootScope.$on('cloud:push:notification', function(event, data) {
      var msg = data.message;
      ionicToast.show(msg.text, 'top', true, 2500);
    });

  });
})
.config(function($stateProvider, $urlRouterProvider, OAuthProvider, 
                 OAuthTokenProvider, appConfig, $provide, $ionicCloudProvider){
  $ionicCloudProvider.init({
    "core": {
      "app_id": "cbb99bb1"
    },
    "push": {
      "sender_id": "825417114018",
    }
  });
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
            cache: false,
            url: '/login',
            templateUrl: 'templates/login.html',
            controller: 'LoginCtrl'
        })
        .state('logout', {
            url: '/logout',
            controller: 'LogoutCtrl'
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
          controller: 'ClientMenuCtrl',
          data: {
            permissions: {
              only: ['clientRole']
            }
          }
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
          controller: 'DeliverymanMenuCtrl',
          data: {
            permissions: {
              only: ['deliverymanRole']
            }
          }
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

    $provide.decorator('oauthInterceptor',['$delegate', 
    function($delegate){
      delete $delegate['responseError'];
      return $delegate;
    }]);
});