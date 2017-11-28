<?php
session_start();
if (!isset($_SESSION['user'])) {
  readfile('login.html');
}
session_destroy();
header("location:index.php");
?>