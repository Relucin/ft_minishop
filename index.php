<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/index.css">
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
					<li><a href="basket.php"> Basket </a></li>
					<li><a href="signup.php"> Sign up </a></li>
					<li><a href="login.php"> Log in </a></li>
				</ul>
			</div>
		</div>

		<div class="section">
			<div class="dropdown">
				<button class="dropbtn">Categories</button>
				<div class="dropdown-content">
					<a href="#">Books</a>
				</div>
			</div>
			<div class="cart">
					<h2> Cart </h2>
				<div class="validbtn">
					<form class="cartvalid" method="post">
						<input type="submit" name="validate" value="Validate Cart">
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
