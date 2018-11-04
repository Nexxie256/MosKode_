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
	echo("<h1><u>"."Receipts"."</u></h1>");
	echo("<hr>");
	echo("<form method='POST' action='add_receipt.php'>
			<br>
			<input type='text' class='in' placeholder='Receipt ID' name='rname' required>
			<br>
			<input type='text' class='in' placeholder='Reciept Value' name='rvalue' required>
			<br><br>
			<input type='submit' value='Add' style='color:black;background:green;border-radius:50px;height:30px;width:80px;'></form>");	
	echo("<hr>");

	$sql = "SELECT * FROM receipt";
	//query db
	$result = $conn->query($sql);

	//display results
	if($result->num_rows>0){
		echo("<table style='width:500px;padding-top:20px;'>");
		echo("<tr>");
		echo("<td><b><u>Receipt ID</u></b></td>
			<td><b><u>Receipt Value</u></b></td>
			<td><b><u>Time</u></b></td>
			<td><b><u>Action</u></b></td>");
		echo("</tr>");
		while($row = $result->fetch_array()){
			$pk = $row[0];
			echo("<tr>");
			echo("<td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[3]</td>
				<td>
					<form method='POST' action='delete_receipt.php'>
						<input type='hidden' value='$pk' name='primary'>
						<input id='delete' type='submit' value='Delete'>
					</form>
				<td>
				<form method='POST' action='update_receipt.php'>
					<input type='hidden' value='$pk' name='primary'>
						<input id='edit' type='submit' value='Update'>
				</form>"."</td>");
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