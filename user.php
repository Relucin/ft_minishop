<?php
	session_start();
	require 'db_init.php';
	function get_hash($passwd) {
		return (hash ('whirlpool', $passwd));
	}

	function auth() {
		global $link;
		$query = sprintf("SELECT * FROM Users WHERE `user_uname`='%s'",
				mysqli_real_escape_string($link, $_POST['username']));
		if ($result = mysqli_query($link, $query)){
			if ($row = mysqli_fetch_assoc($result)) {
				echo
				if ($row['user_passwd'] === get_hash($_POST['password'])) {
					$_SESSION['user_id'] = $row['user_id'];
					header("Location: index.php");
				}
			}
		}
	}

	if ($_POST['submit'] == 'Login') {
		auth();
	}
	// header("Location: login.php");
?>
