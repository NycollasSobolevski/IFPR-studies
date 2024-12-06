<?php
class DBConnection 
{
    private $host = "CT-C-002AF\\SQLEXPRESS";
    private $dbname = "ifpr";
    private $username  = "";
    private $password = "";
    private $conn;

    public function getConnection()
    {
        if($this->conn === null)
        {
            try {
                $this->conn = new PDO("sqlsrv:server={$this->host};Database={$this->dbname}", $this->username, $this->password );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " .$e->getMessage();
            }
        }
        return $this->conn;
    }
}
?>  