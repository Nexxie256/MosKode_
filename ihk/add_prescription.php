<?php
	//capture post values
	$pname = $_POST['pname'];
	$pcost = $_POST['pcost'];
	
	

	//import db class
	require("ihk_db.php");

	//check
	$chk = "SELECT * FROM prescription where p_name='$pname'";
	
	
	//results
	$res = $conn->query($chk);

	//so
	if(mysqli_num_rows($res)>0){
		echo("<hr>
		    	<br><center style='padding-top:100;'><h2 style='color:red;'>prescription credentials already in place.</h2></center><br>
		    	<center><a href='prescriptions.php'><button style='background:lime;color:black;border-radius:50px;width:100px;height:35px;'>Try Again</button></a></center>
		    	<br>
		    	<hr>");
	}
	else{
		//all good
		//sql
		$sql = "INSERT into prescription(p_name,p_cost) VALUES('$pname','$pcost')";

		//Query db
		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		    //login
		    header("Location:prescriptions.php");
		}

		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}	
	
	$conn->close();

?>