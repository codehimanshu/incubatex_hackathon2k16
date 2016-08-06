<?php

if(isset($_POST['id']))
{ echo "0";
  $result=mysql_query("SELCET * FROM user WHERE id='$id'",$link);
  $data=mysql_fetch_all("$result");
  echo $data["username"];
}

?>
