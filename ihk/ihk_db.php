<?php
	//db connect
	$GLOBALS['conn'] = new mysqli("localhost","root","32662","ihk");

	//check connection
	if($conn->connect_error){
		die("Connection failed:".$conn->connect_error);
	}
		
?>