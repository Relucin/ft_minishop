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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Our e shop website</title>
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
			<div id="categories">
			</div>
			<div id="products">
				<div class="name"><strong><?php if (isset($_GET['name'])) echo $_GET['name'] ?></strong></div>
				<hr>
				<div class="description">
					<?php //echo  [descritpion] ?>
				</div>
				<hr />
				<div class="addcart">
					<h5>How many <?php  ?> do you want ?</h5>
					<form class="cartform" action="index.html" method="post">
						<input type="text" name="count" value="" width="2px"><span class="glyphicon glyphicon-plus"></span><br>
						<button type="submit" name="addbakset"> <span class="glyphicon glyphicon-shopping-cart"></span> </button>
					</form>
				</div>
			</div>
			<?php include("basket.php") ?>


		</div>
		<div class="footer">

		<h6> Copyright © balcort, bmontoya, tle-huu- 2018</h6>

		</div>

	</div>
</body>
</html>
