/*global data_support, intel */

/* --------------
 initialization 
  the xdkFilter argument can be set to a function that
   receives the data of the service method and can return alternate data
   thus you can reformat dates or names, remove or add entries, etc.
   -------------- */

/*global angular*/
var app = angular.module('myApp', []);
app.controller('customersCtrl', ['$http',function($http) {
    var store = this;
  $http.get("http://myfuelpump.com/task/index.php/Sendapi_controller/data").success(function (data) {
      store.myData = data;
  });
}]);