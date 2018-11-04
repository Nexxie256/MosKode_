<?php
	//capture post values
	$name = $_POST['user'];
	$key = $_POST['pass'];
	$role = $_POST['role'];

	//import db class
	require("ihk_db.php");

	//check
	$chk = "SELECT * FROM users where username='$name'";
	
	
	//results
	$res = $conn->query($chk);

	//so
	if(mysqli_num_rows($res)>0){
		echo("<hr>
		    	<br><center style='padding-top:100;'><h2 style='color:red;'>Username is already in use.Please choose another one!</h2></center><br>
		    	<center><a href='users.php'><button style='background:lime;color:black;border-radius:50px;width:100px;height:35px;'>Try Again</button></a></center>
		    	<br>
		    	<hr>");
	}
	else{
		//all good
		//sql
		$sql = "INSERT into users(username,password,role) VALUES('$name','$key','$role')";

		//Query db
		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		    //login
		    header("Location:users.php");
		}

		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}	
	
	$conn->close();

?>