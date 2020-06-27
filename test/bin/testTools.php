<?php

function assertEquals($message,$actual,$expected) {

    if($expected !== $actual) {
        extract(debug_backtrace()[0]);
        //print_r(debug_backtrace()[0]);
        //echo "--------------------------------------- \n";
        echo "\n\nfail: $message \n";
        echo "expected      $expected (".gettype($expected).")\n";
        echo "actual        $actual (".gettype($actual).")\n\n";
        echo basename($file) . " (line: ".$line.")\n";
        
        speech($message . ". Fallito linea ".$line." file: ".basename($file) );
    }
    
} 

function beep()
{
    fprintf ( STDOUT, "%s", "\x07" );  
}

function red($message){
    // return "\e[31m$message\e[0m";
    echo "\n-----------------------\n";
    echo "- $message";
    echo "\n-----------------------\n";
};

function speech($text) {
    $sql = 'mshta vbscript:Execute("CreateObject(""SAPI.SpVoice"").Speak(""'.$text.'"")(window.close)")';
    exec($sql);
}