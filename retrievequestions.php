<?php

SESSION_start();

require('connection.php');

$sql = "Select * FROM user join questions where user.id = questions.asker_id;";

$results = mysql_query($sql)or die($mysql."<br/><br/>".mysql_error());


//$row = mysql_fetch_array($results);
//for collapsable divs http://jsfiddle.net/eJX8z/
while($row = mysql_fetch_array($results))
{
print " <fieldset>
 <center>
	<p>Question:
	{$row['question_title']}</br>
	{$row['question_text']}</br>
	
	
	<textarea name='answer' rows='3' cols='30' >Answer this question</textarea>
</br> </br>
<input type='submit' name='submit' value='Submit me' /> &nbsp
<input type='reset' value='Reset' />

</fieldset>";
	
}

 
		
?>

