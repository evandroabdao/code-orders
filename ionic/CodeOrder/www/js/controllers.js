angular.module('starter.controllers', [])
	.controller('LoginCtrl', ['$scope', '$http', '$state','OAuth','OAuthToken', '$localStorage',
	    function($scope, $http, $state, OAuth, OAuthToken, $localStorage){
            $scope.isSaving = false;
            $localStorage.setObject('oauth',{
                access_token: '',
                refresh_token: ''
            });
			$scope.login = function(data){
                $scope.isSaving = true;
				OAuth.getAccessToken(data).then(function(){
                    $scope.isSaving = false;
					$scope.error_login = data;
					$state.go('tabs.orders');
				}, function(data){
                    $scope.isSaving = false;
					$scope.error_login = data;
				});
			}
			$scope.singup = function(data){
                $scope.error_login = data;
				$http.post('http://192.168.0.3:8888/users', data)
				.then(
					function(){
						OAuth.getAccessToken(data).then(function(){
							$state.go('tabs.orders');
						}, function(data){
							$scope.error_login = "Usuário ou senha inválidos";
						});
					}
				);
				
			}
		}
	])
    .controller('LogoutCtrl', ['$scope', 'logout', 'OAuthToken', '$state',
        function ($scope, logout, OAuthToken, $state){
            $scope.logout = function(){
                OAuthToken.removeToken();
                logout.logout();
                $state.go('login');
            }

        }
    ])
	.controller('OrdersCtrl', ['$scope', '$http', '$state',
		function ($scope, $http, $state){
			$scope.getOrders = function(){
				$http.get('http://192.168.0.3:8888/orders').then(
					function(data){
						$scope.orders = data.data._embedded.orders;
					}
				);
			};

            $scope.delete = function(order, index){
                $http.delete('http://192.168.0.3:8888/orders/'+order.id).then(
                    function(data){
                        if(data.status==204){
                            $scope.orders.splice(index, 1);
                        }
                    }
                );
            };
            $scope.show = function(order){
                console.log(order);
                $state.go('tabs.show', {id: order.id});
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
    .controller('OrdersShowCtrl', ['$scope', '$http', '$stateParams', '$state',
        function($scope, $http, $stateParams, $state){
            $scope.getOrder = function(){
                $http.get('http://192.168.0.3:8888/orders/'+$stateParams.id).then(
                    function(data){
                        $scope.order = data.data;
                    }
                );
            }
            $scope.goHome = function(){
                $state.go('home');
            };

            $scope.getOrder();
        }
    ])
	.controller('OrdersNewCtrl', ['$scope', '$http', '$state',
        function ($scope, $http, $state){
		
            $scope.clients = [];
            $scope.ptypes = [];
            $scope.products = [];
            $scope.statusList = ["Pendente", "processando", "Entregue"];


            $scope.resetOrder = function(){
                $scope.order = {
                    client_id: '',
                    ptype_id: '',
                    item: []
                };
            }
            $scope.getClients = function(){
                $http.get('http://192.168.0.3:8888/clients').then(
                    function(data){
                        $scope.clients = data.data._embedded.clients;
                    }
                );
            };

            $scope.getOrders = function(){
                $http.get('http://192.168.0.3:8888/orders').then(
                    function(data){
                        $scope.orders = data.data._embedded.orders;
                    }
                );
            };

            $scope.getPtypes = function(){
                $http.get('http://192.168.0.3:8888/ptypes').then(
                    function(data){
                        $scope.ptypes = data.data._embedded.ptypes;
                    }
                );
            };
            $scope.getProducts = function(){
                $http.get('http://192.168.0.3:8888/products').then(
                    function(data){
                        $scope.products = data.data._embedded.products;
                    }
                );
            };
            $scope.addItem = function(){
                $scope.order.item.push({
                    product_id:'',
                    quantity:1,
                    price:0,
                    total: 0
                });
            };

            $scope.setPrice = function(index){
                var product_id = $scope.order.item[index].product_id;
                for(var i in $scope.products){
                    if($scope.products.hasOwnProperty(i) && $scope.products[i].id == product_id){
                        $scope.order.item[index].price = $scope.products[i].price;
                    }
                }
                $scope.calculateTotalRow(index);
            };

            $scope.calculateTotalRow = function(index){
                $scope.order.item[index].total = $scope.order.item[index].quantity * $scope.order.item[index].price;
                calculateTotal();
            };

            calculateTotal = function(){
                $scope.order.total = 0;
                for(var i in $scope.order.item){
                    if($scope.order.item.hasOwnProperty(i)){
                        $scope.order.total += $scope.order.item[i].total;
                    }
                }
            };

            $scope.save = function(){
                $http.post('http://192.168.0.3:8888/orders', $scope.order).then(
                    function(data){
                        $scope.resetOrder();
                        $scope.getOrders();
                        $state.go('tabs.orders');
                    }
                );
            };

            $scope.resetOrder();
            $scope.getClients();
            $scope.getPtypes();
            $scope.getProducts();
        }
	])
	.controller('HomeCtrl', ['$scope', '$http', '$state', 
       function ($scope, $http, $state){
			$scope.goOrders = function(){
				$state.go('tabs.orders');
			};
		}
	])
    .controller('RefreshModalCtrl', ['$rootScope', '$scope', 'OAuth', 'authService', '$timeout','$state','OAuthToken','logout',
        function($rootScope, $scope, OAuth, authService, $timeout, $state, OAuthToken, logout){

            function destroyModal(){
                if($rootScope.modal){
                    $rootScope.modal.hide();
                    $rootScope.modal = false;
                }
            }
            $scope.$on('event:auth-loginConfirmed', function(){
                destroyModal();
            });
            $scope.$on('event:auth-loginCancelled', function(){
                destroyModal();
                logout.logout();
            });

            $scope.$on('$stateChangeStart',
                function(event, toState, toParams, fromState, fromParams){
                    if($rootScope.modal){
                        authService.loginCancelled();
                        event.preventDefault();
                        $state.go('login');
                    }
            });

            OAuth.getRefreshToken().then(function(){
                $timeout(function(){
                    authService.loginConfirmed();
                },5000)
            },function(){
                authService.loginCancelled();
                $state.go('login');
            });
    }])
	;