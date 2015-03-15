

<?php
SESSION_start();
require('connection.php');

$asker=$_POST['asker'];
$q_id=$_POST['question'];
$a_id=$_POST['answer_num'];
$answerer_id=$_POST['answerer_id'];
$user=$_SESSION['user_name'];
$selected = false;
$can_be_selected = true;
$updated=false;
$same=false;

echo "question asker: $asker question id: $q_id answer number: $a_id" ;

//find if a answer has been selected query
$sql = "SELECT * from answers where q_id='$q_id';";
$results = mysql_query($sql);


//go thru results looking to see if an answer has been selected
while($found= mysql_fetch_array($results)){
$a_id=$found['answer_num']; //current answer number to selected question
$test=$found['selected']; //1 if answer has been selected 0 if not

//if a answer has been selected, no more answers can be selected
if($test=='1'){

echo "</br>one indicates an answer has been selected: $test</br>";

$can_be_selected = false;

}


}

//query for finding user id to compare session user against asker id
 
$sql = "Select * FROM user join questions where user.id = questions.asker_id;";

$results = mysql_query($sql)or die($mysql."<br/><br/>".mysql_error());
 
//checks to see if person who asked the question is choosing
//--------------------todo-----------------------------------
//forbid anyone else from choosing best with another boolean 
//put the boolean into the selection boolean 
if($asker==$user){

echo "</br>asker $asker and $user the same";




echo "</br>answer number $a_id";

//booleans to see if an answer has been selected
if(!$selected&&$can_be_selected){
$update= "UPDATE answers SET selected ='1' where q_id='$q_id' and answer_num='$a_id';";
$results= mysql_query($update);
$updated=true;
print "</br>test";
}
else print "</br>already selected best answer";
}



else{

echo "</br>asker $asker and $user not the same";


}
  
 
header("Location:inquiries.php");
 
 
  
?>
