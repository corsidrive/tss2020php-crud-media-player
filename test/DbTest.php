<?php
include '../autoload.php';

echo "la connessione deve essere sempre la stessa\n";
var_dump(Db::getInstance() === Db::getInstance());

echo "deve essere un istanza del PDO \n";
var_dump(is_a(Db::getInstance(),'PDO'));