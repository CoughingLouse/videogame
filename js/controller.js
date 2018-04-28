var app = angular.module("VideogameApp", []);
app.controller("VideogameCtrl", function($scope,$http){

  $scope.title = "Videogame <AngularJS>";
  $scope.input = "";
  $scope.vgJson;
  $scope.error = "";
  $scope.videogames;
  $scope.op = "R";

  $api_online = "iVideogame.php?op=R";
  $api_offline = "https://rjko.altervista.org/videogame/www/iVideogame.php?op=R";
  // DEV ENV
  $api = $api_offline;

  $http.get(`${$api}`)
  .then(function mySuccess(response) {
        $scope.vgJson = response.data;
    }, function myError(response) {
        $scope.error = response.statusText;
        console.log("Error: " + $scope.error);
    });

});

app.directive("vgRepeat", function() {
    return {
        restrict : 'EA',
        scope : false,
        templateUrl : '../_vg-repeat.html',
        // template : '<h1>{{title}}</h1>'
    };
});