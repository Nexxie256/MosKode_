<?php
	//capture post values
	$pk = $_POST['primary'];
	
	//import db class
	require("ihk_db.php");
	echo("<a href='prescriptions.php'>
			<button style='color:red;float:right;margin-right:50px;'>
				Back
			</button>
		</a>");

	//check
	$chk = "SELECT * FROM prescription where p_id='$pk'";
	
	
	//results
	$res = $conn->query($chk);

	echo("<center><h2>Edit prescription<h2></center><hr>");

	//so
	if(mysqli_num_rows($res)>0){
		//sql
		$sql = "SELECT * FROM prescription where p_id='$pk'";

		//Query db
		while($row = $res->fetch_array()){
		 	echo("<body style='background:#95a5a6;'><center style='padding-top:40px;'>
				<form method='POST' action='prescription_update.php'>
					<input type='hidden' value='$pk' name='primary'>
					<label>Prescription Name</label>
					<br>
					<input type='text' class='in' value='$row[1]' name='fname'>
					<br>
					<br>
					<label>Cost</label>
					<br>
					<input type='text' class='in' value='$row[2]' name='lname'>
					<br>
					<br>
					<input type='submit' id='send' value='update'>

				</form>
		   		</center>
		   		</body>"
		   	);		    
		}				
	}
	elseif(mysqli_num_rows($res)<=0){
		echo("<center><b style='color:red;'>Record does not exist anymore!</b></center>");
	}

	$conn->close();

	echo("<style>
			.in{
				wp_idth:300px;
				height:40px;
				padding: 10px;
			}
			form{
				height:400px;
			}
			#send{
				background:green;
				border-radius:50px;
				wp_idth:80px;
				height:40px;
				color:black;
			}
		</style>");


?>