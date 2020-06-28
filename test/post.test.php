<?php

// print_r(scandir('.'));
require_once "../autoload.php";

print_r($_POST);

$idGenereField = new ValidationField(
    'genre_id',
    'is_int_or_null',
    'campo intero o nullo',
    ['required' => false]
);

var_dump($idGenereField->getValue()==NULL);


?>