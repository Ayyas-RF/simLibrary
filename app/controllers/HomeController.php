<?php
class HomeController extends Controller
{
  public function index()
  {
    $bookModel = $this->model("Book");
    $data["greetings"] = [
      "Welcome to our library!",
      "Discover your next favorite book.",
      "Let’s read and grow together!",
    ];
    $data["recommendedBooks"] = $bookModel->getRecommendedBooks();
    $this->view("home", $data);
  }
}
