<?php
include '../autoload.php';

$artist = new Artist();
$artist->name = "Pixies";

$artistModel = new ArtistModel(Db::getInstance());
$ultimo = $artistModel->create($artist);

echo $ultimo;
