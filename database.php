<?php

$db_host = "localhost";
$db_name = "quiz2";
$db_user = "root";
$db_pass = "coderslab";

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($mysqli->connect_error) {
  printf("Connect failed: ". $mysqli->connect_error);
  exit();
}

 ?>
