<?php
include_once "../autoload.php";

$artist_id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);


$artistModel = new ArtistModel(Db::getInstance());
$artistModel->delete($artist_id);

header('Location:'.Config::SITE_URL."controller/artist_index_controller.php");
