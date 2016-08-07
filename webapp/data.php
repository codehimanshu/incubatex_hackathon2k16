<?php
//	if(!isset($_SESSION["user"]))
//		header("Location: index.php");
	session_start();
	if(isset($_POST['id']))
	{
		$count=$_SESSION["counter"];
		//echo $count;
		require_once 'db_connect.php';
		$id=$_POST["id"];
		$result=mysql_query("SELECT * FROM message WHERE (sender='$id' OR receiver='$id') AND id>'$count'",$link) or die(mysql_error());
		if($result)
		while($row=mysql_fetch_assoc($result)):
		?>
		<?php
			$_SESSION["counter"]=$row['id'];
			if($row["sender"]==$id):
			?>
			<div class="col-xs-12">
				<div class=receiver>
					<?php echo $row["message"]; ?>
					<span><?php echo $row["time"]; ?></span>
				</div>
			</div>
			<?php
			else:
			?>
			<div class="col-xs-12">
				<div class=sender>
					<?php echo $row["message"]; ?>
					<span><?php echo $row["time"]; ?></span>
				</div>
			</div>
			<?php
			endif;
		endwhile;
	}
	if(isset($_POST['receiver']))
	{
		//session_start();
		require_once 'db_connect.php';
		$sender=$_SESSION["user"];
		$receiver=$_POST["receiver"];
		$result=mysql_query("SELECT id FROM user WHERE username='$sender'",$link) or die(mysql_error());
		$sender=mysql_fetch_assoc($result);
		$sender=$sender["id"];
		$result=mysql_query("SELECT id FROM user WHERE username='$receiver'",$link) or die(mysql_error());
		$receiver=mysql_fetch_assoc($result);
		$receiver=$receiver["id"];
		$message=$_POST["msg"];
		$time=getDate();
		$time= $time['year']."-".$time["mon"]."-".$time["mday"]." ".($time["hours"]+4).":".($time["minutes"]-30).":".$time["seconds"];
		var_dump($time);
		$result=mysql_query("INSERT INTO message VALUES ('','$sender','$receiver','$message','$time')",$link) or die(mysql_error());
	}
?>
                  <div style="clear:both;">
