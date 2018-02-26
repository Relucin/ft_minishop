
<?php
	session_start();
	if (isset($_SESSION['user_id'])) {
		header('Location: index.php');
		exit();
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>iBrand On</title>
</head>
<body>
	<div class="container">
		<div class="welcome">
			<h1>iBrand On</h1> <br>
		</div>
		<div class="header">
			<div id="entete">
				<ul class="menu">
					<li><a href="index.php"> Home </a></li>
				</ul>
			</div>
		</div>

		<div class="section">
			<div class="log">
				<h1>Sign up</h1>
				<form action="user.php" method="POST">
					<input type="text" name="fname" placeholder="First Name">
					</br>
					<input type="text" name="lname" placeholder="Last Name">
					</br>
					<input type="text" name="username" placeholder="Username">
					</br>
					<input type="password" name="password" placeholder="Password">
					</br>
					<button type="submit" name="submit" value="Sign Up">Sign Up</button>
				</form>
			</div>

		</div>


	</div>
	<div class="footer">

		<h6> Copyright © balcort, bmontoya, tle-huu- 2018</h6>

	</div>

</div>
</body>
</html>
