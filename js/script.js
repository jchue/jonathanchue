angular.module( 'myApp', ['ui.router', 'ngAnimate'] )
    .config( ['$stateProvider', '$urlRouterProvider', function( $stateProvider, $urlRouterProvider ) {
        $stateProvider
            .state( 'home', {
                url: '/',
                templateUrl: 'home.php',
            })
            .state( 'contact', {
                url: '/contact',
                templateUrl: 'contact.php',
                controller: 'contactCtrl',
            });
        $urlRouterProvider.otherwise( '/' );
    }])
    .controller( 'myController', ['$scope', function( $scope ) {
    }])
    .controller( 'contactCtrl', ['$scope', '$http', function( $scope, $http ) {
        // create a blank object to hold our form information
        // $scope will allow this to pass between controller and view
        $scope.formData = {};

        // process the form
        $scope.processForm = function() {
            $http({
                method: 'POST',
                url: 'process.php',
                data: $.param( $scope.formData ),
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' },
            })
            .success( function( data ) {
                $scope.success = data.success;
                $scope.response = data.response;
            });
        };
    }]);
