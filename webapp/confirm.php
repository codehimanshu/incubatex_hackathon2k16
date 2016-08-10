<?php
	$id=$_GET['id'];
	session_start();
	require_once 'db_connect.php';
	$result=mysql_query("SELECT * FROM user WHERE confirmation='$id'",$link);
	if(mysql_num_rows($result))
	{
		$result=mysql_fetch_assoc($result);
		$result1=mysql_query("UPDATE user SET confirmation=1 WHERE confirmation='$id'",$link);
		echo "mail Confirmed" . $result["username"];
	}
	else
		echo "Your link has expired";
?>