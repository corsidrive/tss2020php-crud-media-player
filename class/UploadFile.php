<?php

class UploadFile {

    

    public function __construct($name,$uploaddir) {
        $this->name = $name;
        $this->uploadir = $uploaddir;
    }

    public function upload()
    {
        print_r($_FILES);


        $error = $_FILES[$this->name]['error']; 
        $filename = $_FILES[$this->name]['name']; 

        $uploaddir = 

        move_uploaded_file($_FILES[$this->name]['tmp_name'],);
        

        echo "$filename";        
        if($error == UPLOAD_ERR_OK){
            
        };
        die();
    }
} 