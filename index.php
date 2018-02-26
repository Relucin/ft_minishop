<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/index.css">
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
					//	foreach ($categories as $key => $value) {
					//	echo "<a href='index.php?category=".$_GET['categories']."'>Books</a>";
						echo "<a href='#'>LOL</a>";
					?>
					</div>
				</div>
			</div>
			<div id="products">
				<?php  foreach ($_SESSION['category'] as $key => $value) {
					echo "
						<div class='article'>
							<div class='artname'><a href=article.php/?name=".$value.">".$value."</a></div>
							<div class='artdes'>.</div>
						</div>
					";
				} ?>
				<div class="article">
					<div class="artname"><a href="<?php  ?>"> name</a></div>
					<div class="artdes">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
				</div>
				<?php
					echo "";

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
