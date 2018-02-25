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
				if ($row['user_passwd'] === get_hash($_POST['password'])) {
					$_SESSION['user_id'] = $row['user_id'];
					header("Location: index.php");
					exit();
				}
			}
		}
	}

	function create() {
		global $link;
		$uname = mysqli_real_escape_string($link, $_POST['username']);
		$query = sprintf("SELECT `user_uname`
						FROM Users WHERE `user_uname`='%s'", $uname);
		if (!mysqli_num_rows(mysqli_query($link, $query))) {
			$sql = sprintf("INSERT INTO Users
							(`user_uname`, `user_fname`, `user_lname`, `user_passwd`)
							VALUES ('%s', '%s', '%s', '%s')",
							$uname, mysqli_real_escape_string($link, $_POST['fname']),
							mysqli_real_escape_string($link, $_POST['lname']),
							get_hash($_POST['password']));
			if (mysqli_real_query($link, $sql)) {
				header("Location: login.php");
				exit();
			}
		}
	}

	if ($_POST['submit'] == 'Login') {
		auth();
		header("Location: login.php");
	} else if ($_POST['submit'] == 'Sign Up') {
		create();
		header("Location: signup.php");
	}
?>
