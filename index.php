<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['id'])) {
  $_SESSION['id'] = 0;
}

include(__DIR__ . "/app/controllers/main.inc.php");

if(isset($_GET["section"])) {
  servePage($_GET["section"]);
} else {
  servePage("information");
}
?>
