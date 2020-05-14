<?php
// error_reporting(0);
spl_autoload_register(function($className){
    // dove trovare le classi
    $classPath = __DIR__.'/class/'.$className.'.php';
    @include_once $classPath;
   
    $classPath = __DIR__.'/'.$className.'.php';
    @include_once $classPath;
    
    $classPath = __DIR__.'/model/'.$className.'.php';
    @include_once $classPath;
    
});