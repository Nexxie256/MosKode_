<?php
	//capture post values
	$pk = $_POST['primary'];
	
	//import db class
	require("ihk_db.php");
	echo("<a href='home.php'>
			<button style='color:red;float:right;margin-right:50px;'>
				Back
			</button>
		</a>");

	//check
	$chk = "SELECT * FROM users where user_id='$pk'";
	
	
	//results
	$res = $conn->query($chk);

	echo("<center><h2>Edit User<h2></center><hr>");

	//so
	if(mysqli_num_rows($res)>0){
		//sql
		$sql = "SELECT * FROM users where user_id='$pk'";

		//Query db
		while($row = $res->fetch_array()){
		 	echo("<body style='background:#95a5a6;'><center style='padding-top:40px;'>
				<form method='POST' action='user_update.php'>
					<input type='hidden' value='$pk' name='primary'>
					<label>Username</label>
					<br>
					<input type='text' class='in' value='$row[1]' name='username'>
					<br>
					<br>

					<label>Password</label>
					<br>
					<input type='text' class='in' value='$row[2]' name='pass'>
					<br>
					<br>

					<label>Role</label>
					<br>
					<input type='text' class='in' value='$row[3]' name='role'>
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