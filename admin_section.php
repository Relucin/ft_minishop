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
				<li><a href="basket.php"> Basket </a></li>
				<li><a href="signup.php"> Sign up </a></li>
				<li><a href="login.php"> Log in </a></li>
			</ul>

		</div>

		<div class="section">
			<h2 class="admin_portal"> Admin Portal</h2>
			<div class="main">
				<div class="touch articles">
					<h3>Articles section</h3>
					<form class="articles_form" method="post">
						<span>Add article : </span><input type="text" name="add_article" value=""><br><br>
						<span>Modify article : </span><input type="text" name="modify_article" value=""><br><br>
						<span>Delete article : </span><input type="text" name="delete_article" value=""><br><br>
						<input type="submit" name="submit_articles" value="send">
					</form>
				</div>

				<div class="touch categories">
					<h3> Categories section</h3>
					<form class="categories_form" method="post">
						Add category : <input type="text" name="add_category" value="">
						<input type="submit" name="addcate" value ="Send" />
					</form><br>
					<form class="categories_form" method="post">
						Modify category : <input type="text" name="modify_category" value="">
						<input type="submit" name="modifcate" value ="Send" />
					</form><br>
					<form class="categories_form" method="post">
						Delete category : <input type="text" name="delete_category" value="">
						<input type="submit" name="delcate" value ="Send" />
					</form>
				</div>

				<div class="touch users">
					<h3> Users section</h3>
					<form class="users_form" method="post">
						<span>Add user : </span><input type="text" name="add_user" value=""><br><br>
						<span>Modify user : </span><input type="text" name="modify_user" value=""><br><br>
						<span>Delete user : </span><input type="text" name="delete_user" value=""><br><br>
						<input type="submit" name="submit_users" value="send">
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<h6> Copyright © balcort, bmontoya, tle-huu- 2018</h6>
	</div>
</body>
</html>
