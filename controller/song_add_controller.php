<?php 
include "../autoload.php";

if($_SERVER['REQUEST_METHOD']=='GET'){

    $artistModel = new ArtistModel(Db::getInstance()); 
    $elencoArtisti = $artistModel->readAll();


    $genreModel = new GenreModel(Db::getInstance()); 
    $elencoGeneri = $genreModel->readAll();

}



if($_SERVER['REQUEST_METHOD']=='POST'){
   
   

   $upload = new UploadFile('filename',Config::UPLOAD_FOLDER,['audio/mpeg']);

   if($upload->isAllowed()){
       
    // $song->filename =  $upload->doUpload(); 
       $upload->doUpload(); 
   }

   // $songModel->create($song);

}





View::render('song_form_view',[
    'elencoArtisti' => $elencoArtisti,
]);