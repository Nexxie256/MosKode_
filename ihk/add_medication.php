<?php
	//capture post values
	$med_name = $_POST['med_name'];
	$med_cost = $_POST['med_cost'];
	
	

	//import db class
	require("ihk_db.php");

	//check
	$chk = "SELECT * FROM medication where med_name='$med_name'";
	
	
	//results
	$res = $conn->query($chk);

	//so
	if(mysqli_num_rows($res)>0){
		echo("<hr>
		    	<br><center style='padding-top:100;'><h2 style='color:red;'>medication credentials already in place.</h2></center><br>
		    	<center><a href='medications.php'><button style='background:lime;color:black;border-radius:50px;width:100px;height:35px;'>Try Again</button></a></center>
		    	<br>
		    	<hr>");
	}
	else{
		//all good
		//sql
		$sql = "INSERT into medication(med_name,med_cost) VALUES('$med_name','$med_cost')";

		//Query db
		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		    //login
		    header("Location:medications.php");
		}

		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}	
	
	$conn->close();

?>