<?php
  session_start();
  require_once 'db_connect.php';
  if(!isset($_SESSION["user"]))
  	header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IncubateX</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <!-- Custom stylesheets -->
    <link rel="stylesheet" href="css/login.css"  charset="utf-8">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<header>
		WELCOME <?php echo $_SESSION["user"]; ?>
    <a href="logout.php">Logout</a>
  	</header>
  	<section>
      <?php
        $result=mysql_query("SELECT * FROM user");
        while($row=mysql_fetch_assoc($result)):
        ?>
        <!-- Usernames -->
        <?php
          echo $row["username"]  . "<br>";
        ?>
        <?php
          echo "<br>" . $row["username"];
          if($row["status"]==1)
          	echo "<span></span>";
        ?>
        <!-- end -->
        <?php
        endwhile;
      ?>
	  </section>
	  <footer>

	  </footer>
    <!-- jQuery (Must for Bootstrap) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <!-- Bootstrap script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>
