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

$songUpload = new UploadFile('filename', Config::UPLOAD_FOLDER,['audio/mpeg']);

$songModel = new SongModel(Db::getInstance());

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $song_id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
    
    if($song_id != false ) { 
        $song = $songModel->readOne($song_id);
    } else {
        $song = null;
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $song = new Song();
    
    $song->title = $titleField->getValue();
    $song->genre_id = filter_input(INPUT_POST, "genre_id",FILTER_VALIDATE_INT);
    $song->artist_id = filter_input(INPUT_POST, "artist_id",FILTER_VALIDATE_INT);
    $song->song_id = filter_input(INPUT_POST, "song_id",FILTER_VALIDATE_INT);
  
    $newFileUpload = !($_FILES['filename']['error'] == UPLOAD_ERR_NO_FILE);
    $song->filename = $songModel->readOne($song->song_id)->filename;

    if(ValidationField::formIsValid()){
        
        if($newFileUpload &&  $songUpload->isAllowed()){
            $song->filename = $songUpload->doUpload();
        }

        if($song->filename != NULL) {
            
            $songModel = new SongModel(Db::getInstance());
            $songModel->update($song);

            header('Location:' . Config::SITE_URL . 'controller/song_index_controller.php');

        }else{

            // qui upload è fallito per qualche ragione
        }
    }

    }


    View::render('song_form_view', [
        'elencoArtisti' => $elencoArtisti,
        'elencoGeneri' => $elencoGeneri,
        'song' => $song,
        'songUpload' => $songUpload,
        'titleField' => $titleField,
        'lead' => 'Aggiungi nuovo artista',
        'button' => 'aggiungi',
    ]);