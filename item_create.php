<?php
	function item_create($item, $count, $url) {
		require 'db_init.php';
		$eitem = mysqli_real_escape_string($link, $item);
		$query = sprintf("SELECT * FROM Items WHERE `item_name`='%s'",
					$eitem);
		if (!mysqli_num_rows(mysqli_query($link, $query))) {
			$eurl = mysqli_real_escape_string($link, $url);
			$sql = sprintf("INSERT INTO Items (`item_name`, `item_count`, `item_url`)
					VALUES ('%s', '%d', '%s')",
					$eitem, $count, $eurl);
			if (mysqli_real_query($link, $sql)) {
				return ("Item Added\n");
			} else {
				return ("Error\n");
			}
		} else {
			return ("Item Exists\n");
		}
	}
?>
