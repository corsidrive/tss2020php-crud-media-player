<?php
include_once '../autoload.php';

$nameField = new ValidationField(
    'artist_name',
    'isName',
    'il nome non è valido',
    ['required' => true]
);

$idField = new ValidationField(
    'artist_id',
    'is_integer',
    'id non valido',
    ['required' => true]
);



if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $artist_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    
    if($artist_id != false){
        $artistModel = new ArtistModel(Db::getInstance());
        $artist = $artistModel->readOne($artist_id);
    }else{
        $artist = null;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $artist_id = $idField->getValue();

    $artist_name = $nameField->getValue();

    $artist = new Artist();

    $artist->name = $artist_name;

    $artist->artist_id = $artist_id;

    if (ValidationField::formIsValid()) {

        $artistModel = new ArtistModel(Db::getInstance());

        $artistModel->update($artist);

        header('Location:' . Config::SITE_URL . 'controller/artist_index_controller.php');

    }

}

View::render('artist_form_view', [
    'artista' => $artist,
    'nameField' => $nameField,
    'mode' => 'Modifica artista: ' . ($artist ? $artist->name : null),
    'lead' => 'Modifica artista ',
    'button' => 'modifica',
]);
