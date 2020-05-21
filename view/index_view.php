<?php View::render('head'); ?>
<?php View::render('nav');  ?>

<?php View::render('jumbotron',
        ['lead' => "Ciao ragazzi",'site_name' => "Supercal"]); ?>

<main role="main" class="cover-container d-flex h-100 p-2  flex-column align-items-center justify-content-start">
        <h1 class="display-4">Media Library</h1>
</main>




<?php View::render('footer'); ?>
