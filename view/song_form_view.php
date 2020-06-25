<?php View::render('head');?>
<?php View::render('nav');?>

<?php View::render('jumbotron', ['lead' => $lead, 'site_name' => "Supercal"]);?>

<div class="container">
        <form method="post"
        enctype="multipart/form-data"
        action="<?=$_SERVER['PHP_SELF']?>"
        >
            <div class="form-group">
            <input type="hidden" name="song_id" value="<?=$song->song_id?>" />
                <label for="title">Titolo</label>
                <input id="title" value="<?=$song->title?>" name="title"  class="form-control" type="text">
            </div>
            <div class="form-group">
                <label for="artist">Artista</label>
                <select id="artist" name="artist_id" class="form-control">
                    <option selected >sconosciuto</option>
                    <?php

foreach ($elencoArtisti as $artista) {

    ?>

                      <?php if ($song->artist_id == $artista->artist_id) {?>


                        <option value="<?=$artista->artist_id?>" selected>

                          <?=$artista->name?>

                        </option>

                      <?php } else {?>

                      <option value="<?=$artista->artist_id?>">

                      <?=$artista->name?>

                      </option>

                      <?php }?>


                 <?php }?>
                </select>
            <div class="form-group">
                <label for="genre">Genere</label>
                <select id="genre" class="form-control" name="genre_id">
                <option selected >sconosciuto</option>
                    <?php

foreach ($elencoGeneri as $genere) {

    ?>

                    <?php if ($song->genre_id == $genere->genre_id) {?>


                          <option value="<?=$genere->genre_id?>" selected>

                               <?=$genere->name?>

                           </option>

                   <?php } else {?>

                         <option value="<?=$genere->genre_id?>">

                             <?=$genere->name?>

                         </option>

                    <?php }?>

                   <?php }?>
                </select>
            </div>
            <?php if (!empty($song->filename)) { ?>
            <div class="form-group">
                    <audio controls>
                        <source src="<?php echo Config::SITE_URL . '/uploads/' . $song->filename; ?>" type="audio/mpeg" />
                    </audio>
            </div>
            <?php } ?>
            <div class="form-group">
                <label for="filename">File</label>
                <input type="file" class="form-control" name="filename" id="filename">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><?=$button?></button>
             </div>
        </form>
</div>

<?php View::render('footer');?>