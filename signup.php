
<?php
    session_start();
    if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
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

	<title>Our e shop website</title>
</head>
<body>
	<div class="container">
		<div class="welcome">
			<h1>Our E-Shop Website</h1> <br>
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
				<form action="controller/people.php" method="POST">
					<input type="text" name="name" placeholder="Name" class="" value="">
					<input type="password" name="password" placeholder="Password" class="">
					<button type="submit" class="">Sign Up</button>
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
