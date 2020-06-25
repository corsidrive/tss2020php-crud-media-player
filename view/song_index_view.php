<?php View::render('head',['title'=>$lead]); ?>
<?php View::render('nav') ?>
<?php View::render('jumbotron', ['lead' => $lead, 'site_name' => Config::SITE_NAME]); ?>

<div class="container">

    <a href="<?= Config::SITE_URL . 'controller/song_add_controller.php' ?>">aggiungi canzone</a>
    
    <?php if ($songlist != null) { ?>
        <table class="table  mt-3">
            <thead class="thead-light">
                <tr>
                    <th width="1%">#</th>
                    <th>title</th>
                    <th>genere</th>
                    <th>artista</th>
                    <th>Audio</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($songlist as $song) { ?>
                    <tr>
                        <td class="align-middle"><?php echo $song->song_id; ?></td>
                        <td class="align-middle">
                            <a href="<?php echo Config::SITE_URL . 'controller/song_edit_controller.php?id=' . $song->song_id ?>">
                                <?php echo $song->title; ?>
                            </a>
                        </td>
                        <td class="align-middle"><?php echo $song->genreName ?  : 'sconosciuto' ; ?></td>
                        <td class="align-middle"><?php echo $song->artistName ? : 'sconosciuto' ; ?></td>

                        <td class="align-middle">
                            <audio controls>
                                <source src="<?php echo Config::SITE_URL . '/uploads/' . $song->filename; ?>" type="audio/mpeg" />
                            </audio>
                        </td>
                        <td class="text-center align-middle">
                            <a href="<?= Config::SITE_URL . 'controller/song_delete_controller.php?id=' . $song->song_id ?>" class="text-danger">delete</a>
                        </td>
                    </tr>

                <?php } // end foreach ?>
            </tbody>
        </table>
    <?php } else { ?> <div class="alert alert-secondary mt-3"> nessuna canzone disponibile </div> <?php } ?>
</div>

<?php View::render('footer'); ?>