<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/admin_section.css">
	<link rel="stylesheet" href="css/article_mod.css">


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
			<h4> Articles Section</h4>
			<div class="main">
				<div id="add_art">
					<h5><strong>Add Article</strong></h5>
					<form class="" action="index.html" method="post">
						Name : <input class="name" type="text" name="name" value="Name"> <br><br>
						First Category :
						<select class="" name="cate_menu">
							<?php
							//foreach ($categories as $key => $value) {
							//} ?>
							<option value=""> Books </option>
						</select>
						<br><br>
						<button class="btn" type="submit" name="add_art"> Add Article </button>

					</form>
				</div>

				<div id="modify_art_name">
					<h5> <strong> Modify Article's Name</strong></h5>
					<form class="modify_art" action="index.html" method="post">
						Name :
						<select class="" name="cate_menu">
							<?php
							//foreach ($categories as $key => $value) {
							//} ?>
							<option value=""> Books </option>
						</select>	<br> <br>
						<label for="name"> New Name : </label><input class="newname" type="text" name="newname" value="newname"> <br><br>
						Description 
						<button class="btn" type="submit" name="modify"> Modify </button>

					</form>
				</div>

				<div id="add_art_category">
					<h5><strong> Add New Category</strong></h5>
					<form class="add_art_category" action="index.html" method="post">
						Name :
						<select class="" name="cate_menu">
							<?php
							//foreach ($categories as $key => $value) {
							//} ?>
							<option value=""> Books </option>
						</select>						<br><br>
						Add Category :
						<select class="" name="cate_menu">
							<?php
								require 'category.php';
								cate_list();
							?>
						</select>
						<br><br><br>
						<button class="btn" type="submit" name="del_Cat"> Delet Category </button>
						<br>
						<button class="btn" type="submit" name="add_Cat"> Add Category </button>
					</form>
				</div>

			</div>
			<br><br><br><br><br><br><br><br>
			<div id="del_art_name">
				<form class="del_Art" action="index.html" method="post">
					<button class="btn" type="submit" name="delete"> Delete Article </button>
				</form>
			</div>
		</div>
	</div>
	<div class="footer">
		<h6> Copyright © balcort, bmontoya, tle-huu- 2018</h6>
	</div>
</body>
</html>
