<?php

SESSION_start();

require('connection.php');

require('submitanswer.php');
 
$sql = "Select * FROM user join questions where user.id = questions.asker_id;";

$results = mysql_query($sql)or die($mysql."<br/><br/>".mysql_error());

 
//for collapsable divs http://jsfiddle.net/ eJX8z/
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
$asker=$row['user_name'];

  
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
$ans_results = mysql_query($answerdata)or die($mysql."<br/><br/>".mysql_error());

while($ans = mysql_fetch_array($ans_results)){

$sql2 = "Select * FROM user;";
$results2 = mysql_query($sql2)or die($mysql."<br/><br/>".mysql_error());
$row2 = mysql_fetch_array($results);
$name=$row2['user_name'];
$question=$row2['question_title'];

//previous answers
$question_id=$row['q_id'];
$answer_num=$ans['answer_num'];
$answerer_id=$ans['answerer_id'];
$selected=$ans['selected'];

if($selected==1){

Print "
<form  method='post' action='selectanswer.php'>
<fieldset id='$question'>

<!--$question_id $answer_num-->
<div>
<p style='float:left; font-weight: bold;'>&nbsp $answer_num answered by $name</p>
</div>
</br> 
</br>
</br> 

<div class='buttonbox'>
 
<button class='btn' onclick='asynchronouslyUpdate('increment');'><strong>?</strong></button></br>
<button class='btn' onclick='asynchronouslyUpdate('decrement');'><strong>¿</strong></button></br>
</div> </br>

<div class='ansbox'>
</br>{$ans['answer_text']} 
<input type='hidden' name='question' value='$question_id'>
<input type='hidden' name='answer_num' value='$answer_num'>
<input type='hidden' name='answerer_id' value='$answerer_id'>
<input type='hidden' name='asker' value='$asker'>
</div>
</br>

</br>
<strong> SELECTED </strong>

</fieldset></form> ";
}
else {
Print "<form  method='post' action='selectanswer.php'>

<fieldset id='$question'>


<div>
<p style='float:left; font-weight: bold;'>&nbsp $answer_num answered by $name</p>
</div>
</br> 
</br>
 
<!--$question_id $answer_num--></br>
<div class='buttonbox'> 
<button class='btn' onclick='asynchronouslyUpdate('increment',$question);'><strong>?</strong></button></br>
<button class='btn' onclick='asynchronouslyUpdate('decrement',$question);'><strong>¿</strong></button></br>
</div>

 </br> 
 
 
<div class='ansbox'>
{$ans['answer_text']}</br>

<input type='hidden' name='question' value='$question_id'>
<input type='hidden' name='answer_num' value='$answer_num'>
<input type='hidden' name='answerer_id' value='$answerer_id'>
<input type='hidden' name='asker' value='$asker'>
</br>
<input type='submit' value='Choose This Answer' >
</div>
</fieldset></form> ";
}

}

}

echo "</br><script>

/*global $:false */
function asynchronouslyUpdate(change,question){
  $.ajax({
      url: \"vote.php\",
      data: {action: change, question: question},
      success: function(response){
        $(\"#myText\").html(response);
      },
      error: function(err) {
        console.log(\"Error\");
        console.log(err);
      }
  });
}
 
$(document).ready(function(){
  $(\"#id\").ready(function(){asynchronouslyUpdate(\"post\");});
  $(\"#source\").hide();
  $(\"#showSource\").click(showSource);
});

</script>";
		
?>

