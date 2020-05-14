<?php
include '../autoload.php';

echo "la connessione deve essere sempre la stessa\n";
var_dump(Db::getInstance() === Db::getInstance());

echo "deve essere un istanza del PDO \n";
var_dump(is_a(Db::getInstance(),'PDO'));

// 
// "1" == 1  true
// "1" === 1 false
// 0 == false  | true
// 0 === false | false
