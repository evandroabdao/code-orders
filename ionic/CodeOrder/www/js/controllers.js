angular.module('starter.controllers', [])
	.controller('LoginCtrl', ['$scope', '$http', '$state','OAuth','OAuthToken',
	    function($scope, $http, $state, OAuth, OAuthToken){
			$scope.login = function(data){
				OAuth.getAccessToken(data).then(function(){
					$state.go('tabs.orders');
				}, function(data){
					$scope.error_login = "Usuário ou senha inválidos";
				});
			}
		}
	])
	.controller('OrdersCtrl', ['$scope', '$http', '$state', 
		function ($scope, $http, $state){
			
			$scope.getOrders = function(){
				$http.get('http://192.168.184.128:8888/orders').then(
					function(data){
						$scope.orders = data.data._embedded.orders;
					}
				);
			};
			
			$scope.doRefresh = function(){ 
				$scope.getOrders();
				$scope.$broadcast('scroll.refreshComplete');
			};
			$scope.getOrders();
			
			$scope.goHome = function(){
				$state.go('home');
			};
		}
	])
	.controller('OrdersCreateCtrl', ['$scope', '$http', '$state', 
	                           function ($scope, $http, $state){
		
		$scope.clientes = [];
		$scope.users = [];
		$scope.formasPagamento = [];
		
		var carregarClientes = function(){
			$http.get('http://192.168.184.128:8888/clients').success(function(data, status){
				$scope.clientes = data._embedded.clients;
			});
		};
		
		var carregarUsers = function(){
			$http.get('http://192.168.184.128:8888/users').success(function(data, status){
				$scope.users = data._embedded.users;
			});
		};
		
		var carregarFormasPagamento = function(){
			$http.get('http://192.168.184.128:8888/ptypes').success(function(data, status){
				console.log(data);
				$scope.formasPagamento = data._embedded.ptypes;
			}).then(function(data, status){
				console.log(data);
				console.log(status);
			});
		};
		
		$scope.enviarPedido = function (data){
			$http.post('http://192.168.184.128:8888/orders', data)
			.then(
				function(){
					console.log(data);
				}
			);
		}; 
		
		$scope.goHome = function(){
			$state.go('home');
		};
		
		carregarClientes();
		carregarUsers();
		carregarFormasPagamento();
	}
	])
	.controller('HomeCtrl', ['$scope', '$http', '$state', 
       function ($scope, $http, $state){
			$scope.goOrders = function(){
				$state.go('tabs.orders');
			};
		}
	])
	;