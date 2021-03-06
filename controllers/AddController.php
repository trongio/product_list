<?php

namespace app\controllers;

use app\db\Database;

require_once __DIR__ . '/../db/Database.php';
require_once __DIR__.'/../model/Book.php';
require_once __DIR__.'/../model/DVD.php';
require_once __DIR__.'/../model/Furniture.php';
require_once __DIR__.'/../model/ProductBase.php';

function getBody()
{
    foreach ($_POST as $key => $value) {
        $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    return $data;
}

$data = getBody();
$errors = [];
$db=new Database();
$uniqueSku=$db->checkSku($data['sku']);

if (!$data['size']) {
    $errors['size'] = "size is required";
}
if (!$data['weight']) {
    $errors['weight'] = "weight is required";
}
if (!$data['height']) {
    $errors['height'] = "height is required";
}
if (!$data['width']) {
    $errors['width'] = "width is required";
}
if (!$data['length']) {
    $errors['length'] = "length is required";
}
if (!$data['price']) {
    $errors['price'] = "price is required";
}
if (!$data['sku']) {
    $errors['sku'] = "sku is required";
}
if (!$data['type']) {
    $errors['type'] = "type is required";
}
if (!$data['name']) {
    $errors['name'] = "name is required";
}
if ($uniqueSku) {
    $errors['sku'] = "sku already in use";
}
if (intval($data['size'],$base = 10)<0) $errors['size'] = "size must be more than 0";
if (intval($data['weight'],$base = 10)<0) $errors['weight'] = "weight must be more than 0";
if (intval($data['height'],$base = 10)<0) $errors['height'] = "height must be more than 0";
if (intval($data['width'],$base = 10)<0)$errors['width'] = "width must be more than 0";
if (intval($data['length'],$base = 10)<0) $errors['length'] = "length must be more than 0";
if (intval($data['price'],$base = 10)<0) $errors['price'] = "price must be more than 0";

if (empty($errors)) {
    $instance = new $data['type']($data['sku'], $data['type'], $data['name'], $data['price'], $data['data']);
    $instance->add();
    echo "success";
}
 {
    foreach ($errors as $error) {
        echo "<p>";
        echo $error;
        echo "</p>";
    }
}