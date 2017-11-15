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
if (isset ($_POST['travelDate']))
{
$travelDate = $_POST['travelDate'];

// Change date Format
//$travelDate = date_format($travelDate, 'dd/mm/yy');

} else {

	echo ("Please choose a travel date.");
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

$result = "";
$start = "";
$end = "";

$result = $mysqli->query("SELECT * FROM t_distances WHERE start='$start' AND end='$end' LIMIT 1");

while($row = $result->fetch_assoc()) {
	$results[] = $row;
	//echo "<table border=1px>";
	//echo "<tr><td>$travelDate </td><td>{$row['start']} to {$row['end']}</td><td>$purpose</td><td>{$row['distance']}</td></tr>\n";
	//echo "</table>";

	$output1="";

	$output1 ="<table border=1px><tr><td>$travelDate </td><td>{$row['start']} to {$row['end']}</td><td>$purpose</td><td>{$row['distance']}</td></tr></table>";

	//echo $output1;

}

$result->close(); // Close DB connection
?>

<!-- <!DOCTYPE html> -->
<html lang="en-US">

<body>
<fieldset>
	<form name="ds" action="<?=$_SERVER['PHP_SELF']?>" method="post">
		<br />

		<input type="date" name="travelDate" id="travelDate"> </input>

		<br />
		<br />

		<!-- Get vaule and pass to PHP via JS -->	

	<div>Start Location:</div>
		<!-- <select name="start" id="start"> -->
		<select name="start" id="start">
			<option value="baes">Bon Air ES (BAES)</option>
			<option value="bbms">Bailey Bridge MS (BBMS)</option>
			<option value="bhs">Bird HS (BHS)</option>
			<option value="bles">Beulah ES (BLES)</option>
			<option value="bses">Bensley ES (BSES)</option>
			<option value="bwes">Bellwood ES (BWES)</option>
			<option value="cvrms">Carver MS (CVRMS)</option>
			<option value="ces">Christian ES (CES)</option>
			<option value="ches">Clover Hill ES (CHES)</option>
			<option value="chhs">Clover Hill HS (CHHS)</option>
			<option value="cchs">Community HS (CCHS)</option>
			<option value="chs">Cosby HS (CHS)</option>
			<option value="cses">Crenshaw ES (CSES)</option>
			<option value="cwes">Crestwood ES (CWES)</option>
			<option value="cyes">Chalkley ES (CYES)</option>
			<option value="hctc">CTC Hull (HCTC)</option>
			<option value="cues">Curtis ES (CUES)</option>
			<option value="des">Davis ES (DES)</option>
			<option value="eces">Ecoff ES (ECES)</option>
			<option value="edms">Elizabeth Davis MS (EDMS)</option>
			<option value="ees">Enon ES (EES)</option>
			<option value="eges">Evergreen ES (EGES)</option>
			<option value="eses">Elizabeth Scott ES (ESES)</option>
			<option value="etes">Ettrick ES (ETES)</option>
			<option value="fces">Falling Creek ES (FCES)</option>
			<option value="fcms">Falling Creek MS (FCMS)</option>
			<option value="fs">Food Services (FS)</option>
			<option value="obes">Gates ES (OBGES)</option>
			<option value="ges">Gordon ES (GES)</option>
			<option value="ghes">Grange Hall ES (GHES)</option>
			<option value="gres">Greenfield ES (GRES)</option>
			<option value="haes">Harrowgate ES (HAES)</option>
			<option value="hes">Hopkins ES (HES)</option>
			<option value="hnes">Hening ES (HNES)</option>
			<option value="jes">Jacobs Road ES (JES)</option>
			<option value="jrhs">James River HS (JRHS)</option>
			<option value="maems">Matoaca MS East Campus (MAEMS)</option>
			<option value="maes">Matoaca ES (MAES)</option>
			<option value="mahs">Matoaca HS (MAHS)</option>
			<option value="mams">Matoaca MS West Campus (MAMS)</option>
			<option value="mbkhs">Meadowbrook HS (MBKHS)</option>
			<option value="mchs">Manchester HS (MCHS)</option>
			<option value="mcms">Manchester MS (MCMS)</option>
			<option value="mdhs">Midlothian HS (MDHS)</option>
			<option value="mdms">Midlothian MS (MDMS)</option>
			<option value="mnhs">Monacan HS (MNHS)</option>
			<option value="padm">Perrymont (PADM)</option>
			<option value="pves">Providence ES (PVES)</option>
			<option value="pvms">Providence MS (PVMS)</option>
			<option value="rbes">Robious ES (RBES)</option>
			<option value="rbms">Robious MS (RBMS)</option>
			<option value="rees">Reams Road ES (REES)</option>
			<option value="sb">School Board (SB)</option>
			<option value="sces">Swift Creek ES (SCES)</option>
			<option value="scms">Swift Creek MS (SCMS)</option>
			<option value="ses">Salem Church ES (SES)</option>
			<option value="sms">Salem Church MS (SMS)</option>
			<option value="ases">Smith ES (ASES)</option>
			<option value="sres">Spring Run (SRES)</option>
			<option value="ctc">Technical Center Courthouse (CTC)</option>
			<option value="tcms">Tomahawk MS (TCMS)</option>
			<option value="tdhs">Thomas Dale HS (TDHS)</option>
			<option value="tdhs9">Thomas Dale HS 9 (TDHS9)</option>
			<option value="wkes">Watkins ES (WKES)</option>
			<option value="wles">Wells ES (WLES)</option>
			<option value="wpes">Winterpock ES (WPES)</option>
			<option value="wres">Woolridge ES (WRES)</option>
			<option value="wves">Weaver ES (WVES)</option>
		</select>

		<br /> 
		<br />

	<div>End Location:</div>
		<select name="end" id="end">
			<option value="baes">Bon Air ES (BAES)</option>
			<option value="bbms">Bailey Bridge MS (BBMS)</option>
			<option value="bhs">Bird HS (BHS)</option>
			<option value="bles">Beulah ES (BLES)</option>
			<option value="bses">Bensley ES (BSES)</option>
			<option value="bwes">Bellwood ES (BWES)</option>
			<option value="cvrms">Carver MS (CVRMS)</option>
			<option value="ces">Christian ES (CES)</option>
			<option value="ches">Clover Hill ES (CHES)</option>
			<option value="chhs">Clover Hill HS (CHHS)</option>
			<option value="cchs">Community HS (CCHS)</option>
			<option value="chs">Cosby HS (CHS)</option>
			<option value="cses">Crenshaw ES (CSES)</option>
			<option value="cwes">Crestwood ES (CWES)</option>
			<option value="cyes">Chalkley ES (CYES)</option>
			<option value="hctc">CTC Hull (HCTC)</option>
			<option value="cues">Curtis ES (CUES)</option>
			<option value="des">Davis ES (DES)</option>
			<option value="eces">Ecoff ES (ECES)</option>
			<option value="edms">Elizabeth Davis MS (EDMS)</option>
			<option value="ees">Enon ES (EES)</option>
			<option value="eges">Evergreen ES (EGES)</option>
			<option value="eses">Elizabeth Scott ES (ESES)</option>
			<option value="etes">Ettrick ES (ETES)</option>
			<option value="fces">Falling Creek ES (FCES)</option>
			<option value="fcms">Falling Creek MS (FCMS)</option>
			<option value="fs">Food Services (FS)</option>
			<option value="obes">Gates ES (OBGES)</option>
			<option value="ges">Gordon ES (GES)</option>
			<option value="ghes">Grange Hall ES (GHES)</option>
			<option value="gres">Greenfield ES (GRES)</option>
			<option value="haes">Harrowgate ES (HAES)</option>
			<option value="hes">Hopkins ES (HES)</option>
			<option value="hnes">Hening ES (HNES)</option>
			<option value="jes">Jacobs Road ES (JES)</option>
			<option value="jrhs">James River HS (JRHS)</option>
			<option value="maems">Matoaca MS East Campus (MAEMS)</option>
			<option value="maes">Matoaca ES (MAES)</option>
			<option value="mahs">Matoaca HS (MAHS)</option>
			<option value="mams">Matoaca MS West Campus (MAMS)</option>
			<option value="mbkhs">Meadowbrook HS (MBKHS)</option>
			<option value="mchs">Manchester HS (MCHS)</option>
			<option value="mcms">Manchester MS (MCMS)</option>
			<option value="mdhs">Midlothian HS (MDHS)</option>
			<option value="mdms">Midlothian MS (MDMS)</option>
			<option value="mnhs">Monacan HS (MNHS)</option>
			<option value="padm">Perrymont (PADM)</option>
			<option value="pves">Providence ES (PVES)</option>
			<option value="pvms">Providence MS (PVMS)</option>
			<option value="rbes">Robious ES (RBES)</option>
			<option value="rbms">Robious MS (RBMS)</option>
			<option value="rees">Reams Road ES (REES)</option>
			<option value="sb">School Board (SB)</option>
			<option value="sces">Swift Creek ES (SCES)</option>
			<option value="scms">Swift Creek MS (SCMS)</option>
			<option value="ses">Salem Church ES (SES)</option>
			<option value="sms">Salem Church MS (SMS)</option>
			<option value="ases">Smith ES (ASES)</option>
			<option value="sres">Spring Run (SRES)</option>
			<option value="ctc">Technical Center Courthouse (CTC)</option>
			<option value="tcms">Tomahawk MS (TCMS)</option>
			<option value="tdhs">Thomas Dale HS (TDHS)</option>
			<option value="tdhs9">Thomas Dale HS 9 (TDHS9)</option>
			<option value="wkes">Watkins ES (WKES)</option>
			<option value="wles">Wells ES (WLES)</option>
			<option value="wpes">Winterpock ES (WPES)</option>
			<option value="wres">Woolridge ES (WRES)</option>
			<option value="wves">Weaver ES (WVES)</option>
		</select>
		
		<br />
		<br />
		
		<div>Business Purpose:</div>
		<select name="purpose" id="purpose">
			<option value="Service Call">Service Call</option>
			<option value="Meeting">Meeting</option>
			<option value="Item Exchange">Item Exchange</option>
		</select>
		

		<br />
		<br />
		<input type="submit" name="submit"></input>
</fieldset>	
<br />	

	<fieldset>
			<br />
			<br />
			<div name="toscreen" id="toscreen"></div>

			<br />
			<br />
			<button>Copy</button>
	</fieldset>

		<script>
		var js_var = "<?php echo $output1 ?>";
		document.getElementById('toscreen').innerHTML += js_var;
		
	 	</script>

	<button onclick="myFunction()">Try it</button>

		<script>
		function myFunction() {
		    var x = document.createElement("P");
		    var t = document.createTextNode("This is a paragraph.");
		    x.appendChild(t);
		    document.body.appendChild(x);
		}
		</script>

</form>


</body>
</html>