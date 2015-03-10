<?php

session_start();
require('connection.php');

$question= $_POST['question'];


$sql = "Select * FROM answers join questions  where questions.question_title ='$question';";
$results = mysql_query($sql)or die($mysql."<br/><br/>".mysql_error());
$row = mysql_fetch_array($results);

$test = "Update answers set votes='10' where q_id ='1';"
$t1=mysql_query($test);
$t2 = mysql_fetch_array($t1);

  if($_POST){
      
    
    if($_POST['action'] == "increment"){
      $currentValue++;
    }elseif($_POST['action'] == "decrement") {
      $currentValue--;
    }elseif($_POST['action'] == "post"){

    }
	
	
	
    file_put_contents($fileName, $currentValue);
    echo $currentValue;
    die();
  }

?>



