<?php

session_start();
require('connection.php');

//form variables
$date= getdate();
$question= $_POST['question'];
$title=$_POST['title'];
$user=$_SESSION['user_name'];

//need to change query to SELECT id from user where....
$mysql = "Select * from user where user_name = '$user';";

$result = mysql_query($mysql)or die($mysql."<br/><br/>".mysql_error());

//results of user name query
$row = mysql_fetch_array($result);
$id=$row['id'];

//insert data from question form and user query
$insertion = "INSERT into questions(question_title,question_text,date,asker_id) VALUES('$title','$question',NOW(),'$id')";

//if successful returns to the question page
if(mysql_query($insertion)){
header("Location:question.php");

}
else{
header("Location: loginFailed.php");

}
/*
while($row = mysql_fetch_array($result))
{
print "<p>{$row['user_name']}</br>
		{$row['id']}</br>";}
//$sql= "INSERT into questions 
*/

?>