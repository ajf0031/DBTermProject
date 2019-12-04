<?php

function buildTabs($conn) {
	$table_query = "SHOW TABLES;";
	$db_tables = $conn->query($table_query); 
	$names = array();
	while($row = $db_tables->fetch_array()) {
		array_push($names, $row[0]);
	}
	echo "<div class=\"tab\">";
		foreach ($names as $name) {
			echo "<button class=\"tablinks\" onclick=\"openTab(event, '" . $name . "')\" id=\"" . $name . "Button" . "\">" . $name . "</button>";
		}
	echo "</div>";

	foreach ($names as $name) {
		echo "<div id=\"" . $name . "\" class=\"tabcontent\">";
		echo "\t<table class=\"table table-bordered table-striped\">";

		$data_query = "SELECT * FROM " . $name . ";";	
		$data_result = $conn->query($data_query);	
		echo buildTableFromResult($data_result);

		echo "\t</table>";
		echo "</div>";
	}
}

function buildTableFromResult($result) {
	$fields = $result->fetch_fields();
	echo "<table class=\"table table-bordered table-striped\">";
		echo "<thead class=\"thead-light\">";
		echo "<tr>";
			foreach($fields as $field) {
				echo "<th>" . $field->name . "</th>";
			}
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				foreach($fields as $field) {
					echo "<td>" . $row[$field->name] . "</td>";
				}
				echo "</tr>";
			}
		echo "</tbody>";
	echo "</table>";
}

?>
