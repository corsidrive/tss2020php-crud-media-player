<?php
include '../autoload.php';

$artist = new Artist();
$artist->name = "ZZTOP";
$artist->artist_id = 9;

$artistModel = new ArtistModel(Db::getInstance());
// $ultimo = $artistModel->create($artist);

// $res = $artistModel->readOne(4);

$res = $artistModel->readAll();
//print_r($res);

// echo $res[4]->name; 

foreach ($res as  $artista) {
    echo "----------------\n";
    echo $artista->name . "\n";

}

$artistModel->update($artist);
echo "@@@@@@@@@@@@@@\n";

foreach ($res as  $artista) {
    echo "----------------\n";
    echo $artista->name . "\n";

}