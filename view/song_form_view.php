<?php View::render('head', ['title' => $lead]); ?>
<?php View::render('nav'); ?>

<?php View::render('jumbotron', ['lead' => $lead, 'site_name' => Config::SITE_NAME]); ?>

<div class="container">
    <form method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
            <input type="hidden" name="song_id" value="<?= $song->song_id ?>" />
            <label for="title">Titolo</label>
            <input id="title" value="<?= $song->title ?>" name="title" class="form-control" type="text">
        </div>
        <div class="form-group">
            <label for="artist">Artista</label>
            <select id="artist" name="artist_id" class="form-control">
                <option value='0' <?= $song->artist_id === null ? 'selected' : ''; ?>> sconosciuto </option>
                <?php foreach ($elencoArtisti as $artista) { ?>

                    <option value="<?= $artista->artist_id ?>" <?php $song->artist_id === $artista->artist_id ? 'selected' : '' ?>>
                        <?= $artista->name ?>
                    </option>

                <?php } ?>
            </select>
            <div class="form-group">
                <label for="genre">Genere</label>
                <select id="genre" class="form-control" name="genre_id">
                    <option value='0' <?= $song->genre_id === null ? 'selected' : ''; ?>> sconosciuto </option>
                    <?php foreach ($elencoGeneri as $genere) { ?>

                        <option value="<?= $genere->genre_id ?>" <?php $song->genre_id === $genere->genre_id ? 'selected' : '' ?>>
                            <?= $genere->name ?>
                        </option>

                    <?php } ?>
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
                <button type="submit" class="btn btn-primary"><?= $button ?></button>
            </div>
    </form>
</div>

<?php View::render('footer'); ?>