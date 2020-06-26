<?php
include "../autoload.php";

$titleField = new ValidationField(
    'title',
    'required',
    'il titolo è obbligatorio',
    ['required' => true]
);

// $idGenereField = new ValidationField(
//     'genre_id',
//     'is_int_or_null',
//     'campo intero o nullo',
//     ['required' => false]
// );

// $idArtistaField = new ValidationField(
//     'artist_id',
//     'is_int_or_null',
//     'campo intero o nullo',
//     ['required' => false]
// );


$artistModel = new ArtistModel(Db::getInstance());
$elencoArtisti = $artistModel->readAll();

$genreModel = new GenreModel(Db::getInstance());
$elencoGeneri = $genreModel->readAll();

$songUpload = new UploadFile('filename', Config::UPLOAD_FOLDER,['audio/mpeg']);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $song = new Song();
    $song->title = '';
    $song->genre_id = null;
    $song->artist_id = null;

    //print_r($_FILES);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $song = new Song();
    
    $song->title = $titleField->getValue();
    $song->genre_id = filter_input(INPUT_POST, "genre_id",FILTER_VALIDATE_INT);
    $song->artist_id = filter_input(INPUT_POST, "artist_id",FILTER_VALIDATE_INT);
    
    if( ValidationField::formIsValid()){

        $song->filename = $songUpload->doUpload();

        if($song->filename != NULL) {
            
            $songModel = new SongModel(Db::getInstance());
            $songModel->create($song);

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
