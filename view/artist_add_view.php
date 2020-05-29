<?php View::render('head'); ?>
<?php View::render('nav');  ?>

<?php View::render('jumbotron', ['lead' => "aggiungi nuovo artista", 'site_name' => "Supercal"]); ?>


<main class="container">

<div class="card">
    <div class="card-header">
        <h1 class="h5 text-normal m-1">Nuovo artista</h1>
    </div>
    <div class="card-body">
       
       <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
           <div class="form-group">
               <label for="name">Nome dell'artista</label>
               <input id="name" value="" class="form-control" type="text" name="artist_name">
           </div>
           <div class="form-group">
              <button type="submit" class="btn btn-primary">aggiungi</button>
           </div>
       </form>
    </div>
</div>

</main>


<?php View::render('footer');