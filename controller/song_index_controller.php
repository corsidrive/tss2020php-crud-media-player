<?php 
include '../autoload.php'; 

$songModel = new SongModel(Db::getInstance());
$songlist = $songModel->readAll();

View::render('song_index_view',[
    'songlist' => $songlist,
    'lead' => 'Elenco degli artisti'
]);
