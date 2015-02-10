
<?php

//database connection variables
$db_host='localhost';
$db_user='admin';
$db_pass='5pR1nG2OlS';
$db_name='cs418';

//database connection 
$dbc = @mysql_connect($db_host,$db_user,$db_pass)or die ( mysql_error() );

//select appropriate database
@mysql_select_db($db_name,$dbc)or die ( mysql_error() );
?>