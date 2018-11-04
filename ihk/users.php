<?php
	//import db class
	require("ihk_db.php");
	echo("<a href='home.php'>
			<button style='color:red;float:right;margin-right:50px;'>
				Back
			</button>
		</a>");
	echo("<center>");
	echo("<body style='background:#95a5a6;'>");

	echo("<h1 style='color:black;'><u>"."Users"."</u></h1>");

	echo("<hr>");

	echo("<form method='POST' action='add_user.php'>
			<br>
			<input type='text' class='in' placeholder='Username' name='user' required>
			<br>
			<input type='text' class='in' placeholder='Password' name='pass' required>
			<br>
			<input type='text' class='in' placeholder='Role' name='role'>
			<br><br>
			<input type='submit' value='Add' style='color:black;background:green;border-radius:50px;height:30px;width:80px;'></form>");	
	echo("<hr>");

	$sql = "SELECT * FROM users where username!='Mark'";
	//query db
	$result = $conn->query($sql);

	//display results
	if($result->num_rows>0){
		echo("<table style='width:500px;padding-top:20px;color:black;'>");
		echo("<tr style='color:black;'>");
		echo("<td>
				<b><u>Username</u></b>
			</td>
			<td>
				<b><u>Password</u></b>
			</td>
			<td>
				<b><u>Role</u></b>
			</td>
			<td>
				<b><u>Action</u></b>
			</td>");
		echo("</tr>");
		while($row = $result->fetch_array()){
			$pk = $row[0];
			echo("<tr>");
			echo("<td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[3]</td>
				<td>
					<table>
						<tr>
							<td>
								<form method='POST' action='delete_user.php'>
								<input type='hidden' value='$pk' name='primary'>
									<input id='delete' type='submit' value='Delete'>
								</form>
								<td>
								<form method='POST' action='update_user.php'>
									<input type='hidden' value='$pk' name='primary'>
									<input id='edit' type='submit' value='Update'>
								</form>
								"."
							</td>
						</tr>
					</table>
					</td>");
			echo("</tr>");						
		}
		echo("</table>");
		echo("<hr>");
		
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
	}						

	$conn->close();

	 echo("</body >");

	echo("</center>");

	

?>