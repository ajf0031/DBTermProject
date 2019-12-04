<?php
include 'db_connection.php';
include 'table_builder.php';

$conn = OpenCon();

$query = NULL;
$result = NULL;
$error = NULL;

if(isset($_POST["query"])) {
	$query = stripslashes(trim($_POST["query"]));
	if(strcasecmp('drop', substr($query,0,4))==0) {
		$error = "'DROP' Statements not allowed";	
	} elseif(!$result = $conn->query($query)) {
		$error = $conn->error;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Online Bookstore</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
body {font-family: Arial;}

.column {
	float: left;
	width: 45%;
}

.space {
	float: left;
	width: 10%;
}
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
</head>

<body>
<div class="container-fluid">
	<h1>Bookstore Database</h1>
</div>

<div class="row">
	<div class="col">
		<h2>Database</h2>
		<div class="tab">
		  <button class="tablinks" onclick="openTab(event, 'Book','BookButton')" id="BookButton">Book</button>
		  <button class="tablinks" onclick="openTab(event, 'Customer','CustomerButton')"id="CustomerButton">Customer</button>
		  <button class="tablinks" onclick="openTab(event, 'Employee','EmployeeButton')"id="EmployeeButton">Employee</button>
		  <button class="tablinks" onclick="openTab(event, 'Order Details','OrderDetailsButton')"id="OrderDetailsButton">Order Details</button>
		  <button class="tablinks" onclick="openTab(event, 'Orders','OrdersButton')"id="OrdersButton">Orders</button>
		  <button class="tablinks" onclick="openTab(event, 'Shipper','ShipperButton')"id="ShipperButton">Shipper</button>
		  <button class="tablinks" onclick="openTab(event, 'Subject','SubjectButton')"id="SubjectButton">Subject</button>
		  <button class="tablinks" onclick="openTab(event, 'Supplier','SupplierButton')"id="SupplierButton">Supplier</button>
		</div>
		
		<div id="Book" class="tabcontent">
			<table class="table table-bordered table-striped">
				<?php
					BuildTable($conn, "book");
				?>
			</table>
		</div>

		<div id="Customer" class="tabcontent">
			<table class="table table-bordered table-striped">
				<?php
					BuildTable($conn, "customer");
				?>
			</table>
		</div>

		<div id="Employee" class="tabcontent">
			<table class="table table-bordered table-striped">
				<?php
					BuildTable($conn, "employee");
				?>
			</table>
		</div>

		<div id="Order Details" class="tabcontent">
			<table class="table table-bordered table-striped">
				<?php
					BuildTable($conn, "order_details");
				?>
			</table>
		</div>

		<div id="Orders" class="tabcontent">
			<table class="table table-bordered table-striped">
				<?php
					BuildTable($conn, "orders");
				?>
			</table>
		</div>

		<div id="Shipper" class="tabcontent">
			<table class="table table-bordered table-striped">
				<?php
					BuildTable($conn, "shipper");
				?>
			</table>
		</div>

		<div id="Subject" class="tabcontent">
			<table class="table table-bordered table-striped">
				<?php
					BuildTable($conn, "subject");
				?>
			</table>
		</div>

		<div id="Supplier" class="tabcontent">
			<table class="table table-bordered table-striped">
				<?php
					BuildTable($conn, "supplier");
				?>
			</table>
		</div>
	</div>
	<div class="col">
		<h2>Query</h2>
		<form action="indexbootstrap.php" method="post">
			<textarea name="query" rows="15" style="width:80%;" placeholder="Query..."></textarea>
			<input type="hidden" name= "tabState" id="tabState" value=<?php
				if (isset($_POST["tabState"])) {
					echo $_POST["tabState"];
				} else {
					echo "BookButton";
				}
			?>>
			<br>
			<input type="submit">
		</form>
		<?php
			if(!is_null($error)) {
				echo "<div class=\"alert alert-danger\"><p class=\"text-danger\">" . $error . "</p></div>";
			} elseif($result != null) {
				echo "<div class=\"alert alert-success\"><p class=\"text-success\">Successful query!</p></div>";
				if ($result instanceof mysqli_result) {
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
			} 
		?>
	</div>
</div>

<script>
function openTab(evt, tabName, id) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
	  tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
	  tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(tabName).style.display = "block";
	evt.currentTarget.className += " active";
	
	document.getElementById("tabState").value = id;
}

document.getElementById(document.getElementById("tabState").value).click();

</script>
   
</body>
</html> 

<?php
	CloseCon($conn);
?>

