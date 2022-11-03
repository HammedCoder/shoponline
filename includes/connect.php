<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'onlineshop';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$db) {
  echo ("Error connecting to the database");
}
