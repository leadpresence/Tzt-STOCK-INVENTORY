<?php
include('conection_link.php');
//mysqli_select_db($dblink,$database) or  die('could not find database');
	$table_query=mysqli_query($dblink,"SELECT itemname, total_quantity, class,latest_update_quantity,latestupdate FROM procincoming");


  
$release_table_query=mysqli_query($dblink,"SELECT itemname, total_quantity, class,latest_release_quantity,	latestrelease FROM procincoming");

$stock_levels=mysqli_query($dblink,"SELECT itemname, total_quantity FROM procincoming LIMIT 5");

	



?>