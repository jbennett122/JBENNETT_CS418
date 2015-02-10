<?php
session_start();
//php script containing the connection
require("connection.php");

//data from form
$username = $_POST['username'];
$password = $_POST['password'];

//query for finding user name and password, should be unique
$sql = "SELECT * FROM user WHERE user_name = '$username' and password ='$password';";

$result = mysql_query($sql) or die (mysql_error());

//users found variable init
$count = 0;

$count = mysql_num_rows($result);

if($count == 1){
	$_SESSION['loggedIn'] = "true";
	header("Location:question.php");
	}
	else {
     $_SESSION['loggedIn'] = "false";
     header("Location: loginFailed.php");
	 }
	
	

?>