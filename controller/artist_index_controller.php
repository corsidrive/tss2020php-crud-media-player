<?php
include '../autoload.php';

$artistModel = new ArtistModel(Db::getInstance());
$artistlist = $artistModel->readAll();

View::render('artist_index_view',[
    'artisti' => $artistlist
]);
