<?php View::render('head', ['title' => $lead]); ?>
<?php View::render('nav'); ?>

<?php View::render('jumbotron', ['lead' => $lead, 'site_name' => Config::SITE_NAME]); ?>

<div class="container">
    <form method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
            <input type="hidden" name="song_id" value="<?= $song->song_id ?>" />
            <label for="title">Titolo</label>
            <input id="title" value="<?= $song->title ?>" name="title" class="form-control" type="text">
            <?php if ($titleField->getIsValid() === false) { ?>
                            <div class="text-danger"><?= $titleField->getErrorMessage()  ?> </div>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="artist">Artista</label>
           

            <select id="artist" name="artist_id" class="form-control">
                
                <option value="NULL" <?= $song->artist_id == '' ? 'selected' : ''; ?>> sconosciuto </option>
                <?php foreach ($elencoArtisti as $artista) { ?>

                    <option value="<?= $artista->artist_id ?>" <?= $song->artist_id == $artista->artist_id ? 'selected' : '' ?>>
                        <?= $artista->name ?>
                    </option>

                <?php } ?>
            </select>
            <div class="form-group">
                <label for="genre">Genere</label>
                <select id="genre" class="form-control" name="genre_id">
                    <option value="NULL" <?= $song->genre_id == '' ? 'selected' : ''; ?>> sconosciuto </option>
                    <?php foreach ($elencoGeneri as $genere) { ?>

                        <option value="<?= $genere->genre_id ?>" <?= $song->genre_id == $genere->genre_id ? 'selected' : '' ?>>
                            <?= $genere->name ?>
                        </option>

                    <?php } ?>
                </select>
            </div>

            <div class="row">

            <div class="form-group col-md-6">
                <label for="filename">File</label>
                <input type="file" class="form-control" name="_filename" id="filename">
                <?php if(!$songUpload->isAllowed() && empty($song->filename)) { ?>
                    <div class="text-danger">devi caricare un file. 
                    formati permessi: <strong><?=  $songUpload->getAllowedTypes() ?> </strong>
                    </div>
                <?php } ?>
            </div>

            <?php if (!empty($song->filename)) { ?>
                <div class="col-md-6 p-3">
                    <div for="filename">Current audio file</div>
                    <?= $song->filename ?>
                    <audio controls>
                        <source src="<?php echo Config::SITE_URL . '/uploads/' . $song->filename; ?>" type="audio/mpeg" />
                    </audio>
                </div>
            <?php } ?>

            </div>  

            <div class="form-group">
                <button type="submit" class="btn btn-primary"><?= $button ?></button>
            </div>
    </form>
</div>

<?php View::render('footer'); ?>