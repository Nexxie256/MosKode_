<?php
	//capture post values
	$pk = $_POST['primary'];
	

	//import db class
	require("ihk_db.php");

	//check
	$chk = "SELECT * FROM receptionist where r_id='$pk'";
	
	
	//results
	$res = $conn->query($chk);

	//so
	if(mysqli_num_rows($res)>0){
		//sql
		$sql = "DELETE FROM receptionist WHERE r_id='$pk'";

		//Query db
		if ($conn->query($sql) === TRUE) {
		    echo "Record deleted successfully";
		    //login
		    header("Location:receptionists.php");
		}

		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	else{
		echo("<center><b style='color:red;'>Record does not exist anymore!</b></center>");
	}	
	
	$conn->close();

?>