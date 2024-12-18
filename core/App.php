<?php
class App
{
  public function __construct()
  {
    $url = $this->parseUrl();
    $controllerName = ucfirst($url[0]) . "Controller";
    $method = $url[1] ?? "index";

    $controllerPath = "../app/controllers/" . $controllerName . ".php";
    if (file_exists($controllerPath)) {
      require_once $controllerPath;
      $controller = new $controllerName();

      if (method_exists($controller, $method)) {
        $controller->{$method}();
      } else {
        die("Error: Method '" . $method . "' not found in " . $controllerName);
      }
    } else {
      die("Error: Controller '" . $controllerName . "' not found.");
    }
  }

  private function parseUrl()
  {
    return explode(
      "/",
      filter_var(trim($_GET["url"] ?? "home", "/"), FILTER_SANITIZE_URL)
    );
  }
}
