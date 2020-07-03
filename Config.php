<?php

// produzione (altervista)
class Config {
    public const DB_NAME = 'media_library';
    public const DB_USER = 'root';
    public const DB_PASSWORD = 'fiacca';
    public const DB_HOST = 'localhost';
    
    
    public const SITE_URL = 'http://localhost/ultima_versione/';
    public const SITE_NAME = 'Media Library';
    //public const SITE_URL = 'http://xxxxxx/sito_media_library.php';
    public const VIEW_FOLDER = __DIR__.'/view/';
    public const UPLOAD_FOLDER = __DIR__.'/uploads/';

}  


// sviluppo (laragon)

// class Config {
//     public const DB_NAME = 'media_library';
//     public const DB_USER = 'root';
//     public const DB_PASSWORD = 'fiacca';
//     public const DB_HOST = 'localhost';
    

//     // public const SITE_URL = 'http://localhost/tss2020php-crud-media-player/';
//     public const SITE_URL = 'http://xxxxxx/sito_media_library.php';
//     public const VIEW_FOLDER = __DIR__.'/view/';

// }