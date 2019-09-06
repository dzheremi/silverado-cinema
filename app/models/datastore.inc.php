<?php

function readAll($model) {
  touch(__DIR__ . '/../../database/' . $model . '.dat');
  $object = file_get_contents(__DIR__ . '/../../database/' . $model . '.dat');
  return unserialize($object);
}

function saveAll($data, $model) {
  $object = serialize($data);
  touch(__DIR__ . '/../../database/' . $model . '.dat');
  file_put_contents(__DIR__ . '/../../database/' . $model . '.dat', $object, LOCK_EX);
  return true;
}

function getJSONData() {
  $data = json_decode(file_get_contents('http://saturn.csit.rmit.edu.au/~e54061/wp/moviesJSON.php'), true);
  return $data;
}

?>
