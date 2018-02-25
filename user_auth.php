<?php
	require 'user_hash.php';
	function auth($uname, $passwd) {
		require 'db_init.php';
		$ret = FALSE;
		$query = sprintf("SELECT * FROM Users WHERE `user_uname`='%s'",
				mysqli_real_escape_string($link, $uname));
		if ($result = mysqli_query($link, $query)){
			if ($row = mysqli_fetch_assoc($result)) {
				if ($row['user_passwd'] === get_hash($passwd)) {
					$ret = $row['user_id'];
				}
			}
		}
		
		return ($ret);
	}

	// if ($_GET['submit'] == 'OK'){
	// 	if (auth($_GET['uname'], $_GET['passwd']))
	// 		echo "Success\n";
	// 	else
	// 		echo "Error\n";
	// }
?>
