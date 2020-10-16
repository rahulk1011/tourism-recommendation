<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<title>Results</title>
	</head>
	<body bgcolor="silver">
		<div id="container">
			<div id="body">
				<?php
					include('config/config.php');
					$result = new Database_Conn();
					
					$count = $result->UserCount();
					$cres = mysqli_fetch_array($count);
					
					echo "<h3 align='center'>Total Number of User Entries: ".$cres[0]."</h3>";
					
					echo "<p align='center'><a href='index.html'>Go Back To Home</a></p>";
					
					$q4 = $result->UserPreference();
					$arr1 = array();
					while( $row = mysqli_fetch_assoc( $q4 ) )
					{
						$arr1[] = array($row['Hill'], $row['Sea'], $row['Religious'], $row['Island'], $row['Desert'], $row['Street'], $row['Forest'], $row['Heritage'], $row['Name']."<br>");
					}
					
					$Email = $_POST['semail'];
					$q5 = $result->RecommendOne($Email);
					$arr2 = array();
					while ($row = mysqli_fetch_array($q5))
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
						$vnam = $row['Name'];
					}
					$j = 0;
					$count=1;
					$tab ="<table align='center' border='2' bordercolor='gray' cellpadding='5' cellspacing='0' width ='70%'>";
					for ( $j = 0; $j < $cres[0]-1 ; $j++)
					{
						if ($vnam != substr($arr1[$j][8], 0, -4))
						{
							$x = ($vhil*$arr1[$j][0]) + ($vsea*$arr1[$j][1]) + ($vrel*$arr1[$j][2]) + ($visl*$arr1[$j][3]) + ($vdes*$arr1[$j][4]) + ($vstr*$arr1[$j][5]) + ($vfor*$arr1[$j][6]) + ($vher*$arr1[$j][7]);
							$y = pow($vhil,2) + pow($vsea,2) + pow($vrel,2) + pow($visl,2) + pow($vdes,2) + pow($vstr,2) + pow($vfor,2) + pow($vher,2);
							$z = pow($arr1[$j][0],2) + pow($arr1[$j][1],2) + pow($arr1[$j][2],2) + pow($arr1[$j][3],2) + pow($arr1[$j][4],2) + pow($arr1[$j][5],2) + pow($arr1[$j][6],2) + pow($arr1[$j][7],2);
							$m = ($x / sqrt($y * $z))*100;
							if ($count == 1)
							{
								$max = $m;
								$count += 1;
							}
							else
							{
								if($m > $max)
								{
									$max = $m;
									echo "<center><b>Best similarities with: ".($arr1[$j][8]).round($max,2)."</b><center>";
								}
							}
							$tab = $tab."<tr>";
							$str = $vnam." & ". substr($arr1[$j][8], 0, -4);
							$tab = $tab."<td width='120'>Similarity between ".$str."</td>";
							$tab = $tab."<td align='center' width='50'>".round($m, 2)." %</td>";
							$tab = $tab."</tr>";
						}
					}
					$tab = $tab."</table>";
					echo $tab;
				?>
			</div>
		</div>
	</body>
	
</html>