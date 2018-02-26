<?php
	session_start();
	require 'db_init.php';

	function create() {
		global $link;
		$item = mysqli_real_escape_string($link, $_POST['name']);
		$query = sprintf("SELECT * FROM Items WHERE `item_name`='%s'",
					$item);
		if (!mysqli_num_rows(mysqli_query($link, $query))) {
			$eurl = mysqli_real_escape_string($link, $_POST['description']);
			$sql = sprintf("INSERT INTO Items (`item_name`, `item_count`, `item_url`)
					VALUES ('%s', '%d', '%s')",
					$item, 1, $eurl);
			if (mysqli_real_query($link, $sql)) {
				header('Location: article_mod.php');
				exit();
			}
			//TODO Session variable to return result..
		}
	}
	if (isset($_POST['delete'])) {
		echo 'Works';
	} else if (isset($_POST['add'])) {
		create();
	}
?>
