<?php

namespace app\controllers;

use app\db\Database;

require_once __DIR__ . '/../db/Database.php';
$db=new Database();

if(isset($_POST['delete']) && isset($_POST['checkbox'])){
    var_dump($_POST);
    $ckboxes=$_POST['checkbox'];
    foreach ($ckboxes as $box){
        $db->Delete($box);
    }
}
header("LOCATION:../products.php");