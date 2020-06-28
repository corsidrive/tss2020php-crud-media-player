<?php

echo "testools\n";
// echo Config::SITE_URL;
$res = HTTPRequest(Config::SITE_URL.'test/post.test.php',
       [
           'nome' => 'paolo' 
       ]
);

// print_r($res);

$res = CHTTPRequest(Config::SITE_URL.'test/post.test.php',
     [
         "nome" => 'paolo',
         "fileupload" => '@test/01.mp3'
     ]   
);

print_r($res);


/*
curl -i  
-F "filename=@01.mp3"  
-F "title=curl-0last" 
-F "artist_id=15" 
-F "genre_id=8"  
http://localhost/tss2020php-crud-media-player/controller/song_add_controller.php

*/