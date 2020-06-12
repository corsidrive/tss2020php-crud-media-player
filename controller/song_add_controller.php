<?php
include_once '../autoload.php';

// TODO: validazione


if($_SERVER['REQUEST_METHOD'] == 'GET'){


  

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $uploadMP3 = new UploadFile('filename',Config::UPLOAD_DIR);
    $uploadMP3->upload();


    //header('Location:' . Config::SITE_URL . 'controller/song_index_controller.php');

}


View::render('song_form_view',
    [
        

        'mode'=>'Inserisci Canzone',

        'lead' => 'Aggiungi nuova canzone',
        'button' => 'aggiungi',
    ]);
