'use strict';

/**
 * @ngdoc function
 * @name gitTestApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the gitTestApp
 */
angular.module('gitTestApp')
  .controller('MainCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
