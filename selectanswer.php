

<?php

 SESSION_start();
require('connection.php');

$q_id=$_POST['question'];
$a_id=$_POST['answer'];
$answerer_id=$_POST['answerer_id'];
$user=$_SESSION['user_name'];
$selected = false;
$can_be_selected = true;
$updated=false;
$same=false;

echo "hi question id: $q_id answer number: $a_id";

//find if a answer has been selected query
$sql = "SELECT * from answers where q_id='$q_id';";
$results = mysql_query($sql);


//go thru results looking to see if an answer has been selected
while($found= mysql_fetch_array($results)){
$a_id = $found['answerer_id'];

$test=$found['selected'];

//if a answer has been selected, no more answers can be selected
if($test=='1'){

print "found one</br>";
echo "one indicates selected: $test</br>";
$can_be_selected = false;

}


}

//query for finding user id to compare session user against asker id
 
$sql = "Select * FROM user join questions where user.id = questions.asker_id;";

$results = mysql_query($sql)or die($mysql."<br/><br/>".mysql_error());
 

if($results['id']==$results['asker_id']){

echo "yes";

}


echo "answer number $a_id";
if(!$selected&&$can_be_selected){
$update= "UPDATE answers SET selected ='1' where q_id='$q_id' and answer_num='$a_id';";
$results= mysql_query($update);
$updated=true;

}
//else print "already selected best answer";

/*
if($updated){
header("Location:unresolved.php");
}
else{
header("Location: loginFailed.php");
}
*/
?>
