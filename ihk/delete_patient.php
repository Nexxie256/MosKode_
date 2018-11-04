<?php
	//capture post values
	$pk = $_POST['primary'];
	

	//import db class
	require("ihk_db.php");

	//check
	$chk = "SELECT * FROM patient where patient_id='$pk'";
	
	
	//results
	$res = $conn->query($chk);

	//so
	if(mysqli_num_rows($res)>0){
		//sql
		$sql = "DELETE FROM patient WHERE patient_id='$pk'";

		//Query db
		if ($conn->query($sql) === TRUE) {
		    echo "Record deleted successfully";
		    //login
		    header("Location:patients.php");
		}

		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	else{
		echo("<body style='background: #d1ccc0;'><center style='padding-top:150px;'><hr><b style='color:red;'>Record does not exist anymore!</b><hr><br><a href='patients.php'><b>Back</b></a></center></body>");
	}	
	
	$conn->close();

?>