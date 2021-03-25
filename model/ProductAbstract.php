<?php


abstract class ProductAbstract
{
    abstract protected function add();
    abstract protected function delete();
    abstract public function getSku();
    abstract public function setSku($prop);
    abstract public function setName($prop);
    abstract public function getName();
    abstract public function setType($prop);
    abstract public function getType();
    abstract public function setPrice($prop);
    abstract public function getPrice();
    abstract public function render();
}