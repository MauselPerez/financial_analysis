<?php
class Report 
{
    private $conn;
    
    public function __construct($db) 
    {
        $this->conn = $db;
    }

    public function create_report($product, $price, $year) 
    {
        $query = "INSERT INTO fa_reports (product_id, price, year) VALUES (:product, :price, :year)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':product', $product);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':year', $year);
        $stmt->execute();
    }

    public function get_report() 
    {
        $query = "SELECT
                    fr.product_id,
                    fp.name AS product,
                    fr.year,
                    SUM(fr.price) AS total_price
                FROM 
                    fa_reports fr
                INNER JOIN
                    fa_products fp
                ON fp.id = fr.product_id
                GROUP BY
                    fr.product_id, fr.year";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function get_report_by_product($productId) 
    {
        $query = "SELECT
                    fr.year,
                    SUM(fr.price) AS total_price
                FROM 
                    fa_reports fr
                WHERE
                    fr.product_id = :product_id
                GROUP BY
                    fr.year";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        return $stmt;
    }

    public function get_product_name($productId) 
    {
        $query = "SELECT name FROM fa_products WHERE id = :product_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['name'];
    }

} 

?>