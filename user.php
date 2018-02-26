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
					$_SESSION['user_uname'] = $row['user_uname'];
					$_SESSION['user_lname'] = $row['user_lname'];
					$_SESSION['user_fname'] = $row['user_fname'];
					$_SESSION['user_auth'] = $row['user_auth'];
					header("Location: index.php");
					exit();
				}
			}
		}
	}

	function create_user() {
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

	function add_user()
	{
		global $link;
		$query = sprintf("SELECT * FROM Users WHERE `user_name`='%s'",
					$_POST['name']);
		if (!mysqli_num_rows(mysqli_query($link, $query))) {
			$sql = sprintf("INSERT INTO Users (`user_name`)
					VALUES ('%s')", $_POST['name']);
			if (mysqli_real_query($link, $sql)) {
				header('Location: user_mod.php');
			}
		}
	}

	function modify_user()
	{
		global $link;
		if (!$_POST['newname'])
		{
			header('Location: user_mod.php');
			exit();
		}
		$sql = sprintf("UPDATE Users SET `user_name`='%s' WHERE
			`user_name`='%s'", $_POST['newname']);

		$sql2 = sprintf("UPDATE Users SET `user_passwd`='%s' WHERE
			`user_name`='%s'", get_hash($_POST['password']));
			mysqli_real_query($link, $sql);
			mysqli_real_query($link, $sql2);

	}

	function delete_user()
	{
		global $link;
		$query = sprintf("SELECT * FROM Users WHERE `user_name`='%s'", $_POST['name']);
		if (mysqli_num_rows(mysqli_query($link, $query)) > 0) {
			$sql = sprintf("DELETE FROM Users WHERE `user_name`='%s'",
			$_POST['name']);
			if (mysqli_real_query($link, $sql)) {
				header('Location: user_mod.php');
			}
		}
	}

	if (isset($_POST['submit']) && $_POST['submit'] == 'Login') {
		auth();
		header("Location: login.php");
	}
	else if (isset($_POST['submit']) && $_POST['submit'] == 'Sign Up')
	{
		create_user();
		header("Location: signup.php");
	}
	else if (isset($_POST['add'])){
		add_user();
		header("Location: user_mod.php");
	}
	else if (isset($_POST['modify'])){
		modify_user();
		header("Location: user_mod.php");
	}
	else if (isset($_POST['delete'])){
		delete_user();
		header("Location: user_mod.php");
	}







?>
