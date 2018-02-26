<?php
	session_start();
	require 'db_init.php';
	function create() {
		global $link;
		$query = sprintf("SELECT * FROM Categories WHERE `cate_name`='%s'",
					$_POST['newname']);
		if (!mysqli_num_rows(mysqli_query($link, $query))) {
			$sql = sprintf("INSERT INTO Categories (`cate_name`)
					VALUES ('%s')", $_POST['newname']);
			if (mysqli_real_query($link, $sql)) {
				header('Location: category_mod.php');
			}
		}
	}

	function cate_list($str) {
		global $link;
		$command = "SELECT * FROM Categories";
		$category_query = mysqli_query($link, $command);
		if (!empty($category_query)) {
			while ($row = mysqli_fetch_array($category_query)) {
				printf($str, $row['cate_id'], $row['cate_name']);
			}
		}
	}
	if(isset($_POST['add'])) {
		create();
	}
?>
