<?php include '../autoload.php' ?>
<?php 

$artistModel = new ArtistModel(Db::getInstance());
View::render('artist_index_view',
            [
                'artisti'=>$artistModel->readAll(4)
            ]);

?>
