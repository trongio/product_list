<?php

namespace app\controllers;

use app\db\Database;

require_once __DIR__ . '/../db/Database.php';
require_once __DIR__.'/../model/Book.php';
require_once __DIR__.'/../model/DVD.php';
require_once __DIR__.'/../model/Furniture.php';
require_once __DIR__.'/../model/ProductBase.php';



    $type = $_POST['type'];
    $instance = new $type($_POST['sku'], $_POST['type'], $_POST['name'], $_POST['price'], $_POST['data']);
    $instance->add();

header("LOCATION:../products.php");