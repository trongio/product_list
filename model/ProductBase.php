<?php

use app\db\Database;

include_once __DIR__."/ProductAbstract.php";
include_once __DIR__."/../db/Database.php";

class ProductBase extends ProductAbstract
{
    private string $type;
    private string $sku;
    private string $name;
    private int $price;

    public function __construct($sku, $type="", $name="", $price=0)
    {
        $this->type = $type;
        $this->sku = $sku;
        $this->name =$name;
        $this->price = $price;
    }

    protected function add()
    {
        return "";
    }

    public function Delete(){
        $database = new Database();
        $database->delete($this->sku);
    }

    public function render()
    {
        return "";
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku($prop)
    {
        $this->sku = $prop;
    }

    public function setName($prop)
    {
        $this->name = $prop;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setType($prop)
    {
        $this->type = $prop;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setPrice($prop)
    {
        $this->price = $prop;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}