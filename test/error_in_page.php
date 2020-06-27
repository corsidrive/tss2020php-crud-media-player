<?php 

delete_directory("./test/static"); 
@mkdir("./test/static");

$controllers = getFiles("./controller");

// print_r($controller);

array_walk($controllers,function($controller_url){
    $url = Config::SITE_URL.'controller/'.$controller_url;
    
    findTextInUrl($url,'Fatal error',false); 
    findTextInUrl($url,'notice',false);
});

// http://localhost/tss2020php-crud-media-player/controller/song_add_controller.php

// HTTPRequest(Config::SITE_URL.'controller/song_add_controller.php',['title']);

findTextInUrl('http://localhost/tss2020php-crud-media-player/controller/song_add_controller.php','name="title"',true);
