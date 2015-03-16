
<?php
if ( !isset($_FILES['image']['type']) ) {
   die('<p>No image submitted</p></body></html>');
}

SESSION_start();
require('connection.php');

$user=$_SESSION['user_name'];
 
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
   
   $query = "UPDATE user SET type='{$_FILES['image']['type']}',name='{$_FILES['image']['name']}',altText=' $alt',image='$image' where user_name='$user'";
      
   if ( !(mysql_query($query))or die($query."<br/><br/>".mysql_error()) ) {
      die('<p>Error writing image to database</p></body></html>');
   } else {
      header("Location:unresolved.php");
   }   

   
   
   
   
   
}
?>
