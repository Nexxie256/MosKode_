<?php
	//capture post values
	$rname = $_POST['rname'];
	$rvalue = $_POST['rvalue'];
	
	

	//import db class
	require("ihk_db.php");

	//check
	$chk = "SELECT * FROM receipt where receipt_id='$fname'";
	
	
	//results
	$res = $conn->query($chk);

	//so
	if(mysqli_num_rows($res)>0){
		echo("<hr>
		    	<br><center style='padding-top:100;'><h2 style='color:red;'>receipt credentials already in place.</h2></center><br>
		    	<center><a href='receipts.php'><button style='background:lime;color:black;border-radius:50px;width:100px;height:35px;'>Try Again</button></a></center>
		    	<br>
		    	<hr>");
	}
	else{
		//all good
		//sql
		$sql = "INSERT into receipt(receipt_id,value,time) VALUES('$rname','$rvalue',now())";

		//Query db
		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		    //login
		    header("Location:receipts.php");
		}

		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}	
	
	$conn->close();

?>