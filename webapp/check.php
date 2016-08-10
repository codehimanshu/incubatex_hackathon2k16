	<?php
	  session_start();
	  require_once 'db_connect.php';
	  if(isset($_POST["login"]))
	  {
			$username=$_POST["username"];
			$password=$_POST["password"];
			$result=mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password' ",$link) or die(mysql_error());
			$count=mysql_num_rows($result);
			if($count)
			{  
				$result=mysql_query("UPDATE user SET status=1 WHERE username='$username'",$link) or die(mysql_error());
				$_SESSION["user"]=$username;
				$_SESSION["counter"]=0;
				header("Location: dashboard.php");
			}
			else
			{
				$_SESSION["signerror"]="Wrong Credentials";
				header("Location: index.php");
			}
	  }
	  else if(isset($_POST["signup"]))
	  {
			//echo "1";
			$email=$_POST["email"];
			$username=$_POST["username"];
			$password=$_POST["password"];
			$result1=mysql_query("SELECT * FROM user WHERE email='$email'",$link) or die(mysql_error());
			$count1=mysql_num_rows($result1);
			if($count1)
			{	
				$_SESSION["signerror"]="Email Already Registered";
				header("Location: index.php");
			}
			else
			{
				$result2=mysql_query("SELECT * FROM user WHERE username='$username'",$link) or die(mysql_error());
				$count2=mysql_num_rows($result2);
				if($count2)
				{
					$_SESSION["signerror"]="Username not Available";
					header("Location: index.php");
				}
				else
				{
					//sendmail not working on localhost, only for global hosting
					$var=rand(1000001,9999999);
					$url="http://www.fan4.esy.es/".$var;
					$to = $email;
					$subject = "HTML email";

					$message = "
					<html>
					<head>
					<title>HackChat</title>
					</head>
					<body>
					<p>Please Click on the link below to confirm yout account </p>"
					. $url;
					"</body>
					</html>
					";

					// Always set content-type when sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					// More headers
					$headers .= 'From: <noreply@fan4.exy.ex>' . "\r\n";

					mail($to,$subject,$message,$headers);


					$result3=mysql_query("INSERT INTO user VALUES ('','$email','$username','$password','','$var')",$link) or die(mysql_error());
					if($result3)
					{
					  $_SESSION["user"]=$username;
					  header("Location: dashboard.php");
					}
					else
					{
						$_SESSION["signerror"]="SERVER ERROR, PLEASE REPORT";
						header("Location: index.php");
					}
				}
		  }
		}
	  else if(isset($_POST["reset"]))
	  {
	  	$email=$_POST["email"];
	  	$result=mysql_query("SELECT * FROM user WHERE email='$email'",$link);
	  	$count=mysql_num_rows($result);
	  	if ($count)
	  	{
	  		$result=mysql_fetch_assoc($result);
	  		$pass=$result["password"];
			$var=rand(1000001,9999999);
			$url="http://www.fan4.esy.es/".$var;
			$to = $email;
			$subject = "HTML email";

			$message = "
			<html>
			<head>
			<title>HackChat</title>
			</head>
			<body>
			<p>Your password is </p>"
			. $pass;
			" Please change your password after login</body>
			</html>
			";

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <noreply@fan4.exy.ex>' . "\r\n";

			mail($to,$subject,$message,$headers);
			echo "Email has been sent to" . $result["email"] . ". Please login again.";
	  	}
	  	else
	  	{
	  		echo "Email not Yet registered. Please Sign Up";	  		
	  	}
	 }
	else
	{
		$_SESSION["user"]="guest";
	}
	?>
