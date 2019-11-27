<?php

function BuildTable($conn, $table_name) {
	$attr_query = "SHOW columns FROM " . $table_name;
	$attr_result = $conn->query($attr_query);	
	$data_query = "SELECT * FROM " . $table_name;	
	$data_result = $conn->query($data_query);	

	$attr_names = array();

	if ($data_result->num_rows > 0) {
		echo "<tr>";
			while($row = $attr_result->fetch_assoc()) {
				echo "<th>". $row["Field"] . "</th>";
				array_push($attr_names, $row["Field"]);
			}
		echo "</tr>";
			while($row = $data_result->fetch_assoc()) {
				echo "<tr>";
				foreach($attr_names as $name) {
					echo "<td>" . $row[$name] . "</td>";
				}
				echo "</tr>";
			}
	} else {
		echo "Book Table Empty<br>";
	}	
}

?>
