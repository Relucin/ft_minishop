<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/bask.css">

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
					<li><a href="signup.php"> Sign up </a></li>
					<li><a href="login.php"> Log in </a></li>
					<li><a href="admin_section.php"> Admin Portal </a></li>
				</ul>
			</div>
		</div>

		<div class="section">
			<div id="categories">

				<div class="dropdown">
					<button class="dropbtn">Categories</button>
					<div class='dropdown-content'>
					<?php
						echo "<a href='#'>Books</a>";
						echo "<a href='#'>LOL</a>";
					?>
					</div>
				</div>
			</div>
			<div id="products">

			</div>
			<div id="cart">
					<h2> Basket </h2>
					<table class="bask">
						<thead>
							<tr>
								<td> Name </td>
								<td></td>
								<td class="right"> Price </td>
								<td class="right"> Count </td>
							</tr>
						</thead>
					</table>
					<div >
						<form class="cartvalid" method="post">
							<button class="validbtn" type="submit" name="validate"> Validate Basket </button>
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
