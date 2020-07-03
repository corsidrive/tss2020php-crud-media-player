<?php
require_once './autoload.php';
require_once './bin/test_tools/TestTools.php';
require_once './bin/test_tools/dbTestTools.php';
exec('clear');
echo "\n\n\n\n----------------------------\n";
// echo "Inizio del test ".date(DATE_RFC2822)."\n";
echo "Inizio del test \n\n";

$testDirectory = "./test/*.test.php";
// glob permette di ottenere tutti i file nella directory test con estensione php
$tests = glob($testDirectory);

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

// echo "----------------------------\n";
echo "\nFine del test \n";
echo "----------------------------\n";
speech("Test finiti\n\n");
