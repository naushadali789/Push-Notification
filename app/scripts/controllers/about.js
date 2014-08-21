'use strict';

/**
 * @ngdoc function
 * @name gitTestApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the gitTestApp
 */
angular.module('gitTestApp')
  .controller('AboutCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
