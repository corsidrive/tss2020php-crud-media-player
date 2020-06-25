<?php
include "../autoload.php";

$artistModel = new ArtistModel(Db::getInstance());
$elencoArtisti = $artistModel->readAll();

$genreModel = new GenreModel(Db::getInstance());
$elencoGeneri = $genreModel->readAll();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $song = new Song();
    $song->title = '';
    $song->genre_id = null;
    $song->artist_id = null;

}


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $upload = new UploadFile('filename', Config::UPLOAD_FOLDER);
        
        // validazione

        $song = new Song();

        $song->filename = $_FILES['filename']['name'];

        $song->title = filter_input(INPUT_POST, "title");

        $idgenere = filter_input(INPUT_POST, "genre_id", FILTER_VALIDATE_INT);

        $idastista = filter_input(INPUT_POST, "artist_id", FILTER_VALIDATE_INT);

        if (empty($song->title)) {


            header('Location: http://localhost/tss2020php-crud-media-player/controller/song_add_controller.php?empty');

        } else {

            $genreModel = new GenreModel(Db::getInstance());

            $genere = $genreModel->readOne($idgenere);

            $artistModel = new ArtistModel(Db::getInstance());

            $artista = $artistModel->readOne($idastista);

            $song->artist = $artista;

            $song->genre = $genere;

            if ($upload->isAllowed()) {

                $upload->doUpload();

                $songModel = new SongModel(Db::getInstance());

                $songModel->create($song);

                header('Location:' . Config::SITE_URL . 'controller/song_index_controller.php');

            }

        }

    }



View::render('song_form_view', [
    'elencoArtisti' => $elencoArtisti,
    'elencoGeneri' => $elencoGeneri,
    'song' => $song,
    'lead' => 'Aggiungi nuovo artista',
    'button' => 'aggiungi',
]);
