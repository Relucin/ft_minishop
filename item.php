<?php
	session_start();
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

	function cate_list_item($str, $id) {
		global $link;
		$command = sprintf("SELECT * FROM Item_category"
						. " JOIN Categories ON ic_cate=Categories.cate_id"
						. " WHERE ic_item='%d'", $id);
		$category_query = mysqli_query($link, $command);
		if (!empty($category_query)) {
			while ($row = mysqli_fetch_array($category_query)) {
				printf($str, $row['ic_cate'], $row['cate_name']);
			}
		}
	}

	function add_item_cat()
	{
		global $link;
		$query = sprintf("INSERT INTO Item_category(`ic_item`,`ic_cate`)"
						. " VALUES('%d', '%d')",
						$_POST['item_menu_add_cat'],
						$_POST['cate_menu']);
		mysqli_real_query($link, $query);
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
		global $link;
		$item = mysqli_real_escape_string($link, $_POST['newname']);
		$des = mysqli_real_escape_string($link, $_POST['description']);
		$query = sprintf("UPDATE Items SET item_name='%s',
			item_url='%s' WHERE item_id='%d'",
				$item, $des, $_POST['item_menu_modify']);
		mysqli_real_query($link, $query);
	}

	function item_create() {
		global $link;
		if ($_POST['name']){
			$item = mysqli_real_escape_string($link, $_POST['name']);
			$query = sprintf("SELECT * FROM Items WHERE `item_name`='%s'",
						$item);
			$eurl = mysqli_real_escape_string($link, $_POST['description']);
			$sql = sprintf("INSERT INTO Items (`item_name`, `item_count`, `item_url`, `item_price`)
					VALUES ('%s', '%d', '%s', '%d')",
					$item, 1, $eurl, $_POST['price']);
			if (mysqli_real_query($link, $sql)) {
				header('Location: article_mod.php');
				exit();
			}
				//TODO Session variable to return result..
		}
	}

	if(isset($_POST['add_art'])) {
		item_create();
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
