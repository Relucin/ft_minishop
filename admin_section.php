<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/admin_section.css">

	<title>Our e shop website</title>
</head>
<body>
	<div class="container">

		<div class="header">
			<br> <h1>Our E-Shop Website</h1> <br>
			<ul class="menu">
				<li><a href="index.php"> Home </a></li>
			</ul>

		</div>

		<div class="section">
			<h2 class="admin_portal"> Admin Portal</h2>
			<div class="main">
				<div class="touches">
					<ul class="menu">
						<li><a href="article_mod.php"> Articles Section </a></li>
						<li><a href="category_mod.php">Categories Section</a></li>
						<li><a href="user_mod.php"> Users Section </a></li>
					</ul>

				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<h6> Copyright © balcort, bmontoya, tle-huu- 2018</h6>
	</div>
</body>
</html>
