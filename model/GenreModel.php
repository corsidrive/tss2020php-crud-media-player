<?php
class GenreModel {
    private $pdo ;   

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }


    public function create(Genre $genre) {
        try {
            $sql = "INSERT INTO Genre (name, code) VALUES (:name, :code)";

            $pdostm = $this->pdo->prepare($sql);

            $pdostm->bindValue(':name',$genre->name);
            $pdostm->bindValue(':code',$genre->code);

            $pdostm->execute();

            return $this->pdo->lastInsertId();   

        } catch (PDOException $e) {
            echo $e->getMessage();
        }   
    }

    public function readOne(int $genre_id) :?Genre {
        $sql = "SELECT * FROM Genre WHERE genre_id = :genre_id;";

        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':genre_id', $genre_id);

        $stm->execute();

        $res = $stm->fetchAll(PDO::FETCH_CLASS, 'Genre');

        return count($res) > 0 ? $res[0] : null;
    }

    public function readAll() :?Array {
        $sql = "SELECT * FROM Genre;";

        $stm = $this->pdo->prepare($sql);

        // non devo associare valori a query

        $stm->execute();

        $res =  $stm->fetchAll(PDO::FETCH_CLASS, 'Genre');

        return count($res) > 0 ? $res : null;
    }

    public function update(Genre $genre) {
        $sql = "UPDATE Genre SET name  = :name, code  = :code WHERE genre_id = :genre_id";

        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':name',$genre->name);
        $stm->bindValue(':code',$genre->code);   
        $stm->bindValue(':genre_id', $genre->genre_id);
        
        $stm->execute();
    }

    public function delete(int $genre_id)
    {
        $sql = "DELETE FROM Genre WHERE genre_id = :genre_id";

        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':genre_id', $genre_id);

        $stm->execute();
    }
}