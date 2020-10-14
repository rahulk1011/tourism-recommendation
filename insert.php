<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

<div id="container">

<div id="body">

<?php

$Name = $_POST['name'];
$Email = $_POST['email'];
$Facebook = $_POST['facebook'];
$Place1 = $_POST['place1'];
$Place1F = $_POST['place1f'];
$Place1R = $_POST['place1r'];
$Place2 = $_POST['place2'];
$Place2F = $_POST['place2f'];
$Place2R = $_POST['place2r'];
$Place3 = $_POST['place3'];
$Place3F = $_POST['place3f'];
$Place3R = $_POST['place3r'];
$Hill = $_POST['hil'];
$Sea = $_POST['sea'];
$Religious = $_POST['rel'];
$Island = $_POST['isl'];
$Desert = $_POST['des'];
$Street = $_POST['str'];
$Forest = $_POST['fnp'];
$Heritage = $_POST['her'];

$con = mysql_connect("localhost", "root", "");
if($con>0)
mysql_select_db("project6");


$q1 = "INSERT INTO userinfo VALUES ('$Name', '$Email', '$Facebook', '$Place1', '$Place1F', '$Place2', '$Place2F', '$Place3', '$Place3F')";
$r1 = mysql_query($q1);

$q2 = "INSERT INTO placerating VALUES ('$Email', '$Place1', '$Place1R', '$Place2', '$Place2R', '$Place3', '$Place3R')";
$r2 = mysql_query($q2);

$q3 = "INSERT INTO userpref VALUES ('$Email', '$Hill', '$Sea', '$Religious', '$Island', '$Desert', '$Street', '$Forest', '$Heritage', '$Name')";
$r3 = mysql_query($q3);

if ($r1>0)
{
	echo "<h3 align='center'>Information Inserted Successfully</h3>";
}
else
{
	echo "<h3 align='center' align='center'>Information Not Inserted</h3>";
}

if ($r2>0)
{
	echo "<h3 align='center'>Place Rating Data Inserted Successfully</h3>";
}
else
{
	echo "<h3 align='center'>Place Rating Data Not Inserted</h3>";
}

if ($r3>0)
{
	echo "<h3 align='center'>User Preference Inserted Successfully</h3>";
}
else
{
	echo "<h3 align='center'>User Preference Not Inserted</h3>";
}

$count = mysql_query("SELECT COUNT(*) FROM userpref");
$cres = mysql_fetch_array($count);
echo "<h3 align='center'>Total Number of User Entries: ".$cres[0]."</h3>";

mysql_close();

header ("refresh:5; url=index.html");

?>

</div>
</div>

</body>
</html>