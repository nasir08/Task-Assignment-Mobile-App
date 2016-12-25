var app = angular.module('newapp', []);
app.controller('newCtrl', function ($scope, $http) {
    
            $scope.sendPost = function() {
            var data = $scope.note+";"+$window.index;
                console.log(data);
            $http.post("http://localhost/Task-Manager/index.php/Receiveapi_controller/note/",data);
    };
});