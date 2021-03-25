<?php

namespace app\db;
use \PDO;


class Database
{

    public PDO $pdo;
    public function __construct()
    {
        $config = require __DIR__ . '/config.php';

        $servername = $config['host'];
        $username = $config['username'];
        $password = $config['password'];
        $database = $config['database'];

        $this->pdo = new \PDO("mysql:host=$servername;dbname=$database", $username, $password);
    }


    public function addProduct($type,$sku,$name,$price,$info){

        $statement = $this->pdo->prepare("insert into products (type,sku,name,price,info) 
                                                    Values (:type,:sku,:name,:price,:info)");
        $statement->bindParam(':type',$type);
        $statement->bindParam(':sku',$sku);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':price',$price);
        $statement->bindParam(':info',$info);
        return $statement->execute();
    }

    public function getProducts(){
        $statement = $this->pdo->prepare("SELECT * FROM products");
        $statement->execute();
        $products =  $statement->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function checkSku($sku){
        $statement = $this->pdo->prepare("SELECT * FROM products where sku=:sku");
        $statement->bindValue(':sku',$sku);
        $statement->execute();
        $products =  $statement->fetchAll(PDO::FETCH_ASSOC);
        if ($products[0]){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete($delSku){
        $statement = $this->pdo->prepare("DELETE FROM products WHERE sku=:delSku");
        $statement->bindValue(':delSku',$delSku);
        $statement->execute();

    }


}