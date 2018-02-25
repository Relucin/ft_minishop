<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/article.css">
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
				</ul>
			</div>
		</div>

		<div class="section">
			<div id="categories">
			</div>
			<div id="products">
				<div class="name"><strong>< Name ></strong></div>
				<hr>
				<div class="description">
					< Description >a

				</div>
				<hr />
				<div class="addcart">
					<h5>How many <?php  ?> do you want ?</h5>
					<form class="cartform" action="index.html" method="post">
						<input type="text" name="count" value=""><br>
						<input type="submit" name="addbasket" value="Add to Basket">
					</form>
				</div>
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
