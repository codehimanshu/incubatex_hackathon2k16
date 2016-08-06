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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <header>

  </header>
  <section>

    <!--login-->
    <div class='container-fluid '>
      <div class="row">
          <div class="login col-xs-12 col-sm-4">
            <div class="">
              <span class="fa fa-envira"></span>
              <p>Web Login</p>
            </div>
            <form action="check.php" method="post">
              <input class="form-control" type="text" name="username" placeholder="Username">
              <input class="form-control" type="password" name="password" placeholder="Password">
              <div class='radio'>
                <label>
                  <input type='radio' name='remember' disabled>
                  Remember Me
                </label>
              </div>

              <button type="submit" name="login">Login</button>

              <div class="bottom">
                <p> Dont have a acoount? <a class="show-signup">Sign Up</a></p>
              </div>
            </form>
          </div>
      </div>
      <div class="row">
          <div class="signup col-xs-12 col-sm-4">
            <div class="">
              <span class="fa fa-envira"></span>
              <p>Create New Account</p>
            </div>
            <form action="check.php" method="post">
              <input class="form-control" type="email" name="email" placeholder="Email">
              <input class="form-control" type="text" name="username" placeholder="Username">
              <input class="form-control" type="password" name="password" placeholder="Password">
              <div class='radio'>
                <label>
                  <input type='radio' name='remember' disabled>
                  Remember Me
                </label>
              </div>

              <button type="submit" name="button">Sign Up</button>

              <div class="bottom">
                <p> Already have an acoount? <a class="show-login">Sign In</a></p>
              </div>
            </form>
          </div>
      </div>
    </div>


    <!--login as a guest-->
    <a href="dashboard.php">Login as Guest</a>
  </section>
  <footer>

  </footer>
    <!-- jQuery (Must for Bootstrap) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <!-- Bootstrap script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>
