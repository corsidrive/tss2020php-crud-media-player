<?php

class UploadFile {

    private $name;
    private $uploadir;

    public function __construct($name,$uploadir) {
        $this->name = $name;
        $this->uploadir = $uploadir;

        var_dump(file_exists($this->uploadir));
        var_dump($this->uploadir);
        
        // if(!@mkdir($this->uploadir)){
        //     echo "non riesco a creare la directory";
        // };
    }

    public function upload()
    {
        print_r($_FILES);


        $error = $_FILES[$this->name]['error']; 
        $filename = $_FILES[$this->name]['name']; 

        move_uploaded_file($_FILES[$this->name]['tmp_name'],$this->uploadir.DIRECTORY_SEPARATOR.$filename);
        

        echo "$filename";        
        if($error == UPLOAD_ERR_OK){
            
        };
        die();
    }


    
} 