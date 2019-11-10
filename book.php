<?php
include 'db_connection.php';

$conn = OpenCon();

$query = "SELECT * FROM book;";
$result = $conn->query($query);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo "BookID: " . $row["BookID"] . " Title: " . $row["Title"];
		echo " Author: " . $row["Author"] . " Quantity: " . $row["Quantity"];
		echo " SupplierID: " . $row["SupplierID"] . " SubjectID: " . $row["SubjectID"] . "<br>";
	}
} else {
	echo "0 results";
}

CloseCon($conn);

?>
