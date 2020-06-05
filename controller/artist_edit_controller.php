<?php
include_once '../autoload.php';


if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $artist_id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);


    $artistModel = new ArtistModel(Db::getInstance());
    $artist = $artistModel->readOne($artist_id);


}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $artist_name = filter_input(INPUT_POST, 'artist_name');

    $artist = new Artist();
    $artist->name = $artist_name;
    $artist->artist_id = $artist_id;
    
    $artistModel = new ArtistModel(Db::getInstance());
    
    $artistModel->update($artist);
    // header('Location:' . Config::SITE_URL . 'controller/artist_index_controller.php');
}

View::render('artist_add_view',[
    'artista' => $artist,
    'mode' => 'Modifica Artista'
]);





