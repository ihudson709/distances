<?php
$db_user = 'root';
$db_pass = '';
$db_name = 'distances';
$db_host = 'localhost';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($mysqli->connect_errno) {
printf("Connect failed: %s\n", $mysqli->connect_error);
     exit();
 }

 //Get travel date
//if (isset ($_POST['travelDate']))
if (($_POST['travelDate'])=="")
{
echo ("Please choose a travel date.");
$travelDate = $_POST['travelDate'];

// Change date Format
//$travelDate = date_format($travelDate, 'dd/mm/yy');

} else {

	$travelDate = $_POST['travelDate'];

	//echo ("Please choose a travel date.");
}

// Get "Start" select option value
if (isset ($_POST['start']))
{
$start = $_POST['start'];

} else {

	echo ("Please choose a Start Destnation.");
}

// Get "End" select option value
if (isset ($_POST['end']))
{
$end = $_POST['end'];
} else {

	echo ("Please choose an End Destnation.");
}

// Get "Purpose" select option value
if (isset ($_POST['purpose']))
{
$purpose = $_POST['purpose'];
} else {

	echo ("Please choose a purpose.");
}

// Run and store Query
$result = $mysqli->query("SELECT * FROM t_distances WHERE start='$start' AND end='$end' LIMIT 1");


while($row = $result->fetch_assoc()) {
	$results[] = $row;
	//echo "<table border=1px>";
	//echo "<tr><td>$travelDate </td><td>{$row['start']} to {$row['end']}</td><td>$purpose</td><td>{$row['distance']}</td></tr>\n";
	//echo "</table>";

	//$output1="";

	// Convert $start and $end to Uppercase
	$row['start'] = strtoupper($row['start']);
	$row['end'] = strtoupper($row['end']);

	$output1 ="<table border=1px><tr><td>$travelDate</td><td>{$row['start']} to {$row['end']}</td><td>$purpose</td><td>{$row['distance']}</td></tr></table>";

	echo $output1;

}


$result->close(); // Close DB connection
?>