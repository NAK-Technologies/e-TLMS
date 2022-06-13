<?php

class Route
{

     public static function name(){
          $route = explode('/', $_SERVER['PHP_SELF']);
          return '/'.end($route);
     }

     public static function nameWithPrefix(){
          $route = explode('/', $_SERVER['PHP_SELF']);
          return '/'.implode('/',array_slice($route, count($route) - 2));
     }
}