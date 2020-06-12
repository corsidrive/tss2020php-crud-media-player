<?php 
include "../autoload.php";


if($_SERVER['REQUEST_METHOD']=='POST'){
   
   $upload = new UploadFile('filename',Config::UPLOAD_FOLDER);
   // validazione
   $upload->doUpload(); 

}





View::render('song_form_view');