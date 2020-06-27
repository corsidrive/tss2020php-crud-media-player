<?php
require("./test/bin/testTools.php");

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

