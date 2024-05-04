<?php
    include "connection.php";
    $id = $_GET['id'];

    $query = "DELETE FROM products WHERE id = '$id'";
    
    if($connection->query($query)){
        header("Location: products.php");
        echo "Succes";
              
    }else{
        echo "Erreur de suppression";
    }
    exit();

?>