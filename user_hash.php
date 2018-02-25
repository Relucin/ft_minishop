<?php
	function get_hash($passwd) {
		$salt = hash('md5', $passwd);
		$hpwd = hash ('whirlpool', $passwd.$salt);
		return ($hpwd);
	}
?>
