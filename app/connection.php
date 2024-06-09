<?php
    $dsn = "mysql:dbname=db_prod;host=db";
    $user = "root";
    $password = "";

    try{
        $connection = new PDO($dsn, $user, $password);
    }catch(PDOException $e){
        echo "Connection failed ".$e->getMessage();
    }
?>