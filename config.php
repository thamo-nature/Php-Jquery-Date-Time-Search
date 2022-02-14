<?php
ob_start(); //Turns on output buffering 


$timezone = date_default_timezone_set("Asia/Kolkata");


$con = mysqli_connect("localhost", "root", "", "data"); //Connection variable

global $con;

if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}


?>
