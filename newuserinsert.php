 
<?php

session_start(); 

session_unset();

require('connection.php');

$user_name = $_POST['user_name'];
$password = $_POST['password'];
 
 
//check to see if username already exists 
$checkusers = "SELECT * from user where user_name = '$user_name';";
$checkusers2= mysql_query($checkusers)or die($checkusers."<br/><br/>".mysql_error());
$count = 0;
$count= mysql_num_rows($checkusers2);

if($count ==1){

$_SESSION["check"]=true;
header("Location:register.php");
die("Username found please try another");

      

 
 }
 else{
 
 
 
if ( !isset($_FILES['image']['type']) ) {
   die('<p>No image submitted</p></body></html>');
}
 


 
// Validate uploaded image file
if ( !preg_match( '/gif|png|x-png|jpeg/', $_FILES['image']['type']) ) {
   die('<p>Only browser compatible images allowed</p></body></html>');
} 
else if ( strlen($_POST['altText']) < 2 ) {
   die('<p>Please provide meaningful alternate text</p></body></html>');
}
else if ( $_FILES['image']['size'] > 16384 ) {
   die('<p>Sorry file too large</p></body></html>');
}
else if ( !($handle = fopen ($_FILES['image']['tmp_name'], "r")) ) {
   die('<p>Error opening temp file</p></body></html>');
}
else if ( !($image = fread ($handle, filesize($_FILES['image']['tmp_name']))) ) {
   die('<p>Error reading temp file</p></body></html>');
} 
else {
   fclose ($handle);
   // Commit image to the database
   $image = mysql_real_escape_string($image);
   $alt = htmlentities($_POST['altText']);
   
   $insert="INSERT INTO user (user_name,password,type,name,altText,image) VALUES ('$user_name','$password','{$_FILES['image']['type']}','{$_FILES['image']['name']}',' $alt','$image');";
   
      
   if ( !(mysql_query($insert))or die($insert."<br/><br/>".mysql_error()) ) {
      die('<p>Error writing image to database</p></body></html>');
   } else {
      header("Location:loginfailed.php");
   }   

   
   
   
   
   
}

}
?>