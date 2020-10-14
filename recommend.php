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

$con = mysql_connect("localhost", "root", "");
if($con>0)
mysql_select_db("project6");

$qr1 = mysql_query("SELECT * FROM userpref WHERE email = '$Email'");
$arr = array();

if ($qr1 > 0)
{
	while ($row = mysql_fetch_array($qr1))
	{
		$arr[] = array($row['Hill'], $row['Sea'], $row['Religious'], $row['Island'], $row['Desert'], $row['Street'], $row['Forest'], $row['Heritage'], $row['Name']."<br>");
		$vhil = $row['Hill'];
		$vsea = $row['Sea'];
		$vrel = $row['Religious'];
		$visl = $row['Island'];
		$vdes = $row['Desert'];
		$vstr = $row['Street'];
		$vfor = $row['Forest'];
		$vher = $row['Heritage'];

		if($vhil > 3)
		{
			$qs1 = mysql_query("SELECT name FROM places WHERE category = 'Hill'");
			$na1 = array();

			echo "<h4 align='center'>You may like to visit these Hill Stations:</h4>";
			while ($row = mysql_fetch_array($qs1))
			{
				$qshil = $row['name'];
				echo "<center>".$qshil."</center>";
			}
		}
		
		if ($vsea > 3)
		{
			$qs2 = mysql_query("SELECT name FROM places WHERE category = 'Sea'");
			$na2 = array();

			echo "<h4 align='center'>You may like to visit these Sea Beaches:</h4>";
			while ($row = mysql_fetch_array($qs2))
			{
				$qssea = $row['name'];
				echo "<center>".$qssea."</center>";
			}
		}

		if ($vrel > 3)
		{
			$qs3 = mysql_query("SELECT name FROM places WHERE category = 'Religious'");
			$na3 = array();

			echo "<h4 align='center'>You may like to visit these Religious Places:</h4>";
			while ($row = mysql_fetch_array($qs3))
			{
				$qsrel = $row['name'];
				echo "<center>".$qsrel."</center>";
			}
		}

		if ($visl > 3)
		{
			$qs4 = mysql_query("SELECT name FROM places WHERE category = 'Island'");
			$na4 = array();

			echo "<h4 align='center'>You may like to visit these Islands:</h4>";
			while ($row = mysql_fetch_array($qs4))
			{
				$qsisl = $row['name'];
				echo "<center>".$qsisl."</center>";
			}
		}

		if ($vdes > 3)
		{
			$qs5 = mysql_query("SELECT name FROM places WHERE category = 'Desert'");
			$na5 = array();

			echo "<h4 align='center'>You may like to visit these Desert places:</h4>";
			while ($row = mysql_fetch_array($qs5))
			{
				$qsdes = $row['name'];
				echo "<center>".$qsdes."</center>";
			}
		}

		if ($vstr > 3)
		{
			$qs7 = mysql_query("SELECT name FROM places WHERE category = 'Street'");
			$na7 = array();

			echo "<h4 align='center'>You may like to visit these Street Traveling places:</h4>";
			while ($row = mysql_fetch_array($qs7))
			{
				$qsstr = $row['name'];
				echo "<center>".$qsstr."</center>";
			}
		}

		if ($vfor > 3)
		{
			$qs8 = mysql_query("SELECT name FROM places WHERE category = 'Forest'");
			$na8 = array();

			echo "<h4 align='center'>You may like to visit these Forests & National Parks:</h4>";
			while ($row = mysql_fetch_array($qs8))
			{
				$qsfor = $row['name'];
				echo "<center>".$qsfor."</center>";
			}
		}

		if ($vher > 3)
		{
			$qs9 = mysql_query("SELECT name FROM places WHERE category = 'Heritage'");
			$na9 = array();

			echo "<h4 align='center'>You may like to visit these Heritage Sites & Historical Monuments:</h4>";
			while ($row = mysql_fetch_array($qs9))
			{
				$qsher = $row['name'];
				echo "<center>".$qsher."</center>";
			}
		}
	}
}

?>

</div>
</div>

</body>
</html>