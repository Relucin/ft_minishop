<?php

session_start();

if (isset($_POST['count']) && !is_numeric($_POST['count']) && $_POST['count'] > 0)
{
	// get the price of the item
	if (isset($_SESSION['basket'][$_GET['name']])){
		$_SESSION['basket'][$_GET['name']] += $_POST['count'];
		$_SESSION['basketPrice'] += $_POST['count'] * 1;
	}
	else {
		$_SESSION['basket'][$_GET['name']] = $_POST['count'];
	}
}
else {
	header("Location: index.php");
	exit();
}

?>
