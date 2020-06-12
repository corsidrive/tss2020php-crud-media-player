<?php 
    include '../autoload.php';

    $genreModel = new GenreModel(DB::getInstance());
    $genrelist = $genreModel->readAll();

    View::render('genre_index_view', 
        [
            'genere' => $genrelist
        ]
    );