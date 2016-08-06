<?php
  session_start();
  require_once 'db_connect.php';
  if(!isset($_SESSION["user"]))
  	header("Location: index.php");
?>
WELCOME
<?php
echo $_SESSION["user"];
?>