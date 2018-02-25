<?php
$ret = 0;
if ($_GET['submit'] === 'OK' && $_GET['passwd'] &&
	$_GET['fname'] && $_GET['lname'] &&
	$_GET['uname']) {
		require 'user_hash.php';
		require 'db_init.php';
		$uname = mysqli_real_escape_string($link, $_GET['uname']);
		$query = sprintf("SELECT `user_uname`
						FROM Users WHERE `user_uname`='%s'", $uname);
		if (!mysqli_num_rows(mysqli_query($link, $query))) {
			$sql = sprintf("INSERT INTO Users
							(`user_uname`, `user_fname`, `user_lname`, `user_passwd`)
							VALUES ('%s', '%s', '%s', '%s')",
							$uname, mysqli_real_escape_string($link, $_GET['fname']),
							mysqli_real_escape_string($link, $_GET['lname']),
							get_hash($_GET['passwd']));
			if (mysqli_real_query($link, $sql)) {
				header("Location: index.php");
			} else {
				$ret = "Error\n";
			}
		} else {
			$ret = "User exists\n";
		}
} else if ($_GET['submit'] == 'OK') {
	$ret = "Missing information\n";
}
?>
<html>
	<head>
		<title>Needful Things | Create User</title>
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
			</div>
			color: white;
			font-family: 'Amarante';
			font-size: 90px;
			position: relative;
			vertical-align: middle;
			line-height: 100px;
			text-shadow: 3px 3px black;
		}

		.menu_bar {
			position: absolute;
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

		.user_signin {}
		.user_create {}

		.bottom_corner, p, .about_link {
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

		.item_row {
			margin: auto;
			text-align: center;
			width: 95%;
			height: 25%;
			position: relative;
			display: block;
		}
		.item {
			display: inline-block;
			margin: auto;
			width: 360px;
			height: 400px;
			background-color: black;
			border-radius:10px;
			padding-bottom: 2px;
			position: relative;
			vertical-align: middle;
			padding: 2px;
		}
		.title {
			color:white;
			font-size: 20px;
			text-align: center;
			position: relative;
			padding-bottom: 5px;
			text-decoration: none;
		}
		.image {
			display: inline-block;
			position: relative;
			width: 350px;
			height; 350px;
			background-color: white;
			text-align:center;
			padding: 5px;
		}
		.stock {
			color:red;
			font-size: 10px;
			text-align: right;
			padding-top: 2px;
			padding-bottom: 2px;
			padding-right: 5px;
		}
		.stuff {
			z-index: 3;
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
		</br>
		<div class="stuff">
			<?php
			if ($ret)
			echo $ret;
			?>
			<form method="get" action="user_create.php">
				Username <input type="text" name="uname"
				value="<?php echo $_GET['uname'];?>"/>
				<br/>
				First Name <input type="text" name="fname"
				value="<?php echo $_GET['fname'];?>"/>
				<br/>
				Last Name <input type="text" name="lname"
				value="<?php echo $_GET['lname'];?>"/>
				<br/>
				Password <input type="password" name="passwd" />
				<br/>
				<input type = "submit" name = "submit" value = "OK" />
			</form>
		</div>
		<hr>
		<div id="bottom_corner">
			<p>&copy; bmontoya, irhett 2017 </p>
			<a class="about_link" href="http://rickandmorty.wikia.com/wiki/Needful_Things">About</a>
		</div>
	</div>

</body>
</html>
