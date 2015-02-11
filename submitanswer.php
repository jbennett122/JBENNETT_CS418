<?php

SESSION_start();

require('connection.php');

$user=$_SESSION['user_name'];

$answer = $_POST['answer'];
$q_id = $_POST['q_id'];

//gather user information
$userdata="Select * FROM user WHERE user_name = '$user';";
 
$results= mysql_query($userdata);

$row= mysql_fetch_array($results);

//insert into table using data from session username and id from query
$submitanswer = "INSERT INTO answers (q_id,answer_num,answer_text,date) VALUES ('$q_id','1','$answer',NOW());";

$r1= mysql_query($submitanswer);


print "<p>{$row['id']}</p><p>{$row['user_name']}</p><p>$q_id</p>";

?>