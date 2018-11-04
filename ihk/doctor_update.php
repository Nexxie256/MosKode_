<?php
	//capture post values
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$pk = $_POST['primary'];

	

	//import db class
	require("ihk_db.php");
	echo("<a href='doctors.php'>
			<button style='color:red;float:right;margin-right:50px;'>
				Back
			</button>
		</a>");

	//check
	$chk = "SELECT * FROM doctor where doctor_no='$pk'";
	
	
	//results
	$res = $conn->query($chk);

	echo("<center><h2>Edit Doctor<h2></center><hr>");

	//so
	if(mysqli_num_rows($res)>0){
		
		//sql
		$sql = "UPDATE doctor SET fname='$fname',lname='$lname',age='$age',gender='$gender' where doctor_no='$pk'";

		//Query db
		if ($conn->query($sql) === TRUE) {
		    echo "Record updated successfully";
		    //redirect
		    header("Location:doctors.php");
		}

		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}				
	}
	elseif(mysqli_num_rows($res)<=0){
		echo("<center><b style='color:red;'>Record does not exist anymore!</b></center>");
	}

	$conn->close();

	echo("<style>
			.in{
				width:300px;
				height:40px;
				padding: 10px;
			}
			form{
				height:400px;
			}
			#send{
				background:green;
				border-radius:50px;
				width:80px;
				height:40px;
				color:black;
			}
		</style>");


?>