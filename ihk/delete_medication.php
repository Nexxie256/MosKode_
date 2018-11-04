<?php
	//capture post values
	$pk = $_POST['primary'];
	

	//import db class
	require("ihk_db.php");

	//check
	$chk = "SELECT * FROM medication where med_id='$pk'";
	
	
	//results
	$res = $conn->query($chk);

	//so
	if(mysqli_num_rows($res)>0){
		//sql
		$sql = "DELETE FROM medication WHERE med_id='$pk'";

		//Query db
		if ($conn->query($sql) === TRUE) {
		    echo "Record deleted successfully";
		    //login
		    header("Location:medications.php");
		}

		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	else{
		echo("<body style='background: #d1ccc0;'><br><center style='padding-top:100;'><hr><h2 style='color:red;'><b style='color:red;'>Record does not exist anymore!</b></h2><br>
		    	<a href='medications.php'><b>Back</b></a></center><br>		    	
		    	<hr></body>");
	}	
	
	$conn->close();

?>