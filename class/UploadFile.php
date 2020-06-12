<?php 
class UploadFile {

    /** attributo name del campo di tipo file */
    private $name;
    private $destination;

    public function __construct($name,$destination) {
        $this->name = $name;
        $this->destination = $destination;


        if(file_exists($destination)){
               // TODO: mette eccezione se non trova il file  
               // Crea la cartella oppure Eccezione
        }

    }

    public function doUpload()
    {
        $original_file_name = $_FILES[$this->name]['name'];
        $error = $_FILES[$this->name]['error'];
        $tmp_path = $_FILES[$this->name]['tmp_name'];
    
        $destination = Config::UPLOAD_FOLDER.$original_file_name;
    
        if($error == UPLOAD_ERR_OK){
            
            move_uploaded_file($tmp_path,$destination);

        }else{
            // TODO: eccezione per errore di caricamento
        }
    
    }
}

/**
 * $u = new UploadFile('filename','./myfolder');
 * $u->doUpload();
 * 
 * $u2 = new UploadFile('pippo_file',Config::UPLOAD_FOLDER);
 * $u2->doUpload();
 */