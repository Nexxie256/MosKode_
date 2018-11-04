<?php

	$user = $_REQUEST['user'];
	$key = $_REQUEST['password'];

	
	// Create connection
	require_once('ihk_db.php');
	
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	else{
		//sql
		$sql = "SELECT * FROM users WHERE username='$user' AND password='$key'";

		//Query db
		$result = $conn->query($sql);

		if ($result->num_rows){
			//check for role
			$chek = "SELECT role from users where username='$user' AND password='$key'";
			$res = $conn->query($chek);
			while($row = $res->fetch_array()){
				//views
				if($row[0]=='admin'){
					//admin view
				    session_start();
				    /*session_id['$user'];*/
				    header("Location:home.php");
				}
				//end of admin view

				elseif($row[0]=='doctor'){
					//doctors view
					/*header("Location:patients.php");*/
					echo("<body style='background:#95a5a6;'>");
					echo("<h2><b style='color:green'>Hello</b>"." "."Dr.$user</h2>");
					echo("<a href='index.php'>
							<button style='color:red;float:right;margin-right:50px;'>
								Sign Out
							</button>
						</a>");
					
					echo("<center>");
					echo("<h1><u>"."Prescriptions"."</u></h1>");
					echo("<hr>");
					echo("<form method='POST' action='add_prescription.php'>
							<br>
							<input type='text' class='in' placeholder='Prescription name' name='pname' required>
							<br>
							<input type='number' class='in' placeholder='Cost' name='pcost' required>
							<br><br>
							<input type='submit' value='Add' style='color:black;background:green;border-radius:50px;height:30px;width:80px;'></form>");	
					echo("<hr>");

					$sql = "SELECT * FROM prescription";
					//query db
					$result = $conn->query($sql);

					//display results
					if($result->num_rows>0){
						echo("<table style='width:500px;padding-top:20px;'>");
						echo("<tr>");
						echo("<td><b><u>Prescription Name</u></b></td>
							<td><b><u>Cost</u></b></td>");
						echo("</tr>");
						while($row = $result->fetch_array()){
							$pk = $row[0];
							echo("<tr>");
							echo("<td>$row[1]</td>
								<td>$row[2]</td>
							");
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
				}
				//end of doctor view

				elseif($row[0]=='accountant'){
					//accountants view
					/*header("Location:receipts.php");*/
					echo("<body style='background:#95a5a6;'>");
					echo("<h2><b style='color:green'>Hello</b>"." "."$user</h2>");
					echo("<a href='index.php'>
							<button style='color:red;float:right;margin-right:50px;'>
								Sign Out
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
						");
						echo("</tr>");
						while($row = $result->fetch_array()){
						$pk = $row[0];
						echo("<tr>");
						echo("<td>$row[1]</td>
							<td>$row[2]</td>
							<td>$row[3]</td>
							");
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

				}
				//end of accountants view

				//pharmacist begins
				elseif($row[0]=='pharmacist'){
					//pharmacist view
					echo("<h2><b style='color:green;'>Hello</b>"." "."$user</h2>");
					echo("<body style='background:#95a5a6;'>");
					echo("<a href='index.php'>
							<button style='color:red;float:right;margin-right:50px;'>
								Sign Out
							</button>
						</a>");
					
					echo("<center>");
					echo("<h1><u>"."medications"."</u></h1>");
					echo("<hr>");
					echo("<form method='POST' action='add_medication.php'>
							<br>
							<input type='text' class='in' placeholder='medication name' name='med_name' required>
							<br>
							<input type='number' class='in' placeholder='Cost' name='med_cost' required>
							<br><br>
							<input type='submit' value='Add' style='color:black;background:green;border-radius:50px;height:30px;width:80px;'></form>");	
					echo("<hr>");

					$sql = "SELECT * FROM medication";
					//query db
					$result = $conn->query($sql);

					//display results
					if($result->num_rows>0){
						echo("<table style='width:500px;padding-top:20px;'>");
						echo("<tr>");
						echo("<td><b><u>medication Name</u></b></td>
							<td><b><u>Cost</u></b></td>");
						echo("</tr>");
						while($row = $result->fetch_array()){
						$pk = $row[0];
						echo("<tr>");
						echo("<td>$row[1]</td>
							<td>$row[2]</td>
							");
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
				}
				//end of pharmacist view

				//lab tech view begins
				elseif($row[0]=='lab_tech'){
					//lab_tech view
					echo("<h2><b style='color:green;'>Hello</b>"." "."$user</h2>");
					echo("<body style='background:#95a5a6;'>");
					echo("<a href='index.php'>
							<button style='color:red;float:right;margin-right:50px;'>
								Sign Out
							</button>
						</a>");

					echo("<center>");
					echo("<h1><u>"."Test Results"."</u></h1>");
					echo("<hr>");
					echo("<form method='POST' action='add_test.php'>
							<br>
							<input type='text' class='in' placeholder='Test Name' name='tname' required>
							<br>
							<input type='text' class='in' placeholder='Test Results' name='tresult' required>
							<br>
							<input type='text' class='in' placeholder='Test Cost' name='tcost'>
							<br>
							<br>
							<input type='submit' value='Add' style='color:black;background:green;border-radius:50px;height:30px;width:80px;'></form>");	
					echo("<hr>");

					$sql = "SELECT * FROM test_results";
					//query db
					$result = $conn->query($sql);

					//display results
					if($result->num_rows>0){
						echo("<table style='width:500px;padding-top:20px;'>");
						echo("<tr>");
						echo("<td><b><u>Test Name</u></b></td>
							<td><b><u>Test Result</u></b></td>
							<td><b><u>Test Cost</u></b></td>
						");
						echo("</tr>");
						while($row = $result->fetch_array()){
							$pk = $row[0];
							echo("<tr>");
							echo("<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[3]</td>
							");
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
				}
				//end of lab_tech view

				//receptionist view begins
				elseif($row[0]=='receptionist'){
					//receptionist view
					echo("<body style='background:#95a5a6;'>");
					echo("<h2><b style='color:green'>Hello</b>"." "."$user</h2>");
					echo("<a href='index.php'>
							<button style='color:red;float:right;margin-right:50px;'>
								Sign out
							</button>
						</a>");
					
					echo("<center>");
					echo("<h1><u>"."Patients"."</u></h1>");
					echo("<hr>");
					echo("<form method='POST' action='add_patient.php'>
							<br>
							<input type='text' class='in' placeholder='Firstname' name='fname' required>
							<br>
							<input type='text' class='in' placeholder='Lastname' name='lname' required>
							<br>
							<input type='text' class='in' placeholder='Age' name='age'>
							<br>
							<input type='text' class='in' placeholder='Gender' name='gender'>
							<br><br>
							<input type='submit' value='Add' style='color:black;background:green;border-radius:50px;height:30px;width:80px;'></form>");	
					echo("<hr>");

					$sql = "SELECT * FROM patient";
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
						");
						echo("</tr>");
						while($row = $result->fetch_array()){
							$pk = $row[0];
							echo("<tr>");
							echo("<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[3]</td>
								<td>$row[4]</td>
							");
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
				}
				//end of receptionist view

				else{
					//non user
					header("Location:index.php");
				}
			}
		}
		else {
		    echo("<body style='background: #d1ccc0;'><br><center style='padding-top:100;'><hr><h2 style='color:red;'>Wrong Username or Password!</h2></center><br>
		    	<center><a href='index.php'><button style='background:lime;color:black;border-radius:50px;width:100px;height:35px;'>Try Again</button></a></center>
		    	<br>
		    	<hr></body>");
		}

		$conn->close();
	}

?>