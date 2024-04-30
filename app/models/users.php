<?php
class Users 
{
    private $conn;
    
    public function __construct($db) 
    {
        $this->conn = $db;
    }
    
    public function get_user_by_username($username) 
    {
        $query = "SELECT * FROM fa_users WHERE user = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>