<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<center>

			<h1>
				<b><u>LOG IN!</u><br></b>
			</h1>
			<hr>
			<h2>
				<form method='POST' action='access.php'>
					<input type='text' class='inz' placeholder='Username' name='user' required>
					<br>
					<br>
					<input type='password' class='inz' placeholder='Password' name='password' required>
					<br>
					<br>
					<hr>
					<input id='submit' type='submit' value='LogIn'>&nbsp;
					<!-- <a href="signup.php">
						<small>Sign Up</small>
					</a> -->
					<br>
					
				</form>
			</h2>
		</center>

		<style>

			.inz{
				width:350px;
				height:40px;
				border-radius:7px;
			}

			#submit{
			border-radius:80px;
			height:40px;
			width:100px;
			background:green;
			color:black;
			}

			body{
				padding-top:100px;
				background: #d1ccc0/*#4b6584->cool blue*/;
			}

		</style>
		</body>
</html>
