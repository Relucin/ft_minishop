<?php
	session_start();
	if (!isset($_SESSION['basket']))
		$_SESSION['basket'] = array();

	function add() {
		if (isset($_SESSION['basket'][$_POST['id']])) {
			$_SESSION['basket'][$_POST['id']]['count'] += $_POST['count'];
		} else {
			$_SESSION['basket'][$_POST['id']] = array(
				'name' => $_POST['name'],
				'price' => $_POST['price'],
				'count' => $_POST['count']
			);
		}
		header("Location: index.php");
	}

	if (isset($_POST['addcart'])) {
		add();
	}
?>
