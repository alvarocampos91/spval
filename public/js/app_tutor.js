7/**
 * Created by Sandeep on 01/06/14.
 */

angular.module('alumnoApp',['ui.router','ngResource','alumnoApp.controllers','alumnoApp.services']);

angular.module('alumnoApp').config(function($stateProvider,$httpProvider){
    $stateProvider.state('tutorados',{
        url:'/tutorados',
        templateUrl:'tutoradosTemplate',
        controller:'TutoradosController'
    }).state('kardex',{
        url:'tutorado/:matricula/kardex',
        templateUrl:'kardexTemplate',
        controller:'AlumnoKardexController'
    }).state('mapaAcademico',{
       url:'tutorado/:matricula/mapaAcademico',
       templateUrl:'mapaTemplate',
       controller:'MapaAcademicoController'
    }).state('proyeccionFutura',{
        url:'tutorado/:matricula/proyeccionFutura',
        templateUrl:'proyeccionTemplate',
        controller:'ProyeccionController'
    });
}).run(function($state){
   $state.go('tutorados');
});