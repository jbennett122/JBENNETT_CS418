 
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
<div class="content">
 <fieldset>
  <form enctype="multipart/form-data" action="newuserinsert.php" method="post">
 
 <center><h3>User Registration</h3></center>
 <center><p>Username <input type="text" name="user_name"></p></center>
<center><p>Password <input type="password" name="password"></p></center>
  <br></br>
 
 	<input name="MAX_FILE_SIZE" value="3000000" type="hidden">
	<center><h3>Select Avatar</h3></center>
	<center><p> <input name="image" type="file"></p></center>
	 
<input type="hidden" value="altText" name="altText" id="altText"/><br />
	<input name="tmp_name" type="hidden">
	<center><input value="Register" type="submit"></center>
</fieldset>
 </form>
 
 
  <?php
session_start();
if($_SESSION["check"]==true){
echo "Try another user name";
}


 
 ?>
 
 
 
 
 </div>	
<?php
	   
 
		
?>	
</div>
</div>


<div class="footer"> <h6>Copyright 2015 Justin Bennett</div>
</body>



</html>


