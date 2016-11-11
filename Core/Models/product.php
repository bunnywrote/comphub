<?php
class Product extends mysqli {
    protected $name = "products";
    protected $db;
    private $product_id, $product_name, $product_model, $product_price;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function insertProduct($product_id, $product_name, $product_model, $product_price, $db)
    {
//        $this->db = $db;
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->product_model = $product_model;
        $this->product_price = $product_price;

        // prepare statement with placeholders
        $statement = $db->prepare("INSERT INTO products (product_id, product_name, product_model, product_price) VALUES ($product_id, $product_id, $product_id, $product_price)");

        // bind placeholders to parameters: i/ntegers, d/ouble, s/tring, b/lob
        $statement->bind_param('issd', $product_id, $product_name, $product_model, $product_price);

        // execute statement
        $statement->execute();
    }

    public function createProduct()
    {
        //TODO implement
    }

    public function getProduct($db)
    {
        // send a query and get mysqli_result object
        $result = $db->query("SELECT * FROM products;");

        // get the first result row as associative array
        $row = $result->fetch_assoc();
        // show the row
        echo $row["product_name"];
        echo $row["product_model"];
        echo $row["product_price"];

        // close result
        $result->close();
    }

    public function getAllProducts($db)
    {
//        return $this->db::doQuery('SELECT * FROM '.$this->name);
        $result = $db->query("SELECT * FROM products;");
        while ($products = $result->fetch_object("Product"))
            echo $products."<br />";

        // close result
        $result->close();
    }

    // build a string with the product attributes
    public function __toString()
    {
        return sprintf("%d) %s %s %d",
            $this->product_id, $this->product_name, $this->product_model, $this->product_price);
    }
}
?>