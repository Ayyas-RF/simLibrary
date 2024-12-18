<?php
class Book
{
  private $db;

  public function __construct()
  {
    $this->db = (new Database())->connect();
  }

  public function getRecommendedBooks()
  {
    $query = "SELECT title, author FROM books WHERE recommended = 1 LIMIT 5";
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function searchBooks($query)
  {
    $query = "%" . $query . "%";
    $sql = "SELECT * FROM books WHERE title LIKE :query OR author LIKE :query";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":query", $query, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
