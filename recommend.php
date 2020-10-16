<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
		<div id="container">
			<div id="body">
				<?php
					include('config/config.php');
					$recommend = new Database_Conn();
					
					$Name = $_POST['name'];
					$Email = $_POST['email'];
					
					$qr1 = $recommend->RecommendOne($Email);
					$arr = array();
					if ($qr1)
					{
						while ($row = mysqli_fetch_array($qr1))
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
								$qs1 = $recommend->RecommendHill();
								$na1 = array();
								echo "<h4 align='center'>You may like to visit these Hill Stations:</h4>";
								while ($row = mysqli_fetch_array($qs1))
								{
									$qshil = $row['name'];
									echo "<center>".$qshil."</center>";
								}
							}
							if ($vsea > 3)
							{
								$qs2 = $recommend->RecommendSea();
								$na2 = array();
								echo "<h4 align='center'>You may like to visit these Sea Beaches:</h4>";
								while ($row = mysqli_fetch_array($qs2))
								{
									$qssea = $row['name'];
									echo "<center>".$qssea."</center>";
								}
							}
							if ($vrel > 3)
							{
								$qs3 = $recommend->RecommendReligious();
								$na3 = array();
								echo "<h4 align='center'>You may like to visit these Religious Places:</h4>";
								while ($row = mysqli_fetch_array($qs3))
								{
									$qsrel = $row['name'];
									echo "<center>".$qsrel."</center>";
								}
							}
							if ($visl > 3)
							{
								$qs4 = $recommend->RecommendIsland();
								$na4 = array();
								echo "<h4 align='center'>You may like to visit these Islands:</h4>";
								while ($row = mysqli_fetch_array($qs4))
								{
									$qsisl = $row['name'];
									echo "<center>".$qsisl."</center>";
								}
							}
							if ($vdes > 3)
							{
								$qs5 = $recommend->RecommendDesert();
								$na5 = array();
								echo "<h4 align='center'>You may like to visit these Desert places:</h4>";
								while ($row = mysqli_fetch_array($qs5))
								{
									$qsdes = $row['name'];
									echo "<center>".$qsdes."</center>";
								}
							}
							if ($vstr > 3)
							{
								$qs6 = $recommend->RecommendStreet();
								$na6 = array();
								echo "<h4 align='center'>You may like to visit these Street Traveling places:</h4>";
								while ($row = mysqli_fetch_array($qs6))
								{
									$qsstr = $row['name'];
									echo "<center>".$qsstr."</center>";
								}
							}
							if ($vfor > 3)
							{
								$qs7 = $recommend->RecommendForest();
								$na7 = array();
								echo "<h4 align='center'>You may like to visit these Forests & National Parks:</h4>";
								while ($row = mysqli_fetch_array($qs7))
								{
									$qsfor = $row['name'];
									echo "<center>".$qsfor."</center>";
								}
							}
							if ($vher > 3)
							{
								$qs8 = $recommend->RecommendHeritage();
								$na8 = array();
								echo "<h4 align='center'>You may like to visit these Heritage Sites & Historical Monuments:</h4>";
								while ($row = mysqli_fetch_array($qs8))
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