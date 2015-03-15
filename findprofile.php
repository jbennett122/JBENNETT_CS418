<?PHP


require('connection.php');
 
 $counting= 0; 
  
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
     
    echo "<br>You can use the following form again to enter a new name.   </br> </br></br>";
			  
	$userdata="Select * FROM user WHERE user_name = '$name';";
	$results= mysql_query($userdata)or die($mysql."<br/><br/>".mysql_error());
	$row = mysql_fetch_array($results)or die($mysql."<br/><br/>".mysql_error());
	
	
	$count="SELECT COUNT(q_id) AS num FROM questions WHERE asker_id={$row['id']}";
	$cmysql= mysql_query($count)or die($mysql."<br/><br/>".mysql_error());
	 $t1=mysql_fetch_array($cmysql);
	
 

echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="290" height="290">';
 
  echo "<h2>{$row['user_name']}</h2>";

	
	$test=$row['id'];
	//Select * from questions join user where questions.asker_id = user.id;
	$questionquery = "Select * from questions join user where asker_id = {$row['id']};";
	$r1= mysql_query($questionquery)or die($mysql."<br/><br/>".mysql_error());
	
	$t2=$t1['num'];
	
	while($counting<$t2){
	
	$r2 = mysql_fetch_array($r1)or die($mysql."<br/><br/>".mysql_error());
	
	$counting++;
	
	echo "<fieldset>
	 
	<h3>{$r2['q_id']} {$r2['question_title']}</h3></br>
	
	<p>{$r2['question_text']}</p>
	
	
	
	</fieldset>";
	
	}

}

	
?>
  