<?php 
include "../autoload.php";


if($_SERVER['REQUEST_METHOD']=='POST'){
   
    $original_file_name = $_FILES['filename']['name'];
    $error = $_FILES['filename']['error'];
    $tmp_path = $_FILES['filename']['tmp_name'];

    $destination = Config::UPLOAD_FOLDER.$original_file_name;

    if($error == UPLOAD_ERR_OK){
        move_uploaded_file($tmp_path,$destination);
    }


}





View::render('song_form_view');