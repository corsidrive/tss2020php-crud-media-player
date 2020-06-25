<?php

include_once '../autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // creare due tendine elenco degli artisti e dei generi

    $idsong = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

    $artistModel = new ArtistModel(Db::getInstance());

    $genreModel = new GenreModel(Db::getInstance());

    $songModel = new SongModel(Db::getInstance());

    $elencoArtisti = $artistModel->readAll();

    $elencoGeneri = $genreModel->readAll();

    //echo $idsong;

    $song = $songModel->readOne($idsong);

}

if (isset($_FILES)) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $upload = new UploadFile('filename', Config::UPLOAD_FOLDER);

        // validazione

        $song = new Song();

        $song->filename = $_FILES['filename']['name'];

        $song->title = filter_input(INPUT_POST, "title");

        $idgenere = filter_input(INPUT_POST, "genre_id", FILTER_VALIDATE_INT);

        $idartista = filter_input(INPUT_POST, "artist_id", FILTER_VALIDATE_INT);

        $idsong = filter_input(INPUT_POST, "song_id", FILTER_VALIDATE_INT);

        $song->song_id = $idsong;

        if (empty($song->title)) {

            header('Location:' . Config::SITE_URL . 'controller/song_index_controller.php?empty');

        } else {

            $genreModel = new GenreModel(Db::getInstance());

            $genere = $genreModel->readOne($idgenere);

            $artistModel = new ArtistModel(Db::getInstance());

            $artista = $artistModel->readOne($idartista);

            $song->artist = $artista;

            $song->genre = $genere;

            if ($upload->isAllowed()) {

                $upload->doUpload();

                $songModel = new SongModel(Db::getInstance());

                $songModel->update($song);

                header('Location:' . Config::SITE_URL . 'controller/song_index_controller.php');

            }

        }

    }

}

View::render('song_form_view', [
    'elencoArtisti' => $elencoArtisti,
    'elencoGeneri' => $elencoGeneri,
    'song' => $song,
    'button' => 'modifica',
]);
