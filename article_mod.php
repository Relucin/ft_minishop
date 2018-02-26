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
			<h4> Articles Section</h4>
			<div class="main">
				<form class="lol" action="item.php" method="post">
					<label for="name"> Name : </label><input class="name" type="text" name="name" value="Name"> <br><br>
					<label for="name"> New Name : </label><input class="newname" type="text" name="newname" value="newname"> <br><br>
					<div class="choose_cat">
						<label for="name"> Category : </label>
						<select class="" name="cate_menu">
							<?php
							//foreach ($categories as $key => $value) {
							//} ?>
							<option value=""> Books </option>
						</select>
					</div>
					<br>
					<textarea name="description" id="description" rows="8" cols="40" > Describe the article</textarea>  <br>
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
