 
<?php
SESSION_start();
require('connection.php');

$user=$_SESSION['user_name'];
$answer = $_POST['answer'];
$q_id = $_POST['q_id'];
$answerer_id =$_POST['id'];

//echo "Answering the question $user</br>";
//echo "$q_id</br>";

//gather user information
$userdata="Select * FROM user WHERE user_name = '$user';";
$results= mysql_query($userdata)or die($mysql."<br/><br/>".mysql_error());
$row= mysql_fetch_array($results)or die($mysql."<br/><br/>".mysql_error());

//gather answer information to match answer to question id to record who
//answered the question
$answerdata="SELECT * FROM answers WHERE q_id = '$q_id';";
$aresults = mysql_query($answerdata)or die($mysql."<br/><br/>".mysql_error());
$test = mysql_fetch_array($aresults);

//returns the number of answers of a particular question, answer_num
//one half of the key
$c1="SELECT * FROM answers WHERE q_id = '$q_id';";
$c2=mysql_query($c1);
$c3=mysql_num_rows($c2);

//increments answer number for each time question is answered
$c3++;

//insert into table using data from session username and id from query //{$row['answer_num']}
if($test['answer_num']==''){
$submitanswer = "INSERT INTO answers (q_id,answer_num,answer_text,answerer_id,date,votes,selected) VALUES ('$q_id','1','$answer','{$row['id']}',NOW(),'0','false');";
 }
 else{
 $submitanswer = "INSERT INTO answers (q_id,answer_num,answer_text,answerer_id,date,votes,selected) VALUES ('$q_id','$c3','$answer','{$row['id']}',NOW(),'0','false');";
 }

$r1= mysql_query($submitanswer)or die($mysql."<br/><br/>".mysql_error());
 
 
 if($r1){
header("Location:unresolved.php");

}
else{
header("Location: loginFailed.php");

}
 
 
//echo "answer number is :{$test['answer_num']}";
?> 
 