<?php

function getPDO(){
    try {
        $pdo = new PDO('mysql:dbname=media_library;host=localhost','root','fiacca');
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (\Throwable $th) {
        throw $th;
    }
}

function truncateTable($table,$pdo){
    $sql = "truncate table $table;";
    $truncate = $pdo->prepare($sql);
    
    $truncate->execute();
}

// function insertArtist($pdo){
//     $stm = $pdo->prepare("INSERT INTO `artist` (`artist_id`, `name`) 
//                           VALUES
//                             (1, 'Queen'),
//                             (2, 'P.J. Harvey'),
//                             (3, 'Metallica'),
//                             (4, 'Aphex Twins')");
//     $stm->execute();
   
// } 

// function insertGenre($pdo){
//     $stm = $pdo->prepare("INSERT INTO `genre` 
//                             (`genre_id`, `code`,`name`)  
//                         VALUES
//                             (1, 00,'Blues'),
//                             (2, 01,'Classic Rock'),
//                             (3, 02,'Dance'),
//                             (4, 03,'Disco'),
//                             (5, 04,'Funck')
//                            ;"
//                            );
//     $stm->execute();
// }

function readAll($table,$pdo){
    $stm = $pdo->query("select * from $table");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_OBJ);
}

function query($query,$pdo) {
   
    try {
        $stm = $pdo->prepare($query);
        $stm->execute(); 
        return $stm->fetchAll(PDO::FETCH_OBJ);

    } catch (\PDOException $th) {
       throw $th;
    }

} 

function loadQuery($sql_file,$pdo){
    $file_query_folder = "./test/query";
    $file_query = "$file_query_folder/$sql_file";

    
    if(file_exists($file_query)){
        $query = file_get_contents($file_query);
        query($query,$pdo);
    }else{
        throw new Exception(__FUNCTION__." il file sql non esiste: $file_query"); 
    
    }


}
