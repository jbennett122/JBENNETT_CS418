<?php

SESSION_start();

require('connection.php');

require('submitanswer.php');
 
$sql = "Select * FROM user join questions where user.id = questions.asker_id;";

$results = mysql_query($sql)or die($mysql."<br/><br/>".mysql_error());



//$row = mysql_fetch_array($results);
//for collapsable divs http://jsfiddle.net/eJX8z/
while($row = mysql_fetch_array($results))
{
print $row['q_id'];
print " 
<fieldset >
 <center>
	<p><h3>Question:
	{$row['question_title']}</h3>
	<p>Asked by:{$row['user_name']}</p> 
	<p><strong>Text:</strong>{$row['question_text']}</p></br>
	</center>
		 
</fieldset>";


 //include 'submitanswer.php';

//answer form 
print "</br>
<form action='test.php' method='post'> 
<textarea name='answer' rows='3' cols='30' >Answer this question</textarea>
<input type='hidden' name='q_id' value='{$row['q_id']}'/>
<input type='hidden' name='id' value='{$row['id']}'/>
</br> </br>
<input type='submit' name='submit' value='Submit me' />
&nbsp
<input type='reset' value='Reset' />
</form>";


$answerdata="SELECT * FROM answers WHERE q_id = '{$row['q_id']}';";
$aresults = mysql_query($answerdata)or die($mysql."<br/><br/>".mysql_error());

while($test = mysql_fetch_array($aresults)){
//previous answers
$r=$row['q_id'];
$t=$test['answer_num'];
$a=$test['answerer_id'];
Print "<form  method='post' action='selectanswer.php'><fieldset>
<input type='submit' value='Choose This Answer' >$r $t </br>{$test['answer_text']}
<input type='hidden' name='question' value='$r'>
<input type='hidden' name='answer' value='$t'>
<input type='hidden' name='answerer_id' value='$a'>
</fieldset></form> ";



}

//include('displayanswers.php');

}

 
		
?>

