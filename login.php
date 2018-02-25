
<?php
	session_start();
	if (isset($_SESSION['user_id'])) {
		header('Location: index.php');
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/login.css">

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
				<h1>Log in</h1>
				<form action="user.php" method="POST">
					<input type="text" name="username" placeholder="Name">
					<input type="password" name="password" placeholder="Password">
					<button type="submit" name="submit" value="Login">Login</button>

					<p>Not member yet ? <a href="signup.php">Sign Up !</a></p>
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
