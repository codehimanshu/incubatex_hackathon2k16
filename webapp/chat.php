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
    <link rel="stylesheet" href="css/chat.css"  charset="utf-8">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


    <div class='full container-fluid'>
      <div class='chat-box container-fluid '>
          <div class='row '>
            <!-- User section -->
            <div class="sidebar col-xs-12 col-sm-4">

              <div class="current-user row">
                <img class="user img-responsive" src="http://placehold.it/300/09f/fff.png" alt="Image" />
                <a href="#"><?php echo $_SESSION["user"]; ?></a>
                <button type="button" class="settings btn btn-default dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="fa fa-ellipsis-v fa-2x"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="logout.php">Logout</a></li>
                </ul>
              </div>

              <div class="list row">

                <!-- User list` -->
                <ul class="user-list">
                    <?php
                      $result=mysql_query("SELECT * FROM user");
                      while($row=mysql_fetch_assoc($result)):
                      ?>

                      <?php
                        echo "<li id='$row[id]' type=button class='get-data user'>";
                        echo $row["username"]  . "<br>";
                      ?>
                      <?php
                        if($row["status"]==1)
                        	echo "<span></span>";
                      ?>
                    </li>


                      <?php
                      endwhile;
                    ?>
                </ul>
              </div>
            </div>
            <!-- Chat section -->
            <div class="chat-wrap hide col-xs-12 col-sm-8">

              <div class="chat-user row">
                <img class="user img-responsive" src="http://placehold.it/300/09f/fff.png" alt="Image" />
                <a href="#">Username</a>
                <button type="button" class="back btn btn-default dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="fa fa-angle-left fa-2x"></span>
                </button>
              </div>



            </div>
          </div>
      </div>
    </div>


	  <footer>

	  </footer>
    <!-- jQuery (Must for Bootstrap) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <!-- Bootstrap script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/client.js"></script>
  </body>
</html>
