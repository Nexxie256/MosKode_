<?php
	//capture post values
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];

	//import db class
	require("ihk_db.php");

	//check
	$chk = "SELECT * FROM Pharmacist where fname='$fname' and lname='$lname";
	
	
	//results
	$res = $conn->query($chk);

	//so
	if(mysqli_num_rows($res)>0){
		echo("<hr>
		    	<br><center style='padding-top:100;'><h2 style='color:red;'>Credentials already in place.</h2></center><br>
		    	<center><a href='doctors.php'><button style='background:lime;color:black;border-radius:50px;width:100px;height:35px;'>Try Again</button></a></center>
		    	<br>
		    	<hr>");
	}
	else{
		//all good
		//sql
		$sql = "INSERT into Pharmacist(fname,lname,age,gender) VALUES('$fname','$lname','$age','$gender')";

		//Query db
		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		    //login
		    header("Location:pharmacists.php");
		}

		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}	
	
	$conn->close();

?>