<?php

SESSION_start();

require('connection.php');

$user=$_SESSION['user_name'];

$userdata="Select * FROM user WHERE user_name = '$user';";

$results= mysql_query($userdata);

$row= mysql_fetch_array($results);

print "<p>{$row['id']}</p><p>{$row['user_name']}</p>";

?>