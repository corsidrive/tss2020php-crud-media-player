<?php
echo "-------------------\n";
echo basename(__FILE__)."\n";


$res = CHTTPRequest(Config::SITE_URL.'controller/artist_add_controller.php',
     [
         "artist_name" => 'artista nome messo per cas altro' 
     ]    
);



// $res = CHTTPRequest(Config::SITE_URL.'controller/song_add_controller.php',
//      [
//          "title" => 'paolo',
//          "genre_id" => 1,
//          "artist_id" => 1,
//          "filename" => '@test/01.mp3'
//      ]    
// );

