var app = angular.module("VideogameApp", []);
app.controller("VideogameCtrl", function($scope,$http){

  $scope.title = "Videogame <AngularJS>";
  $scope.error;
  $scope.vgJson;
  $scope.mock = `[
  {"ID":1,"TITOLO":"MOTORSTORM ARCTIC EDGE","FORMATO":"PSP","SPECIALE":0,"DOVE":""},
  {"ID":1,"TITOLO":"MOTORSTORM ARCTIC EDGE","FORMATO":"PSP","SPECIALE":0,"DOVE":""},
  {"ID":1,"TITOLO":"MOTORSTORM ARCTIC EDGE","FORMATO":"PSP","SPECIALE":0,"DOVE":""},
  {"ID":1,"TITOLO":"MOTORSTORM ARCTIC EDGE","FORMATO":"PSP","SPECIALE":0,"DOVE":""},
  {"ID":1,"TITOLO":"MOTORSTORM ARCTIC EDGE","FORMATO":"PSP","SPECIALE":0,"DOVE":""}]`;

  $api = ["../iVideogame.php?op=R", "https://rjko.altervista.org/videogame/iVideogame.php?op=R"];

  $http.get($api[0])
  .then(function mySuccess(response) {
        $scope.vgJson = response.data;
    }, function myError(response) {
        $scope.vgJson = $scope.mock;
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
