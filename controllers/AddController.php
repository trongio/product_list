<?php

namespace app\controllers;

use app\db\Database;

require_once __DIR__ . '/../db/Database.php';

    $db=new Database();

    if(isset($_POST['save'])){
        if($_POST['type']=="DVD"){
            $db->addProduct(
                "DVD",
                $_POST['sku'],
                $_POST['name'],
                $_POST['price'],
                $_POST['size']);
        }
        if($_POST['type']=="book"){
            $db->addProduct(
                "book",
                $_POST['sku'],
                $_POST['name'],
                $_POST['price'],
                $_POST['weight']);
        }
        if($_POST['type']=="furniture"){
            $db->addProduct(
                "furniture",
                $_POST['sku'],
                $_POST['name'],
                $_POST['price'],
                $_POST['height']."x".$_POST['width']."x".$_POST['length']);
        }
    }
header("LOCATION:../products.php");