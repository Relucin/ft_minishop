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
			<br> <h1>iBrand On</h1> <br>
			<ul class="menu">
				<li><a href="index.php"> Home </a></li>
				<li><a href="admin_section.php"> Admin Portal </a></li>
			</ul>

		</div>

		<div class="section">
			<h2 class="admin_portal"> Admin Portal</h2>
			<h4> Categories Section</h4>
			<div class="main">
				<form class="lol" action="category.php" method="post">
					<div class="choose_cat">
						<label for="name"> Category Name : </label>
						<select class="" name="cate_menu">
							<?php
								require 'category.php';
								cate_list('<option value="%s">%s</option>');
							?>
						</select>
					</div>
					<br>
					<label for="name"> New Name : </label><input class="newname" type="text" name="newname" placeholder="newname"> <br><br>
					<button class="btn" type="submit" name="add"> Add </button>
					<button class="btn" type="submit" name="modify"> Modify </button>
					<button class="btn" type="submit" name="delete"> Delete </button>
				</form>
			</div>
		</div>
	</div>
	<div class="footer">
		<h6> Copyright © balcort, bmontoya, tle-huu- 2018</h6>
	</div>
</body>
</html>
