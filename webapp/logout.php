<?php
  session_start();
  require_once 'db_connect.php';
  session_destroy();
  header("Location:index.php");
?>