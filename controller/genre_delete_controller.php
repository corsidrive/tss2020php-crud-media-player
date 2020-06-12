<?php
include_once "../autoload.php";

$genre_id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);


$genreModel = new GenreModel(Db::getInstance());
$genreModel->delete($genre_id);

header('Location:'.Config::SITE_URL."controller/genre_index_controller.php");
