<?php View::render('head'); ?>
<?php View::render('nav') ?>
<?php View::render('jumbotron', ['lead' => "elenco delle canzoni", 'site_name' => "Sito"]); ?>

<?php //print_r($artisti)
?>
<div class="container mainBody">

    <a href="<?= Config::SITE_URL . 'controller/song_add_controller.php' ?>">aggiungi canzone</a>
    <?php if (count($songlist) > 0) { ?>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th width="1%">#</th>
                    <th width="70%">title</th>
                    <th width="100%">genere</th>
                    <th width="100%">artista</th>
                    <th width="100%">Audio</th>
                    <th width="1%" class="text-center" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($songlist as $song) { ?>
                    <tr>
                        <td><?php echo $song->song_id; ?></td>
                        <td>
                            <a href="<?php echo Config::SITE_URL . 'controller/song_edit_controller.php?id=' . $song->song_id ?>">
                                <?php echo $song->title; ?>
                            </a>
                        </td>
                        <td><?php echo $song->nameGenre; ?></td>
                        <td><?php echo $song->nameArtist; ?></td>

                        <td>
                            <audio controls>
                                <source src="<?php echo Config::SITE_URL . '/uploads/' . $song->filename; ?>" type="audio/mpeg" />
                            </audio>
                        </td>
                        <td class="text-center">
                            <a href="<?= Config::SITE_URL . 'controller/song_delete_controller.php?id=' . $song->song_id ?>" class="text-danger">delete</a>
                        </td>
                    </tr>

                <?php } // end foreach ?>
            </tbody>
        </table>
    <?php } else { ?> <div class="alert alert-secondary"> nessuna canzone disponibile </div> <?php } ?>
</div>

<?php View::render('footer'); ?>