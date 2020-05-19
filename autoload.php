<?php
spl_autoload_register(function($className){
    @include_once __DIR__.'/class/'.$className.'.php';
    @include_once __DIR__.'/'.$className.'.php';
    @include_once __DIR__.'/model/'.$className.'.php';
});