<?php

$host='localhost';
$database='tizeti-stocking';
$username='root';
$pass='';

//connecting to database

$dblink=mysqli_connect($host,$username,$pass,$database) or die('UUUURg!!! Give Unable to Reach Server'. mysqli_error());
mysqli_select_db($dblink,$database) or  die('could not find database');
//test success
//echo "db is connected";

//mysqli_select_db($dblink,$database) or  die('could not find database');

//

//mysql_close();
?>