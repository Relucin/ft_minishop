<?php
	session_start();
	if (!$_SESSION['user_auth']) {
		header ("Location: index.php");
	}
	require 'db_init.php';
	$acat = "";
	if (!isset($_SESSION['item'])) {
		if ($_GET['submit'] !== 'OK' || !$_GET['item']){
		header("Location: admin_portal.php");
		} else {
			$query = sprintf("SELECT * FROM Items WHERE `item_name`='%s'",
			$_GET['item']);
			$result = mysqli_query($link, $query);
			$row = mysqli_fetch_assoc($result);
			$_SESSION['count'] = $row['item_count'];
			$_SESSION['item'] = $_GET['item_id'];
		}
	}
	if ($_GET['itemmod'] === 'OK') {

	} elseif ($_GET['acate'] === 'OK') {
		$sql = sprintf("INSERT INTO Item_category (`ic_item`, `ic_cate`)
		VALUES ('%s', '%s')", $_SESSION['item'], $_GET['categories']);
		if (mysqli_real_query($link, $sql)) {
			$acat = "Category Added\n";
		} else {
			$acat = "Error\n";
		}
	} elseif ($_GET['rcate'] === 'OK') {

	}
?>
<html>
	<body>
		<p>Modify Item</p>
		<form method="get" action="item_modify.php">

			<input type="submit" name="itemmod" value ="OK" />
		</form>
		<p>Add Category</p>
		<form method="get" action="item_modify.php">
			<select name="categories">
				<?php
					$query = "SELECT * FROM Categories";
					$result = mysqli_query($link, $query);
					while ($row = mysqli_fetch_assoc($result)){
						echo "<option value=\"".$row['cate_id']."\">".$row['cate_name']."</option>";
					}
				?>
			</select>
			<input type="submit" name="acate" value ="OK" />
		</form>
		<p>Remove Category</p>
			<select name="categories">
				<?php
					$query = sprintf("SELECT * FROM Item_category
						WHERE `ic_item`= '%s'", $_SESSION['item']);
					$result = mysqli_query($link, $query);
					while ($row = mysqli_fetch_assoc($result)){
						echo "<option value=\"".$row['ic_cate']."\">".$row['ic_cate']."</option>";
					}
				?>
			</select>
		<form method="get" action="item_modify.php">
			<input type="submit" name="rcate" value ="OK" />
		</form>
		<a href="<?php echo "item_delete.php?items=".$_GET['items']?>">DELETE ITEM</a>
		<br />
		<a href="admin_portal.php">Back</a>
	</body>
</html>
