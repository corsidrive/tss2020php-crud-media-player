<?php
require_once './autoload.php';
// include_once __DIR__.'/testTools.php';
require_once './test/TestTools.php';
exec('cls');
$testDirectory = "./test/*.php";
$tests = glob($testDirectory);

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
