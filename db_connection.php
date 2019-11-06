<?php

function OpenCon() {
	$db_host = "acadmysql.duc.auburn.edu";
	$db_user = "ajf0031";
	$db_pass = "database";
	$db = "ajf0031db";

	$conn = new mysqli($db_host, $db_user, $db_pass, $db) or die("Connect failed %s\n" . $conn->error);
	
	return $conn;
}

function CloseCon($conn) {
	$conn->close();
}

?>
