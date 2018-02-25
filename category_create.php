<?php
	function category_create($category) {
		require 'db_init.php';
		$cat = mysqli_real_escape_string($link, $category);
		$query = sprintf("SELECT * FROM Categories WHERE `cate_name`='%s'",
					$cat);
		if (!mysqli_num_rows(mysqli_query($link, $query))) {
			$sql = sprintf("INSERT INTO Categories (`cate_name`)
					VALUES ('%s')", $cat);
			if (mysqli_real_query($link, $sql)) {
				return ("Category Added\n");
			} else {
				return ("Error\n");
			}
		} else {
			return ("Category Exists\n");
		}
	}
?>
