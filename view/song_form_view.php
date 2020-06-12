<?php View::render('head'); ?>
<?php View::render('nav');  ?>

<?php View::render('jumbotron', ['lead' => $lead, 'site_name' => "Supercal"]); ?>

<main class="container">

<div class="card">
    <div class="card-header">
        <h1 class="h5 text-normal m-1"><?= $mode ?> </h1>
    </div>
    <div class="card-body">
       
    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Titolo</label>
                <input id="title" value=""  class="form-control" type="text">
            </div>
            <div class="form-group">
                <label for="artist">Artista</label>
                <select id="artist" class="form-control">
                    <option selected >sconosciuto</option>
                    <option >Mario</option>
                </select>
            </div>
            <div class="form-group">
                <label for="artist">Genere</label>
                <select id="genre" class="form-control">
                    <option selected >sconosciuto</option>
                    <option >Rock</option>
                </select>
            </div>
            <div class="form-group">
                <label for="filename">File</label>
                <input type="file" class="form-control" name="filename" id="filename">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">aggiungi</button>
             </div>
        </form>
    </div>
</div>

</main>


<?php View::render('footer');