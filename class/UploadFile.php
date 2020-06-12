<?php

class UploadFile {

    public function __construct($name) {
        $this->name = $name;
    }

    public function upload()
    {
        print_r($_FILES);
        die();
    }
} 