<?php
	//import db class
	require("ihk_db.php");
	
	echo("<body style='background:#95a5a6;'>");
	echo("<a href='home.php'>
			<button style='color:red;float:right;margin-right:50px;'>
				Back
			</button>
		</a>");
	echo("<center>");
	echo("<h1><u>"."Doctors"."</u></h1>");
	echo("<hr>");
	echo("<form method='POST' action='add_doctor.php'>
			<br>
			<input type='text' class='in' placeholder='Firstname' name='fname' required>
			<br>
			<input type='text' class='in' placeholder='Lastname' name='lname' required>
			<br>
			<input type='number' class='in' placeholder='Age' name='age'>
			<br>
			<input type='text' class='in' placeholder='Gender' pattern='^[MF]{1}' name='gender'>
			<br><br>
			<input type='submit' value='Add' style='color:black;background:green;border-radius:50px;height:30px;width:80px;'></form>");	
	echo("<hr>");

	$sql = "SELECT * FROM doctor";
	//query db
	$result = $conn->query($sql);

	//display results
	if($result->num_rows>0){
		echo("<table style='width:500px;padding-top:20px;'>");
		echo("<tr>");
		echo("<td><b><u>First Name</u></b></td>
			<td><b><u>Last Name</u></b></td>
			<td><b><u>Age</u></b></td>
			<td><b><u>Gender</u></b></td>
			<td><b><u>Action</u></b></td>");
		echo("</tr>");
		while($row = $result->fetch_array()){
			$pk = $row[0];
			echo("<tr>");
			echo("<td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[3]</td>
				<td>$row[4]</td>
				<td>
					<form method='POST' action='delete_doctor.php'>
						<input type='hidden' value='$pk' name='primary'>
						<input id='delete' type='submit' value='Delete'>
					</form>
				<td>
				<form method='POST' action='update_doctor.php'>
					<input type='hidden' value='$pk' name='primary'>
						<input id='edit' type='submit' value='Update'>
				</form>"."</td>"
			);
			echo("</tr>");						
		}
		echo("</table>");						
	}						

	$conn->close();

	echo("</center>");
	echo("<style>
			#delete{
				color:white;
				background:red;
				border-radius:40px;
				height:30px;
				width:80px;
			}
			#edit{
				color:black;
				background:green;
				border-radius:40px;
				height:30px;
				width:80px;
			}
			.in{
				width:300px;
				height:40px;
			}
			small{
				font-size:18px;
			}
		</style>");

	
	 echo("</body>");

?>