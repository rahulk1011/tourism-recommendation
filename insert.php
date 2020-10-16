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
					$insert = new Database_Conn();
					
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
					
					$query1 = $insert->UserInfo($Name, $Email, $Facebook, $Place1, $Place1F, $Place2, $Place2F, $Place3, $Place3F);
					
					$query2 = $insert->PlaceRating($Email, $Place1, $Place1R, $Place2, $Place2R, $Place3, $Place3R);
					
					$query3 = $insert->UserPref($Email, $Hill, $Sea, $Religious, $Island, $Desert, $Street, $Forest, $Heritage, $Name);
					
					if ($query1)
					{
						echo "<h3 align='center'>Information Inserted Successfully</h3>";
					}
					else
					{
						echo "<h3 align='center' align='center'>Information Not Inserted</h3>";
					}
					if ($query2)
					{
						echo "<h3 align='center'>Place Rating Data Inserted Successfully</h3>";
					}
					else
					{
						echo "<h3 align='center'>Place Rating Data Not Inserted</h3>";
					}
					if ($query3)
					{
						echo "<h3 align='center'>User Preference Inserted Successfully</h3>";
					}
					else
					{
						echo "<h3 align='center'>User Preference Not Inserted</h3>";
					}
					
					$count = $insert->UserCount();
					$cres = mysqli_fetch_array($count);
					echo "<h3 align='center'>Total Number of User Entries: ".$cres[0]."</h3>";
					header ("refresh:5; url=index.html");
				?>
			</div>
		</div>
	</body>
</html>