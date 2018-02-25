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
	<header>
		<br> <h1>Our E-Shop Website</h1> <br>
		<ul class="menu">
			<li><a href="index.php"> Home </a></li>
			<li><a href="departments.php"> Departments </a></li>
			<li><a href="basket.php"> Basket </a></li>
			<li><a href="signup.php"> Sign up </a></li>
			<li><a href="login.php"> Log in </a></li>
		</ul>

	</header>

	<section>

		<div class="departments">
			<form method="post">
				<p>
					<select name="departments">
						<option value="deparments">departments</option>
						<option value="web_languages">Web languages</option>

					</select>
					<input type="submit" value="Go" title="Chose category" />

				</p>
			</form>
		</div>
	</section>
	<footer>

	<h6> Copyright © balcort, bmontoya, tle-huu- 2018</h6>

	</footer>

</body>
</html>
