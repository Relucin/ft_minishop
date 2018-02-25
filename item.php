<?php
	session_start();
	require 'db_init.php';
	if (!isset($_SESSION['item_id']) || $_GET['item_id']) {
		if (!$_GET['item_id']) {
			header("Location: index.php");
		} else {
			$iid = mysqli_real_escape_string($link, $_GET['item_id']);
			$_SESSION['iname'] = "DNE";
			$_SESSION['iurl'] = "";
			$_SESSION['icount'] = 0;
			$query = sprintf("SELECT * FROM Items WHERE `item_id`=%d",
						$iid);
			if (mysqli_num_rows($result = mysqli_query($link, $query))) {
				$row = mysqli_fetch_assoc($result);
				$_SESSION['iname'] = $row['item_name'];
				$_SESSION['iurl'] = $row['item_url'];
				$_SESSION['icount'] = $row['item_count'];
			}
		}
	}
?>
<html>
	<body>
		<?php echo $iname;?>
		<br />
		<img src="<?php echo $iurl;?>">
		<br />
		<form method="get" action=
	</body>
</html>
