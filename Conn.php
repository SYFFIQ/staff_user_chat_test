<?php
	
	$servername="";
	$username="root";
	$pass=""; //this is auto generated by the website
	$dbName="if0_34732314_drsdulang_db";

	//create connection
	$conn=mysqli_connect($servername,$username,$pass,$dbName);

	//check connection
	if(!$conn){
		die("Connection failed: ".mysqli_connect_error());
	}
	
?>