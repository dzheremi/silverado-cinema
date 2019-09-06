<?php
function displayHome() {
  displayHeader("Home");
  displayNavigation("Home");
  include(__DIR__ . "/../../resources/views/information/home.inc.php");
  displaySideSections();
  displayFooter();
}

function displayAboutUs() {
  displayHeader("About Us");
  displayNavigation("About");
  include(__DIR__ . "/../../resources/views/information/about.inc.php");
  displaySideSections();
  displayFooter();
}

function render() {
  if(isset($_GET["page"])) {
    $func = decodeFunctionName($_GET["page"]);
    $func();
  } else {
    displayHome();
  }
}
?>
