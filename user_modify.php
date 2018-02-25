<!--
<?php
session_start();
if (!$_SESSION['user_id']) {
header("Location: index.php");
}
$state = 0;
if ($_GET['submit'] == 'OK' && $_GET['oldpwd']
&&($_GET['nuser'] || $_GET['newpwd'])) {
require 'user_hash.php';
require 'db_init.php';
$query = sprintf("SELECT *
FROM Users WHERE `user_id`='%d'", $_SESSION['user_id']);
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
if ($row['user_passwd'] === get_hash($_GET['oldpwd'])) {
$nuser = ($_GET['nuser']) ?
mysqli_real_escape_string($link, $_GET['nuser'])
: $row['user_uname'];
$npwd = ($_GET['newpwd']) ? get_hash($_GET['newpwd'])
: $row['user_passwd'];
$update = sprintf("UPDATE Users SET `user_uname`='%s',
`user_passwd`='%s' WHERE `user_id`=%d",
$nuser, $npwd, $_SESSION['user_id']);
if (mysqli_real_query($link, $update)) {
$state = 1;
} else {
echo mysqli_error($link)."\n";
}
} else {
$state = -1;
}
}
?>
-->
<html>
	<head>
		<title>Needful Things</title>
		<link href='https://fonts.googleapis.com/css?family=Amarante' rel='stylesheet'>
		<style>
			.background-image {
				position: fixed;
				left: 0;
				right: 0;
				z-index: 1;
				display: block;
				color: black;
				background-image: url("images/shop.png") ;
				background-color: black;
				background-size: cover;
				width: 100%;
				height: 100%;
				-webkit-filter: blur(20px);
				-moz-filter: blur(20px);
				-o-filter: blur(20px);
				-ms-filter: blur(20px);
				filter: blur(20px);
			}
			.content {
				position: relative;
				text-align: center;
				z-index: 9998;
				color: white;
				font-family: 'Amarante';
			}

			.h1 {
				color: white;
				font-family: 'Amarante';
				font-size: 90px;
				position: relative;
				vertical-align: middle;
				line-height: 100px;
				text-shadow: 3px 3px black;
			}

			p {
				font-family: 'Aramante';
				color: Red;
				text-align: center;
			}

			.menu_bar {
				position: absolute;
			</div>
			margin: auto;
			text-align: center;
			border-radius: 5px;
			background: black;
			width: 100%;
		}

		.dropbtn { /* Dropdown Button */
			background-color: black;
			color: #b71500;
			padding: 5px;
			font-size: 16px;
			font-family: 'Amarante';
			border: none;
			cursor: pointer;
			position: relative;
			border-radius: 5px;
		}

		.dropdown { /* The container <div> - needed to position the dropdown content */
			position: relative;
			width: auto;
			display: inline-block;
			text-align: center;
		}

		.dropdown-content { /* Dropdown Content (Hidden by Default) */
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 2;
			width: 100%;
		}

		.dropdown-content a { /* Links inside the dropdown */
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
			position: relative;
			width: auto;
			text-align: left;
		}

		.dropdown-content a:hover { /* Change color of dropdown links on hover */
			background-color: #f1f1f1;
			font-weight: bold;
			text-align: right;
		}

		.dropdown:hover .dropdown-content { /* Show the dropdown menu on hover */
			display: block;
			text-align: center;
		}

		.dropdown:hover .dropbtn { /* Change the background color of the dropdown button when the dropdown content is shown */
			background-color: #300010;
			border-radius: 5px;
		}

		.menu_bar_spacer {
			display: inline-block;
			position: relative;
		}

		.left_box { float: left; }
		.right_box { float: right; }

		.bottom_corner,  .about_link {
			color: white;
			text-align: right;
			font-family: "Courier New", Courier, monospace;
			z-index: 2;
		}

		.divider {
			display: inline-block;
			position: relative;
			border-left: 1px solid white;
			background-color: white;
			color: white;
			z-index: 3;
		}

		.row {
			position: relative;
			display: block;
			margin: auto;
			text-align: center;
			border-radius: 5px;
			background:black;
			width: 50%;
			height: 15px;
			padding: 10px;
		}

		.key {
			display: inline-block;
			position: relative;
			float: left;
			color: red;
			margin: auto;
			vertical-align: center;
		}

		.val {
			display: inline-block;
			position: relative;
			float: right;
			color: white;
			margin: auto;
			vertical-align: center;
		}

		.curse {
			display: inline-block;
			position: relative;
			text-align: center;
			color: red;
			margin: auto;
			vertical-align: center;
			font-family: 'Amarante';
		}


	</style>
</head>
<body>
	<div class="background-image"></div>
	<div class="content">

		<h1 class="h1"></br>NEEDFUL THINGS</h1>

		<div class="menu_bar">
			<div class="left_box">
				<div class="dropdown">
					<button class="dropbtn" onclick="location.href='index.php'">Home</button>
				</div>
				<div class="divider"></div>
				<div class="dropdown">
					<button class="dropbtn" onclick="location.href='categories.php'">Shop by Category</button>
					<div class="dropdown-content">
						<a href="categories.php?=Electronics">Electronics</a>
						<a href="categories.php?=Dildos">Dildos</a>
						<a href="categories.php?=Electronic_Dildos">Electronic Dildos</a>
					</div>
				</div>
				<div class="divider"></div>

				<div class="dropdown">
					<button class="dropbtn" onclick="location.href='items.php'"> Browse all Items</button>
				</div>
			</div>
			<div class="menu_bar_spacer"></div>
			<div class="right_box">
				<div class="dropdown">
					<button class="dropbtn" onclick="location.href='cart.php'">0 Items in Cart</button>
					<div class="dropdown-content">
						<a href="cart.php">View Cart</a>
						<a href="checkout.php">Checkout</a>
					</div>
				</div>
			</div>
		</div>
		</br>
		<hr>
		<h2>USER INFO PAGE</H2>
		</br>
		<div class="row">
			<p class="key">Username:</p>
			<p class="val">Username?</p>
		</div>
		<div class="row">
			<p class="key">First Name:</p>
			<p class="val">Username?</p>
		</div>
		<div class="row">
			<p class="key">Last Name:</p>
			<p class="val">Username?</p>
		</div>
		</br>
		<h3>CURSES</h3>
		<div class="row">
			<p class="curse"> suck dick for cash </p>
		</div>
		<div class="row">
			<p class="curse"> smoke weed every day </p>
		</div>
		<!-- or alternatively -->
		<div class="row">
			<p class="curse">No curses applied. (yet)</p>
		</div>

		</br>
		<hr>
		<h3>Information Incorrect? Modify it below.</h3>




		</br>	
		<?php
		if ($state < 0) {
		echo "Incorrect Password\n";
		} elseif ($state){
		echo "Account Successfully Modified\n";
		}
		?>
		<p>Modify Account</p>
		<form method="get" action="user_modify.php">
			New Username <input type="text" name="nuser" />
			<br/>
			Old Password <input type="password" name="oldpwd" />
			<br/>
			New Password <input type="password" name="newpwd" />
			<br/>
			<input type = "submit" name = "submit" value = "OK">
		</form>
		<p>Delete Account</p>
		<form method="get" action="user_delete.php">
			Enter password <input name="passwd" type="password" />
			<br/>
			<input type = "submit" name = "submit" value = "DELETE">
		</form>
		<hr>
		<div id="bottom_corner">
			<p>&copy; bmontoya, irhett 2017 </p>
			<a class="about_link" href="http://rickandmorty.wikia.com/wiki/Needful_Things">About</a>
		</div>
	</div>
</body>
</html>
