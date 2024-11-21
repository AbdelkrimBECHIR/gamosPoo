<?php

try{
$dbh= new PDO('MYSQL_HOST,MYSQL_PORT,MYSQL_USER,MYSQL_PASS');
}catch(PDOException $e){
    error_log($e->getMessage());
    die('une erreur s\'est produite');
}
