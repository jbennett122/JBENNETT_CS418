
<html>
<body>
test

<?php

session_start();
require('connection.php');



 
  if($_GET){
      
    if($_GET['action'] == "increment"){
       
	  echo "test";
    }elseif($_GET['action'] == "decrement") {
      echo "test2";
    }
	
   
    die();
  }

  
   
 
 
  
  
  
?>


</body>

</html>
