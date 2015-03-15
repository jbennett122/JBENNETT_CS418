
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
   
<html xmls="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset-utf-8"/>

<!--CSS info-->

		<link rel="stylesheet" type="text/css" href="values.css"/>

<title>Ask me a question?</title>

<script type="text/javascript">
    function submitForm(action)
    {
        document.getElementById('form1').action = action;
        document.getElementById('form1').submit();
    }
</script>




</head>
<body >


<div id="header"><h1><em>Ask me a question?</em></h1></div>

<div class="left">

<div id="toc" style="border:none;" >

								<h3> &nbsp Nav Menu </h3>
								
										<a href="index.php">Home</a><br>
										<a href="question.php">Ask a question</a><br>
										<a href="inquiries.php">Inquiries</a><br>
										<a href="profile.php">Profile Page</a><br>
										
										 
										 


<br>
<br>
										<a href="mailto:jbenn032@odu.edu">jbennett@cs.odu.edu</a>

<br /><br /><br><br /><br /><br /><br /><br /><br /></br>
<div ><center> <img class="img2" src="questionMark.jpg" alt="?" ></div></center> 
 
</div>
 </div>
<div class="rightc" >
 

<center>
<!--current user information,avatar, and questions asked-->
<div class="content">
 
 <center><h3>Change Avatar</h3></center>
 <form enctype="multipart/form-data" action="fileUpload.php" method="post">
<fieldset>	<input name="MAX_FILE_SIZE" value="3000000" type="hidden">
	</br> <center><input name="image" type="file"></center></br>
	<label for="altText">Description of image</label>
	
<input type="text" size="60" name="altText" id="altText"/><br /></br>
	<input name="tmp_name" type="hidden">
	<input value="Upload!" type="submit">
</fieldset>
 </form>
 </div>
 
 <div class="content2">
 

<div>
<h3>Find User</h3>

<br>  
<fieldset>
<form  method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
   </br>
   <input type="text" name="name"><br>
   <input type="submit" name="submit" value="Submit"><br>
   </br>
</form>




 
<?php
 
require('connection.php');
 
 $counting= 0; 
  
if(isset($_POST['submit']))
{
	
    $name = $_POST['name'];
    
	if($name=="")
	{
	echo "please enter a valid username";
	die();
	}
	
    echo "<br>You can use the form again to enter a new user name.   </br> </br></br>";
			  
	$userdata="Select * FROM user WHERE user_name = '$name';";
	$results= mysql_query($userdata)or die($mysql."<br/><br/>".mysql_error());
	$row = mysql_fetch_array($results)or die($mysql."<br/><br/>".mysql_error());
	
	
	$count="SELECT COUNT(q_id) AS num FROM questions WHERE asker_id={$row['id']}";
	$cmysql= mysql_query($count)or die($mysql."<br/><br/>".mysql_error());
	 $t1=mysql_fetch_array($cmysql);

	 
//retrieve images somehow	 

echo '<img class="thumb"  src="data:image/'.$row['type'].';base64,' . base64_encode($row['image']) . '"  >';
 
  echo "<h2 style='float:left;'>&nbsp&nbsp{$row['user_name']}</h2></br></br></br></br>";
 
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

else echo "please enter a username";

	
?>	
</fieldset>
 </div>
</div>


		</center>
 
 </div>
</div>


<div class="footer"> <h6>Copyright 2015 Justin Bennett</div>
</body>



</html>


