<?php
  session_start();
  require_once 'db_connect.php';
  $username=$_SESSION["user"];
  $result=mysql_query("UPDATE user SET status=0 WHERE username='$username'",$link) or die(mysql_error());
  session_destroy();
  header("Location:index.php");
?>