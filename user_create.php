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
