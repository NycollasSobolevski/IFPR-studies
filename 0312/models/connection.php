<?php
class DBConnection 
{
    private $host = "localhost";
    private $dbname = "ifpr";
    private $username  = "root";
    private $password = "";
    private $conn;

    public function getConnection()
    {
        if($this->conn === null)
        {
            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " .$e->getMessage();
            }
        }
        return $this->conn;
    }
}
?>