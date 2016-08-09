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
				header("Location: chat.php");
			}
			else
			{
				$_SESSION["signerror"]="Wrong Credentials";
				header("Location: index.php");
			}
	  }
	  else if(isset($_POST["signup"]))
	  {
			echo "1";
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
					$result3=mysql_query("INSERT INTO user VALUES ('','$email','$username','$password','')",$link) or die(mysql_error());
					if($result3)
					{
					  $_SESSION["user"]=$username;
					  header("Location: chat.php");
					}
					else
					{
						$_SESSION["signerror"]="SERVER ERROR, PLEASE REPORT";
						header("Location: index.php");
					}
				}
		  }
		}
	  else
	  {
		$_SESSION["user"]="guest";
	  }
	?>
