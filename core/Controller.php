<?php
class Controller
{
  public function view($view, $data = [])
  {
    $viewPath = "../app/views/" . $view . ".php";
    if (file_exists($viewPath)) {
      include_once $viewPath;
    } else {
      die("View file not found: " . $viewPath);
    }
  }

  public function model($model)
  {
    require_once "../app/models/" . $model . ".php";
    return new $model();
  }
}
