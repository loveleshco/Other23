<?php
$servername="localhost";
$username="root";
$password="";
$dbname="company";
$conn=mysqli_connect($servername,$username,$password,$dbname,"3308");

session_start();
if(!$conn){
		die("Error while connecting...");

}

?>