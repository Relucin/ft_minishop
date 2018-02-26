<?php

session_start();

?>

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
				<div class="name"><strong><?php if (isset($_GET['name'])) echo $_GET['name']; ?></strong></div>
				<hr>
				<div class="description">
					<?php //echo  [descritpion] ?>
				</div>
				<hr />
				<div class="addcart">
					<h5>How many <?php if(isset($_GET['name'])) echo $_GET['name'];  ?> do you want ?</h5>
					<form class="cartform" action="add_item_cart.php" method="post">
						<input type="text" name="count" value="" width="2px"><br>
						<input type="submit" name="addcart" value="Add to cart">
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
