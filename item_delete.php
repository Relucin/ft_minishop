<?php
	session_start();
	unset($_SESSION['item']);
	if (!$_SESSION['user_auth']) {
		header ("Location: index.php");
	}
	require 'db_init.php';
	$delete = sprintf("DELETE FROM Items WHERE
			`item_name` = '%s'", $_GET['items']);
	if (mysqli_real_query($link, $delete)) {
		$ritem = "Removed Item ".$_GET['items']."\n";
	} else {
		$ritem = "Error\n";
	}
	header("Location: admin_portal.php");
?>
