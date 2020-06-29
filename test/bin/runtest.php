<?php
require_once './autoload.php';
require_once './test/bin/TestTools.php';
require_once './test/bin/dbTestTools.php';
exec('cls');
$testDirectory = "./test/*.test.php";
// glob permette di ottenre tutti i file nella directory test con estensione php
$tests = glob($testDirectory);
// print_r($tests);
delete_static();
try {
    foreach ($tests as $test) {
        include $test;
    }
    
} catch (\Throwable $th) {
    
    echo red("-- ERRORE --")."\n";
    echo $test."\n";
    echo red($th->getMessage())."\n";
    echo $th->getFile()."\n";
    echo "linea: ".$th->getLine()."\n";
    speech("errore");
}

echo "----------------------------\n";
echo "Fine del test \n";
echo "----------------------------\n";
speech("Test finiti");
