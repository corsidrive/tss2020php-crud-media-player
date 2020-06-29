<?php
$pdo = getPDO();

truncateTable('artist',$pdo);
$artists = readAllArtist($pdo);
assertEquals('stato iniziale',count($artists),0);

CHTTPRequest(Config::SITE_URL.'/controller/artist_add_controller.php',
[
    'artist_name' => 'Jonny'
]);

CHTTPRequest(Config::SITE_URL.'/controller/artist_add_controller.php',
[
    'artist_name' => ''
]);

CHTTPRequest(Config::SITE_URL.'/controller/artist_add_controller.php',
[
    'artist_name' => 'Ringo     '
]);

CHTTPRequest(Config::SITE_URL.'/controller/artist_add_controller.php',
[
    'artist_name' => '<h1>George     '
]);
    


$artists = readAllArtist($pdo);
assertEquals('inserito jonny',count($artists),2);

print_r($artists);

// echo "\n".basename(__FILE__)." ok\n";

