<?php

require_once ("db.php");

class Product {

    protected $dbname = "products";
    private $name, $price, $descr_en, $descr_de, $descr_fr, $brand_id;

    public function __construct()
    {}

    public function update()
    {
        // prepare statement with placeholders
        $statement = DB::getInstance()->doQuery("INSERT INTO products (name, price) VALUES ($this->name, $this->price, $this->descr_en, $this->descr_de, $this->descr_fr, $this->brand_id)");

        // bind placeholders to parameters: i/ntegers, d/ouble, s/tring, b/lob
        $statement->bind_param('sisssi', name,  price, descr_en, descr_de, descr_fr, brand_id);

        // execute statement
        $statement->execute();
    }

    public function createProduct()
    {
        //TODO implement
    }

    public function getProduct()
    {
        // send a query and get mysqli_result object
        $result = DB::getInstance()->doQuery("SELECT * FROM".$this->dbname);

        // get the first result row as associative array
        $row = $result->fetch_assoc();
        // show the row
        echo $row["name"];
        echo $row["price"];

        // close result
        $result->close();
    }

    public function getAllProducts()
    {
        $result = DB::getInstance()->doQuery("SELECT * FROM ".$this->dbname);
        while ($products = $result->fetch_object("Product"))
            var_dump($products);

        // close result
        $result->close();
    }

}
?>