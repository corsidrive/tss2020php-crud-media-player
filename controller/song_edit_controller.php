<?php
include_once '../autoload.php';

$titleField = new ValidationField(
    'title',
    'required',
    'il titolo è obbligatorio',
    ['required' => true]
);


$artistModel = new ArtistModel(Db::getInstance());
$elencoArtisti = $artistModel->readAll();

$genreModel = new GenreModel(Db::getInstance());
$elencoGeneri = $genreModel->readAll();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $song_id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
    
    if($song_id != false ) {

        $songModel = new SongModel(Db::getInstance());
        $song = $songModel->readOne($song_id);
    
    } else {
        $song = null;
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $upload = new UploadFile('filename', Config::UPLOAD_FOLDER);

        $song = new Song();

    }



View::render('song_form_view', [
    'elencoArtisti' => $elencoArtisti,
    'elencoGeneri' => $elencoGeneri,
    'song' => $song,
    'button' => 'modifica',
    'lead' => 'Modifica canzone'
]);
