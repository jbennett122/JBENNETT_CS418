 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
   
<html xmls="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset-utf-8"/>

<!--CSS info-->

		<link rel="stylesheet" type="text/css" href="values.css"/>

<title>Ask me a question?</title>


</head>
<body >


<div id="header"><h1><em>Ask me a question?</em></h1></div>

<div class="left">

<div id="toc" style="border:none;" >

								<h3> &nbsp Nav Menu </h3>
								
										<a href="index.php">Home</a><br>
										


<br>
<br>
										<a href="mailto:jbenn032@odu.edu">jbennett@cs.odu.edu</a>
<br>														


<br />

<br />


 
<form style="border:solid black 4px; width:175px;position:relative;color:black;" action="index.php" method="post" >
<center><p style="color:black;"><strong>User Login</strong></p></center>
 &nbsp <label for="username" >Username</label> <center><input type="username" id="usename" name="username"></center><br /> 
&nbsp <label for="password">Password:</label> <center><input type="password" id="password" name="password"></center><br /><br />
  <center> <button type = "submit">Login</button> </center>
  
  


</form>

<?php

$answer = $_POST['ans'];

 if ($answer == "ans4") {

 

 echo " Yeah that dog is pretty sweet.";

 } else if
 ($answer == "ans1") {

 echo "No";

 } 
 else if
 ($answer == "ans3") {

 echo "So you would think.";

 } 
 else if
  ($answer == "ans2") {

 echo "Watch out for those guys.";

 } 
 ?>

</div>
 </div>
<div class="rightc" >
<div class="content2"  >

<center>
<form  action="process-form-data.php" method="post" >

 <fieldset>
 <p style="text-align:left;">
Title <select name="title">
<option value="mr" >Mr.</option>
<option value="mrs" >Mrs.</option>
<option value="ms" />Ms.</option>
</select> &nbsp  First: <input type="text" name="first" size="15" /> Last: <input type="text" name="last" size="15" /></p>
 
  <br />
Email:<input name="email" type="text" size="30" />
</fieldset>

<fieldset >
<p>This is...</p>
<input type="radio" name="response" value="good" />good
<input type="radio" name="response" value="great" />great
<input type="radio" name="response" value="grand" />grand 
<p>everyone on the bus</p>
</fieldset>

<fieldset>
Comments
<textarea name="comments" rows="3" cols="30" >Comment here</textarea>

<input type="submit" name="submit" value="Submit me" />
<input type="reset" value="Try Again" />

</fieldset>


</form>
		</center>

	<center><p>Text <a href="data.txt">data</a> from form</p></center>
	
<?php
	
	$test=array("This ","is ","an ","array ","that ","contains ","strings ");

print "<h4> Here is an array that runs a loop and selects a random index to print</h4>";
 
for ($x=0; $x<=10; $x++)
 {
	$num = rand(0,6);
	print "$test[$num]";
 
 
 }
 print "<p>\nAnd this is the array in order\n</p>";
 for ($x=0; $x<=10; $x++)
 {
	 
	print "$test[$x]";
		 
 
 }
		
		
		
?>	
</div>
</div>


<div class="footer"> <h6>Copyright 2013 Justin Bennett</div>
</body>



</html>


