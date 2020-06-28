<?php


function null_or_integer($value)
{
    return empty($value) ? null : filter_var($value, FILTER_VALIDATE_INT);
}

assertEquals('stringa vuota',null_or_integer(''),NULL);
assertEquals('uno stringa',null_or_integer('1'),1);
assertEquals('due stringa',null_or_integer('2'),2);
assertEquals('tre intero',null_or_integer(3),3);
assertEquals('tre con la virgola',null_or_integer(3.0),3);
assertEquals('valore alfanumerico',null_or_integer("a"),false);
assertEquals('zero stringa NULL',null_or_integer("0"),NULL);

include "./class/Validate.php";


$tests = [
    ['stringa vuota','',NULL],
    ['uno stringa','1',1],
    ['due stringa','2',2],
    ['tre intero',3,3],
    ['tre con la virgola',3.0,3],
    ['valore alfanumerico',"a",false],
    ['zero stringa NULL',"0",NULL]
];

foreach ($tests as  $test) {
    list($message,$actual,$exceped) = $test;
    assertEquals($message,Validate::is_int_or_null($actual),$exceped);
}
