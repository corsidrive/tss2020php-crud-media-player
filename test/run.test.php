<?php
// include "../";
require "./autoload.php";
require "./test/null_or_integer_test.php";
require "./test/error_in_page.php";

$path = "./test";
$r = getFiles($path);
//print_r($r);
$shfile = file_get_contents("./test/curl.test.sh");
// echo $shfile;

// echo exec('curl -d "artist_name=Nuova versione" -X POST http://localhost/tss2020php-crud-media-player/controller/artist_add_controller.php
// '); 



//$page = file_get_contents("C:/Users/saras/Desktop/formarete-www/tss2020php-crud-media-player/test/static/test_song_add_controller.php.html");
//echo $page;
// echo $page;

// echo substr_count($page,'name="title"');