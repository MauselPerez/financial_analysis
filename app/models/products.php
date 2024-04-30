<?php
class Products 
{
    private $conn;
    
    public function __construct($db) 
    {
        $this->conn = $db;
    }

    public function create_product($productName) 
    {
        $query = "INSERT INTO fa_products (name) VALUES (:name)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $productName);
        $stmt->execute();
    }

    public function get_products() 
    {
        $query = "SELECT * FROM fa_products";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}

?>