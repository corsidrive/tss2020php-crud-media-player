<?php

class SongModel
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Song $song)
    {

        try {

            $sql = "insert into song (filename, title, genre_id, artist_id) values(:filename, :title, :genre_id, :artist_id);";

            $pdostm = $this->pdo->prepare($sql);

            $pdostm->bindValue(':filename', $song->filename);
            $pdostm->bindValue(':title', $song->title);
            $pdostm->bindValue(':genre_id', $song->genre->genre_id);
            $pdostm->bindValue(':artist_id', $song->artist->artist_id);

            $pdostm->execute();

            return $this->pdo->lastInsertId();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function readOne(int $song_id): ?Song
    {

        $sql = "select * from Song where song_id = :song_id;";

        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':song_id', $song_id);

        $stm->execute();

        $res = $stm->fetchAll(PDO::FETCH_CLASS, 'Song');

        return count($res) > 0 ? $res[0] : null;

    }

    public function readAll(): ?array
    {

        $sql = "SELECT
                    song_id,
                    filename,
                    title,
                    g.genre_id,
                    g.name as nameGenre,
                    g.code,
                    a.artist_id,
                    a.name as nameArtist 
                FROM
        
                Song as s 
                
                left join
                Genre as g 
                on (s.genre_id = g.genre_id) 
                left join
           
                Artist as ar 
                on s.artist_id = a.artist_id;";

        $stm = $this->pdo->prepare($sql);

        $stm->execute();

        $res = $stm->fetchAll(PDO::FETCH_CLASS, 'Song');

        return count($res) > 0 ? $res : null;
    }

    public function update(Song $song)
    {

        $sql = "update Song set filename = :filename, title = :title, genre_id = :genre_id, artist_id = :artist_id where song_id = :song_id";

        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(":filename", $song->filename);
        $stm->bindValue(":title", $song->title);
        $stm->bindValue(":genre_id", $song->genre->genre_id);
        $stm->bindValue(":artist_id", $song->artist->artist_id);
        $stm->bindValue(":song_id", $song->song_id);
        $stm->execute();

    }

    public function delete(int $song_id)
    {

        $sql = "delete from Song where song_id = :song_id";

        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(":song_id", $song_id);
        $stm->execute();

    }

}
