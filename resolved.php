 
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
										<a href="question.php">Ask a question</a><br>
										<a href="unresolved.php">Unresolved Questions</a><br>
										<a href="resolved.php">Resolved Questions</a><br>
										 


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


<!-- user validation logic...soon-->
<?php




 
 ?>

</div>
 </div>
<div class="rightc" >
<div class="content2"  >

<center>
<form  action="process-form-data.php" method="post" >

 <fieldset>
 <center><p>Question </p></center>
 
  <br />
</fieldset>



<fieldset>

<p>Answer 1</p>
</br>
<p>Answer 2</p>
</br>
<p>Answer 3</p>
</br>
<p>Answer 4</p>
</br>
</fieldset>

 

</form>
		</center>

	<center><p>Text <a href="data.txt">data</a> from form</p></center>
	
<?php
	   
 
		
?>	
</div>
</div>


<div class="footer"> <h6>Copyright 2015 Justin Bennett</div>
</body>



</html>


