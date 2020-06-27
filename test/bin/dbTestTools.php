<?php

function getPDO(){
    return new PDO('mysql:dbname=media_library_test;host=localhost','root','fiacca');
}

function truncateTable($table,$pdo){
    $sql = "truncate table $table;";
    $truncate = $pdo->prepare($sql);
    
    $truncate->execute();
}

function insertArtist($pdo){
    $stm = $pdo->prepare("INSERT INTO `artist` (`artist_id`, `name`) 
                          VALUES
                            (1, 'Queen'),
                            (2, 'P.J. Harvey'),
                            (3, 'Metallica'),
                            (4, 'Aphex Twins')");
    $stm->execute();
   
} 

function insertGenre($pdo){
    $stm = $pdo->prepare("INSERT INTO `genre` 
                            (`genre_id`, `code`,`name`)  
                        VALUES
                            (1, 00,'Blues'),
                            (2, 01,'Classic Rock'),
                            (3, 02,'Dance'),
                            (4, 03,'Disco'),
                            (5, 04,'Funck')
                           ;"
                           );
    $stm->execute();
}

function readAllArtist($pdo){
    $stm = $pdo->query("select * from artist");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_CLASS,'Artist');
}

function query($query,$pdo) {
    try {
        $stm = $pdo->prepare($query);
        //echo "\n".$query."\n";
        $stm->execute(); 
        return $stm->fetchAll(PDO::FETCH_OBJ);

    } catch (\PDOException $th) {
        echo red("-- ERRORE --")."\n";
        echo red($query)."\n";
        echo red($th->getMessage())."\n";
        echo $th->getFile()."\n";
        echo "linea: ".$th->getLine()."\n";
        speech("errore query");
    }

} 
