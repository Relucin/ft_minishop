<?php
session_start();
require 'db_init.php';

function get_name() {
if (isset($_SESSION['user_id']))
echo "Welcome ".$_SESSION['user_uname'];
else
echo "Welcome Guest";
}
?>
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
						<button class="dropbtn" onclick="location.href='#'"><?php get_name(); ?></button>
						<div class="dropdown-content">
							<?php
							if (isset($_SESSION['user_id'])) {
							echo "<a href='logout.php'>Logout</a>
							<a href='user_modify.php''>Account Modify</a>";
							if ($_SESSION['user_auth']) {
							echo "<a href='admin_portal.php'>Admin Portal</a>";
							}
							} else {
							echo "<a href='login.php'>Sign In</a>
							<a href='user_create.php'>Sign Up</a>";
							}
							?>
						</div>
					</div>
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
			</br>
			<?php
			$query= "SELECT * FROM Items";
			$result = mysqli_query($link, $query);
			$num=0;
			while ($row = mysqli_fetch_assoc($result)) {
			if ($num % 3 == 0) {
			echo '<div class="item_row">';
				echo "\n";
				}
				echo '<a class="title" href="item.php?=';
					$str = $row['item_name'];
					echo "$str".'">'."$str</a>\n";
				echo "<img class='image' src='".$row['item_url']."'>";
				echo "<div class='stock'>".$row['item_count']."</div>\n";
			echo "</div>\n";
		if ($num % 3 == 2) {
		echo "</div>\n";
	}
	$num++;

	}
	if ($num == 0)
	echo '<div class="item_row>
		<div class="item">
			<a class="title" href="">Empty Database</a>
			<img class="image" src="">
			<div class="stock">:( :( :(</div>
		</div>
	</div>';
	?>
	</br>
	<hr>
	<div id="bottom_corner">
		<p>&copy; bmontoya, irhett 2017 </p>
		<a class="about_link" href="http://rickandmorty.wikia.com/wiki/Needful_Things">About</a>
	</div>
</div>

	</body>
</html>
