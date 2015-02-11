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
	<p><h3>Question:
	{$row['question_title']}</h3>
	<p>Asked by:{$row['user_name']}</p></br>
	<p><strong>Text:</strong>{$row['question_text']}</p></br>
	<input type='hidden' name='q_id' value='{$row['q_id']}'/>
	
	<textarea name='answer' rows='3' cols='30' >Answer this question</textarea>
</br> </br>
<input type='submit' name='submit' value='Submit me' />
 &nbsp
<input type='reset' value='Reset' />

</fieldset>";
	
}

 
		
?>

