<?php
include_once '../autoload.php';

$nameField = new ValidationField(
    'artist_name',
    'required',
    'il nome non è valido',
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

    $artist = new Artist();
    $artist->name = $nameField->getValue();
    $artist->artist_id =  filter_input(INPUT_POST,'artist_id',FILTER_VALIDATE_INT);

    if (ValidationField::formIsValid()) {

        $artistModel = new ArtistModel(Db::getInstance());
        $artistModel->update($artist);

        header('Location:' . Config::SITE_URL . 'controller/artist_index_controller.php');

    }

}

View::render('artist_form_view', [
    'artista' => $artist,
    'mode' => 'Modifica artista: ' . ($artist ? $artist->name : null),
    'lead' => 'Modifica artista ',
    'nameField' => $nameField,
    'button' => 'modifica',
]);
