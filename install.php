<?php
	$server = "192.168.99.100";
	$username = "root";
	$passwd = "root";
	$db = "RUSH";
	$port = "3306";

	$link = mysqli_connect($server, $username, $passwd, $db, $port);
	if (!mysqli_connect_errno()) {
		echo "Success";
	} else {
		die("Connection failed: ".mysqli_connect_error());
	}
	$sql = "CREATE TABLE Items (
		item_id INT NOT NULL AUTO_INCREMENT,
		item_name VARCHAR(255) NOT NULL,
		item_url BLOB NOT NULL,
		item_count INT,
		PRIMARY KEY (item_id));";

	mysqli_query($link, $sql);
	$sql = "CREATE TABLE Categories (
		cate_id INT NOT NULL AUTO_INCREMENT,
		cate_name VARCHAR(255) NOT NULL,
		PRIMARY KEY (cate_id));";

	mysqli_query($link, $sql);
	$sql = "CREATE TABLE Item_category (
		ic_id INT NOT NULL AUTO_INCREMENT,
		ic_item INT,
		ic_cate INT,
		PRIMARY KEY (ic_id),
		FOREIGN KEY (ic_item) REFERENCES Items(item_id),
		FOREIGN KEY (ic_cate) REFERENCES Categories(cate_id));";

	mysqli_query($link, $sql);
	$sql = "CREATE TABLE Users (
		user_id INT NOT NULL AUTO_INCREMENT,
		user_uname VARCHAR(255) NOT NULL,
		user_fname VARCHAR(255) NOT NULL,
		user_lname VARCHAR(255) NOT NULL,
		user_auth INT,
		user_passwd VARBINARY(512) NOT NULL,
		PRIMARY KEY (user_id));";

	mysqli_query($link, $sql);
	$sql = "CREATE TABLE Orders (
		order_id INT NOT NULL AUTO_INCREMENT,
		order_uid INT NOT NULL,
		order_date DATE NOT NULL,
		PRIMARY KEY(order_id));";

	mysqli_query($link, $sql);
	$sql = "CREATE TABLE Order_item (
		oi_id INT NOT NULL AUTO_INCREMENT,
		oi_oid INT,
		oi_iid INT,
		PRIMARY KEY (oi_id),
		FOREIGN KEY (oi_oid) REFERENCES Orders(order_id),
		FOREIGN KEY (oi_iid) REFERENCES Items(item_id));";
	mysqli_query($link, $sql);

?>
