<?php
session_start();
if (isset($_GET['success'])) {
  session_destroy();
  echo "<script>setTimeout(function(){window.location.href='../index.php'}, 2000)</script>";
}
