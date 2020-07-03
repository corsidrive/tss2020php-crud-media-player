<?php
session_start();
include "../autoload.php";
include "../bin/test_tools/testTools.php";
echo "-------------------\n";

// trucate account

// POST FORM REGISTRAZIONE
$account = new Account();
$account->setEmail('a@a.it');
$account->setUsername('a');
$account->setPasswordHash('a');

$account->save();

$model = new AccountModel(Db::getInstance());


$accountA = $model->usernameExists('a');

$hash = $accountA->getPasswordHash(); // varchar(10)


assertEquals('verifico la password di a',password_verify('a',$hash),true);
assertEquals('utente e un istanza di account',get_class($accountA),'Account');


// -------------------------------
// isericìsco utenti c
$session = new UserSession();
$accountCiccio = $session->logIn('a','a');

assertEquals('utente che non esiste',$accountCiccio->getUsername(),'a');


print_r($_SESSION);

//speech("ciao");
