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

$first_tab = "db_bookButton";
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
 /* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
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
} </style>

</head>

<body>
<div class="container-fluid">
	<h1>Bookstore Database</h1>
</div>

<div class="row">
	<!--Tab Content-->
	<div class="col">
		<h2>Database</h2>
		<?php buildTabs($conn); ?>
	</div>

	<!--Query Field-->
	<div class="col">
		<h2>Query</h2>
		<form action="index.php" method="post"><?php
			if(isset($query)) {
				echo "<textarea name=\"query\" rows=\"15\" style=\"width:80%;\" placeholder=\"Query...\">" . $query;
			} else {
				echo "<textarea name=\"query\" rows=\"15\" style=\"width:80%;\" placeholder=\"Query...\">";
			}
			?></textarea>
			<input type="hidden" name= "tabState" id="tabState" value=<?php
				if (isset($_POST["tabState"])) {
					echo $_POST["tabState"];
				} else {
					echo $first_tab;
				}
			?>>
			<br>
			<input type="submit" class="btn btn-success">
		</form>
		<?php
			if(!is_null($error)) {
				echo "<div class=\"alert alert-danger\"><p class=\"text-danger\">" . $error . "</p></div>";
			} elseif($result != null) {
				echo "<div class=\"alert alert-success\"><p class=\"text-success\">Successful query!</p></div>";
				if ($result instanceof mysqli_result) {
					buildTableFromResult($result);
				}
			} 
		?>
	</div>
</div>

<script>
function openTab(evt, tabName) {
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
	
	document.getElementById("tabState").value = tabName + "Button";
}

document.getElementById(document.getElementById("tabState").value).click();
console.log(document.getElementById("tabState").value);

</script>
   
</body>
</html> 

<?php
	CloseCon($conn);
?>

