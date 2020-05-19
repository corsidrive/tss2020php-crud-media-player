<?php
//  $pdo = new PDO()
//  $pdo->prepare()



/**
 * Db::getInstance();
 */
class Db {

    private static $instance = null;

    private function __construct() {}
    
    public static function getInstance():PDO
    {
        // sono gia connesso ?
        if(self::$instance === null){
            
            // no new PDO creo una nuova istanza
            self::$instance = new PDO("mysql:host=".Config::DB_HOST.";dbname=".Config::DB_NAME,Config::DB_USER,Config::DB_PASSWORD); 
            return self::$instance;
            
        }else{
            
            // si return PDO restituisco quella che ho creato prima
            return self::$instance;
        }


    }


}