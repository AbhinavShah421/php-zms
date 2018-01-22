<?php
function connect_db(){
$con = mysqli_connect("localhost","root","root","zms_db");

// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
//  	echo "conection successfull";
return $con;
}
}