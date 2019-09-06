<?php
function displayContactForm() {
  displayHeader("Contact Us");
  displayNavigation("Contact");
  include(__DIR__ . "/../../resources/views/forms/contact.inc.php");
  displaySideSections();
  displayFooter();
}

function render() {
  if (isset($_GET["page"])) {
    $func = decodeFunctionName($_GET["page"]);
    $func();
  } else {
    displayContactForm();
  }
}
?>
