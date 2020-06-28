<?php
echo "\n\n\n------------\n";
echo basename(__FILE__)."\n\n";

$res = CHTTPRequest(Config::SITE_URL.'test/post.test.php',
     [
         "id_genre" => ''
     ]   
); 

echo "res risposta per post test
      \n-------------------------------\n";
print_r($res);

/*
curl -i  
-F "filename=@01.mp3"  
-F "title=curl-0last" 
-F "artist_id=15" 
-F "genre_id=8"  
http://localhost/tss2020php-crud-media-player/controller/song_add_controller.php

*/