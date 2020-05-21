<?php View::render('head'); ?>
<?php View::render('nav');  ?>

<?php View::render('jumbotron',['lead' => "elenco degli artisti",'site_name' => "Supercal"]); ?>

<?php // print_r($artisti) ?>
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
                    <td><a href="<?php echo $artsta->name;  ?>"><?php echo $artista->name;  ?></a></td>
                    <td class="text-center"><a href="index.html" class="text-danger">delete</a></td>
                </tr>
            
            <?php } ?>

            </tbody>
        </table>

<?php View::render('footer');