<?php
	session_start();
	unset($_SESSION['item']);
	if (!$_SESSION['user_auth']) {
		header ("Location: index.php");
	}
	require 'db_init.php';
	$acat = "";
	$rcat = "";
	$aitem = "";
	if ($_GET['addcate'] === "OK") {
		require 'category_create.php';
		$acat = category_create($_GET['category']);
	} else if ($_GET['remcate'] === "OK") {
		$delete = sprintf("DELETE FROM Categories WHERE
		`cate_name` = '%s'", $_GET['categories']);
		if (mysqli_real_query($link, $delete)) {
			$rcat = "Removed category ".$_GET['categories']."\n";
		} else {
		$rcat = "Error\n";
		}
	} else if ($_GET['additem'] === "OK") {
		require 'item_create.php';
		$aitem = item_create($_GET['item'], (int)$_GET['item_count'], $_GET['url']);
	}
	?>
<html>
	<head>
		<title>Admin Portal</title>
		<link href='https://fonts.googleapis.com/css?family=Amarante' rel='stylesheet'>
		<style>
			.background-image {
				position: fixed;
				left: 0;
				right: 0;
				z-index: 1;
				display: block;
				color: black;
				background-image: url("images/Ricked.png") ;
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

		</style>
	</head>
	<body>
		<div class="background-image"></div>
		<div class="content">
			<h1>Admin Portal</h1>
			<p>Add Category</p>
			<?php echo $acat;?>
			<form method="get" action="admin_portal.php">
				Category Name <input type="text" name="category" />
				<input type="submit" name="addcate" value ="OK" />
			</form>
			<p>Remove Category</p>
			<?php echo $rcat;?>
			<form method="get" action="admin_portal.php">
				<select name="categories">
					<?php
					$query = "SELECT * FROM Categories";
					$result = mysqli_query($link, $query);
					while ($row = mysqli_fetch_assoc($result)){
					echo "<option value=\"".$row['cate_name']."\">".$row['cate_name']."</option>";
					}
				?>
			</select>
			<input type="submit" name="remcate" value="OK" />
		</form>
		<p>Add Item</p>
		<?php echo $aitem;?>
		<form method="get" action="admin_portal.php">
			Item Name <input type="text" name="item" />
			<br />
			Item Count <input type="number" name="icount" min="0" step="1" />
			<br />
			Item Url <input type="url" name="url"/>
			<br />
			<input type="submit" name="additem" value ="OK" />
		</form>
		<p>Modify Item</p>
		<form method="get" action="item_modify.php">
			<select name="item">
				<?php
					$query = "SELECT * FROM Items";
					$result = mysqli_query($link, $query);
					while ($row = mysqli_fetch_assoc($result)){
					echo "<option value=\"".$row['item_name']."\">".$row['item_name']."</option>";
					}
					?>
				</select>
				<input type="submit" name="submit" value ="OK" />
			</form>
		</div>
	</body>
</html>
