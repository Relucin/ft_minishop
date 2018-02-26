<?php

session_start();
require 'category.php';

if (!isset($_SESSION['basket']))
	$_SESSION['basket'] = array();

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
			<h1>iBrand On</h1> <br>
		</div>
		<div class="header">
			<div id="entete">
				<ul class="menu">
					<li><a href="index.php"> Home </a></li>
					<?php
						if (!isset($_SESSION['user_id'])) {
							echo '
						<li><a href="signup.php"> Sign up </a></li>
						<li><a href="login.php"> Log in </a></li>';
						} else {
							if ($_SESSION['user_auth']){
								echo '
									<li><a href="admin_section.php"> Admin Portal </a></li>
								';
							}
							echo '
								<li><a href="logout.php">Log out</a></li>
							';
						}
					?>
				</ul>
			</div>
		</div>

		<div class="section">
			<div id="categories">

				<div class="dropdown">
					<button class="dropbtn">Categories</button>
					<div class='dropdown-content'>
					<?php
						cate_list('<a href="index.php?category=%s">%s</a>');
					?>
					</div>
				</div>
			</div>
			<div id="products">
				<?php
					require 'db_init.php';
					if (isset($_GET['category'])){
						$cate_id = mysqli_real_escape_string($link, $_GET['category']);
						$command = sprintf("SELECT * FROM Item_category"
										. " JOIN Items ON ic_item=Items.item_id"
										. " WHERE ic_cate='%d'", $cate_id);
					} else {
						$command = "SELECT * FROM Items";
					}
					$query = mysqli_query($link, $command);
					if (!empty($query)) {
						while ($row = mysqli_fetch_array($query)) {
							printf('<div class="article">'
									. '<div class="artname"><a href="article.php?item=%d">%s</a></div>'
									. '<div class="artdes">%s</div></div>',
									$row['item_id'], $row['item_name'], $row['item_url']);
						}
					}
				?>
			</div>
			<?php include("basket.php") ?>

		</div>
		<div class="footer">

		<h6> Copyright © balcort, bmontoya, tle-huu- 2018</h6>

		</div>

	</div>
</body>
</html>
