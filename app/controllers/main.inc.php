<?php
require_once(__DIR__ . '/../../app/models/models.inc.php');

loadMovies();
loadScreenings();

function servePage($section) {
  include(__DIR__ . "/../../resources/views/layout/header.inc.php");
  include(__DIR__ . "/../../resources/views/layout/navigation.inc.php");
  include(__DIR__ . "/../../resources/views/layout/side_section.inc.php");
  include(__DIR__ . "/../../resources/views/layout/footer.inc.php");
  include(__DIR__ . "/" . $section . ".inc.php");
  render();
}

function urlFor($controller, $function = "", $id = "", $params = "") {
  $url = "?section=" . $controller;
  if($function != "") {
    $url .= "&page=" . encodeFunctionName($function);
  }
  if($id != "") {
    $url .= "&id=" . $id;
  }
  if($params != "") {
    $url .= "&" . $params;
  }
  return $url;
}

function encodeFunctionName($function) {
  $name = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $function));
  return $name;
}

function decodeFunctionName($function) {
  $func = create_function('$c', 'return strtoupper($c[1]);');
  return preg_replace_callback('/_([a-z])/', $func, $function);
}


?>
