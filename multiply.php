<?php
if (isset($_GET['q']) && isset($_GET['price'])) {
  echo $_GET['q'] * $_GET['price'];
}
