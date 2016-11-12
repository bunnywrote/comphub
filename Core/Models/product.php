<?php
require_once("BaseEntity.php");

class Product extends BaseEntity{
    protected $tableName = "products";

    public $id, $nameEN, $nameDE, $nameFR, $parentId; 

    public function __construct()
    {
        parent::__construct();
        echo(__CLASS__);
    }

    public static function create(Product $product){

        $query = "INSERT INTO ".$this->tableName." (nameEN, nameDE, nameFR, parentId) VALUE (?,?,?,?)";

        $this->db->prepare($query);
        $this->db->bind_param('sssi', $product->nameEN, $product->nameDE, $product->nameFR, $product->parentId);

        if(!$success) return false;
        return $this->db::doQuery($query);
    }

    public function update()
    {
        //TODO implement
    }

    public function get(){
        //TODO implement
    }

    public function getAllProducts()
    {
        // var_dump($this->db);
        return $this->db::doQuery('SELECT * FROM '.$this->tableName);
    }
}
?>