<?php
        function null_or_integer ($value){
            return empty($value) ? NULL : filter_var($value,FILTER_VALIDATE_INT);
        }



        $pdo = new PDO('mysql:mysql:host=localhost','root','fiacca');
        $pdo->query('
                 DROP DATABASE if EXISTS dbtest;
                 CREATE DATABASE dbtest;
                 USE dbtest;
                 CREATE TABLE test (`valore` INT NULL);
                 ')
                 ->execute();
                 
                $stm = $pdo->prepare('INSERT INTO test (valore) VALUES (:valore)');
                $stm->bindValue(':valore',NULL,PDO::PARAM_INT);
                $stm->execute();
                 
                $stm = $pdo->query('SELECT * FROM test');
                $res = $stm->fetchAll(PDO::FETCH_OBJ);

                var_dump($res[0]->valore);

?>
