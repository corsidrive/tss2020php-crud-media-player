<?php

class ArtistModel {

    private $pdo ;
    // depedency injection
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create(Artist $artist)
    {
      try {
        
        $sql = "INSERT into Artist (name) values (:name)";
        $pdostm = $this->pdo->prepare($sql);
        $pdostm->bindValue(':name',$artist->name);

        $pdostm->execute();
        
        return $this->pdo->lastInsertId();

      } catch (PDOException $e) {
         echo $e->getMessage();
      }  

     
       

    }

    public function readOne(int $artist_id)
    {
        
    }

    public function readAll()
    {
        # code..
    }

    public function update(Artist $artist)
    {
        
    }

    public function delete(int $artist_id)
    {

    }

}