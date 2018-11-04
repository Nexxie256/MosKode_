<?php
	//capture post values
	$tname = $_POST['tname'];
	$tresult = $_POST['tresult'];
	$tcost = $_POST['tcost'];
	

	//import db class
	require("ihk_db.php");

	//check
	$chk = "SELECT * FROM test_results where test_name='$fname'";
	
	
	//results
	$res = $conn->query($chk);

	//so
	if(mysqli_num_rows($res)>0){
		echo("<hr>
		    	<br><center style='padding-top:100;'><h2 style='color:red;'>test_results credentials already in place.</h2></center><br>
		    	<center><a href='test_resultss.php'><button style='background:lime;color:black;border-radius:50px;width:100px;height:35px;'>Try Again</button></a></center>
		    	<br>
		    	<hr>");
	}
	else{
		//all good
		//sql
		$sql = "INSERT into test_results(test_name,Result,Cost) VALUES('$tname','$tresult','$tcost')";

		//Query db
		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		    //login
		    header("Location:test_results.php");
		}

		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}	
	
	$conn->close();

?>