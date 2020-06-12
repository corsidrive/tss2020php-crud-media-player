<?php View::render('head'); ?>
<?php View::render('nav')  ?>

<?php View::render('jumbotron', 
                                [ 'lead' => "Elenco delle canzoni", 'site_name' => "Supercal" ]  ); ?>



    <div class="container">

    <a href="<?= Config::SITE_URL.'controller/song_add_controller.php' ?>" >aggiungi canzone</a>

    
    <!-- TODO: elenco delle canzoni  -->
    
<?php View::render('footer');