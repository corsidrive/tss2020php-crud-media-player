<?php View::render('head'); ?>
<?php View::render('nav');  ?>

<?php View::render('jumbotron', ['lead' => "elenco degli artisti", 'site_name' => "Supercal"]); ?>

<?php // print_r($artisti) 
?>

<div class="container">

    <a href="<?= Config::SITE_URL.'controller/artist_add_controller.php' ?>" >aggiungi artista</a>

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th width="1%">#</th>
                <th width="100%">Artist</th>
                <th width="1%" class="text-center" colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($artisti as  $artista) { ?>

                <tr>
                    <td><?php echo $artista->artist_id ?> </td>
                   
                    <td><a href="<?= Config::SITE_URL.'/controller/artist_edit_controller.php?id='.$artista->artist_id ?>"><?php echo $artista->name;  ?></a></td>
                   
                   
                   
                   
                   
                    <td class="text-center"><a href="<?= Config::SITE_URL.'controller/artist_delete_controller.php?id='.$artista->artist_id ?>" class="text-danger">delete</a></td>
                </tr>

            <?php } ?>

        </tbody>
    </table>
</div>


<?php View::render('footer');
