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
				<div class="article">
					<div class="artname"><a href="<?php  ?>"> name</a></div>
					<div class="artdes">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
				</div>

				<?php
					echo "";

				?>
			</div>
			<div id="cart">
					<h2> Basket </h2>
					<table class="bask">
						<thead>
							<tr>
								<td class="label"> Name </td>
								<td></td>
								<td class="label"> Price </td>
								<td class="label"> Count </td>
							</tr>
						</thead>
					</table>

							<div class="cartvalid">
								<?php
									if (isset($_SESSION['pseudo'])) {
										echo "<form method=\"post\" action=\"controller/orders.php\" />
										<input type=\"hidden\" name=\"from\" value=\"basket\" />
										<input type=\"hidden\" name=\"success\" value=\"member\" />

										<button class='validbtn' type='submit' name='validate'> Validate Basket </button>
										</form>";
										//<a href='#' class='button'>Valider la commande</a>";
									} else {
										echo "<button class='notloggedbtn' type='submit' name='login'><a href='login.php' class=''>Log in to validade</a></button>";
									}
								?></div>

			</div>

		</div>
		<div class="footer">

		<h6> Copyright © balcort, bmontoya, tle-huu- 2018</h6>

		</div>

	</div>
</body>
</html>
