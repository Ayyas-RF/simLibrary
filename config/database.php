<?php
class Database
{
  private $host = "127.0.0.1";
  private $dbname = "library";
  private $username = "root";
  private $password = "1234";
  public $conn;

  public function connect()
  {
    $this->conn = null;
    try {
      $this->conn = new PDO(
        "mysql:host=" . $this->host . ";dbname=" . $this->dbname,
        $this->username,
        $this->password
      );
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Connection Error: " . $e->getMessage();
    }
    return $this->conn;
  }
}
