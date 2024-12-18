<?php
require_once "../config/database.php";
require_once "../core/Controller.php";
require_once "../app/models/Book.php";

if (isset($_GET["query"])) {
  $bookModel = new Book();
  $searchResults = $bookModel->searchBooks($_GET["query"]);
  echo json_encode($searchResults);
}
