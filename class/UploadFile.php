<?php 
class UploadFile {

    /** attributo name del campo di tipo file */
    private $name;
    private $destination;
    private $allowedTypes; // formati permessi durante upload

    public function __construct($name,$destination,$allowedTypes=[]) {
        $this->name = $name;
        $this->destination = $destination;
        $this->allowedTypes = $allowedTypes;


        if(file_exists($destination)){
               // TODO: mette eccezione se non trova il file  
               // Crea la cartella oppure Eccezione
        }

    }

    public function doUpload():?string
    { 
        $original_file_name = $_FILES[$this->name]['name'];
        $error = $_FILES[$this->name]['error'];
        $tmp_path = $_FILES[$this->name]['tmp_name'];
    
        if($error == UPLOAD_ERR_OK){

            move_uploaded_file($tmp_path,$this->destination.$original_file_name);
            // NOTE: restituire il nome del file può essere usato per salvare a db  
            return $original_file_name;

        }else{
            
            return null;
        }
    }

    public function isAllowed()
    {
       if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($_FILES) == 0) { return true; }

       if(count($this->allowedTypes) != 0) {
           $currentType = $_FILES[$this->name]['type'];
           return in_array($currentType,$this->allowedTypes);

       } else {

            return true;

       }

    }

    public function getAllowedTypes()
    {
        return implode(',',$this->allowedTypes);
    }

}

/**
 * $u = new UploadFile('filename','./myfolder');
 * $u->doUpload();
 * 
 * $u2 = new UploadFile('pippo_file',Config::UPLOAD_FOLDER);
 * $u2->doUpload();
 */