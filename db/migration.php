<?php

$config = require_once __DIR__ . '/config.php';

$servername = $config['host'];
$username = $config['username'];
$password = $config['password'];
$database = $config['database'];

$conn = new PDO("mysql:host=$servername", $username, $password);

try {
    $sql = "CREATE DATABASE $database";
    $conn->exec($sql);
    echo "Database created successfully" . PHP_EOL;
    $conn->query("use $database");
//    sku,name,price,info
    $sql = "CREATE TABLE products (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        type VARCHAR(255) NOT NULL, 
        sku VARCHAR(255) unique NOT NULL,
        name VARCHAR(255) NOT NULL,
        price integer NOT NULL,
        info VARCHAR(255) NOT NULL
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table \"products\" created successfully" . PHP_EOL;

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}