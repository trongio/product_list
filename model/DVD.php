<?php

use app\db\Database;

include_once "ProductBase.php";
include_once __DIR__."/../db/Database.php";

class DVD extends ProductBase
{
    private string $size;

    public function __construct($sku, $type, $name, $price, $size)
    {
        parent::__construct($sku, $type, $name, $price);
        $this->size = $size;
    }

    public function add()
    {
        $database = new Database();
        $database->addProduct($this->getType(),$this->getSku(), $this->getName(), $this->getPrice(), $this->size);
    }


    public function render()
    {
        return '
                <div id="' . $this->getSku() . '" class="card" >
                    <div class="card-body">
                        <input type="checkbox" name="checkbox[]" value="' . $this->getSku() . '">
                        <div class="card-info">
                            <h3>' . $this->getSku() . '</h3>
                            <h3>' . $this->getName() . '</h3>
                            <h3>' . $this->getPrice() . ' $</h3>
                            <h3>' . $this->size . '</h3>
                        </div>
                    </div>
                </div>
                ';
    }

}