<?php
	session_start();
	require 'db_init.php';

	if (isset($_POST['delete'])) {
		echo 'Works';
	}
?>
