<?php
class Product{
    protected $name = "products";
    protected $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function insertProduct(){
        //TODO implement
    }

    public function createProduct()
    {
        //TODO implement
    }

    public function getProduct(){
        //TODO implement
    }

    public function getAllProducts()
    {
        return $this->db::doQuery('SELECT * FROM '.$this->name);
    }
}
?>