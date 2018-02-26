<?php
	require 'db_init.php';

	function item_list($str) {
		global $link;
		$command = "SELECT * FROM Items";
		$item_query = mysqli_query($link, $command);
		if (!empty($item_query)) {
			while ($row = mysqli_fetch_array($item_query)) {
				printf($str, $row['item_id'], $row['item_name']);
			}
		}
	}

	function add_item() {
		global $link;
		$query = sprintf("SELECT * FROM Items WHERE `item_name`='%s'", $_POST['addname']);
		if (!mysqli_num_rows(mysqli_query($link, $query))) {
			$sql = sprintf("INSERT INTO Items (`item_name`) VALUES ('%s')", $_POST['addname']);
			if (mysqli_real_query($link, $sql)) {

				$query_id_item = mysqli_query(sprintf("SELECT item_id FROM Items WHERE `item_name`='%s'", $_POST['addname']));
				$query_id_cate = mysqli_query(sprintf("SELECT cate_id FROM Categories WHERE `cate_name`='%s'", $_POST['cate_menu_item']));

				$row_id_item = mysqli_fetch_array($query_id_item);
				$row_id_cate = mysqli_fetch_array($query_id_cate);

				$sql2 = sprintf("INSERT INTO Item_category (`ic_item`, `ic_cate`) VALUES ('%d', '%d')",
				$row_id_item[0], $row_id_cate[0]);

				header('Location: article_mod.php');
			}

		}
	}
    //
    //
	// function create() {
	// 	global $link;
	// 	$query = sprintf("SELECT * FROM Categories WHERE `cate_name`='%s'",
	// 				$_POST['newname']);
	// 	if (!mysqli_num_rows(mysqli_query($link, $query))) {
	// 		$sql = sprintf("INSERT INTO Categories (`cate_name`)
	// 				VALUES ('%s')", $_POST['newname']);
	// 		if (mysqli_real_query($link, $sql)) {
	// 			header('Location: category_mod.php');
	// 		}
	// 	}
	// }

	function add_item_cat()
	{

	}

	function delete_item()
	{
		global $link;
		$sql = sprintf("DELETE FROM Items WHERE `item_id`='%s'",
		$_POST['item_menu_delete']);
		if (mysqli_real_query($link, $sql)) {
			header('Location: article_mod.php');
		}
	}

	function del_item_cat()
	{
		global $link;
		$sql = sprintf("DELETE FROM Item_category WHERE `ic_cate`='%s'",
		$_POST['cate_menu']);
		if (mysqli_real_query($link, $sql)) {
			header('Location: article_mod.php');
		}
	}

	function modify_item()
	{

	}

	// function create() {
	// 	global $link;
	// 	$item = mysqli_real_escape_string($link, $_POST['name']);
	// 	$query = sprintf("SELECT * FROM Items WHERE `item_name`='%s'",
	// 				$item);
	// 	if (!mysqli_num_rows(mysqli_query($link, $query))) {
	// 		$eurl = mysqli_real_escape_string($link, $_POST['description']);
	// 		$sql = sprintf("INSERT INTO Items (`item_name`, `item_count`, `item_url`)
	// 				VALUES ('%s', '%d', '%s')",
	// 				$item, 1, $eurl);
	// 		if (mysqli_real_query($link, $sql)) {
	// 			header('Location: article_mod.php');
	// 			exit();
	// 		}
	// 		//TODO Session variable to return result..
	// 	}
	// }

	if(isset($_POST['add_art'])) {
		add_item();
		header('Location: article_mod.php');
	} else if (isset($_POST['modify'])){
		modify_item();
		header('Location: article_mod.php');
	} else if (isset($_POST['delete'])){
		delete_item();
		header('Location: article_mod.php');
	}
	else if(isset($_POST['add_cat'])){
		add_item_cat();
		header('Location: article_mod.php');

	}
	else if(isset($_POST['del_cat'])){
		del_item_cat();
		header('Location: article_mod.php');

	}


?>
