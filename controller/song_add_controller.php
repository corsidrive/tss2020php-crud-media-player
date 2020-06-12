<?php 
include "../autoload.php";

print_r($_FILES);

if($_SERVER['REQUEST_METHOD']=='POST'){

    $error = $_FILES['filename']['error'];
    $tmp_path = $_FILES['filename']['tmp_name'];
    $destination = Config::UPLOAD_FOLDER.'ciccio.cic';

    if($error == UPLOAD_ERR_OK){
        move_uploaded_file($tmp_path,$destination);
    }


}





View::render('song_form_view');