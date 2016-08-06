    <?php
      session_start();
      require_once 'db_connect.php';
      if(isset($_POST["login"]))
      {
      	$username=$_POST["name"];
      	$password=$_POST["password"];
      	$_SESSION["user"]="logged";
      }
      else if(isset($_POST["signup"]))
      {
      	$email=$_POST["email"];
      	$name=$_POST["name"];
      	$password=$_POST["password"];
      	$_SESSION["user"]="logged";
      }
      else
      {
      	$_SESSION["user"]="guest";
      }
    ?>
