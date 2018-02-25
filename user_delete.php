<?php
	session_start();
	require 'user_hash.php';
	require 'db_init.php';
	if ($_GET['submit'] == 'DELETE' && $_GET['passwd'] && $_SESSION['user_id']) {
		$query = sprintf("SELECT *
				FROM Users WHERE `user_id`='%d'", $_SESSION['user_id']);
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		if ($row['user_passwd'] === get_hash($_GET['passwd'])) {
			$delete = sprintf("DELETE FROM Users WHERE `user_id` = '%d'",
						$_SESSION['user_id']);
			if (mysqli_real_query($link, $delete)) {
				echo "Success\n";
				$_SESSION['user_id'] = 0;
			} else {
				echo "Failed\n";
			}
		} else {
			echo "Incorrect Password\n";
		}
	} else {
		echo "Error\n";
	}
	
?>
