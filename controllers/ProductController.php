<?php

namespace app\controllers;


use ProductBase;


require_once __DIR__.'/../model/Book.php';
require_once __DIR__.'/../model/DVD.php';
require_once __DIR__.'/../model/Furniture.php';
require_once __DIR__.'/../model/ProductBase.php';

if(isset($_POST['delete']) && isset($_POST['checkbox'])){
    $ckboxes=$_POST['checkbox'];
    foreach ($ckboxes as $box){
        $instance = new ProductBase($box);
        $instance->delete();
    }
}
header("LOCATION:../products.php");