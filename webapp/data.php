<?php

	if(isset($_POST['id']))
	{

		require_once 'db_connect.php';
		$id=$_POST["id"];
		$result=mysql_query("SELECT * FROM message WHERE sender='$id' OR receiver='$id'",$link) or die(mysql_error());
		if($result)
		while($row=mysql_fetch_assoc($result)):
		?>
		<?php
			if($row["sender"]==$id):
			?>
			<div class=sender>
				<?php echo $row["message"]; ?>
				<?php echo $row["time"]; ?>
			</div>
			<?php
			else:
			?>
			<div class=receiver>
				<?php echo $row["message"]; ?>
				<?php echo $row["time"]; ?>
			</div>
			<?php
			endif;
		endwhile;
	}
	if(isset($_POST['receiver'])) {
		echo "hello world";
	}
	if(isset($_POST['msg'])) {
		echo "hello user";
	}
?>
                  <div style="clear:both;">
