<?php
include_once "../autoload.php";

$song_id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

$songModel = new SongModel(Db::getInstance());
$songModel->delete($song_id);

header('Location: '.Config::SITE_URL."controller/song_index_controller.php");
