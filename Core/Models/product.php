<?php
<<<<<<< HEAD
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
=======

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
>>>>>>> eff0c24bf4695d6677d374f4bc73e34192dd1e8f
    }

    public function update()
    {
        //TODO implement
    }

<<<<<<< HEAD
    public function get(){
        //TODO implement
=======
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
>>>>>>> eff0c24bf4695d6677d374f4bc73e34192dd1e8f
    }

    public function getAllProducts()
    {
<<<<<<< HEAD
        // var_dump($this->db);
        return $this->db::doQuery('SELECT * FROM '.$this->tableName);
=======
        $result = DB::getInstance()->doQuery("SELECT * FROM ".$this->dbname);
        while ($products = $result->fetch_object("Product"))
            var_dump($products);

        // close result
        $result->close();
>>>>>>> eff0c24bf4695d6677d374f4bc73e34192dd1e8f
    }

}
?>