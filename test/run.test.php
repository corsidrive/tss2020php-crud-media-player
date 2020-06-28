<?php
// include "../";
require "./autoload.php";
require "./test/null_or_integer_test.php";
//require "./test/error_in_page.php";
// require "./test/httpRequest/TestToolsHTTP.php";
require "./test/song_form_test.php";

//http://localhost/tss2020php-crud-media-player/controller/song_index_controller.php
$res = CHTTPRequest(Config::SITE_URL.'controller/song_add_controller.php',
     [
         "title" => 'paolo',
         "genre_id" => 1,
         "artist_id" => 1,
         "filename" => '@test/01.mp3'
     ]   
);

print_r($res);


