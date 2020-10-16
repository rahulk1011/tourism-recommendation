<?php

define('servername','localhost');
define('username','root');
define('password' ,'');
define('dbname', 'project6');

class Database_Conn
{
	function __construct()
	{
		$conn = mysqli_connect(servername, username, password, dbname);
		$this->db_conn = $conn;

		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}
	
	function UserInfo($Name, $Email, $Facebook, $Place1, $Place1F, $Place2, $Place2F, $Place3, $Place3F)
	{
		$sql = mysqli_query($this->db_conn, "INSERT INTO userinfo (Name, Email, Facebook, Place1, Place1F, Place2, Place2F, Place3, Place3F) VALUES ('$Name', '$Email', '$Facebook', '$Place1', '$Place1F', '$Place2', '$Place2F', '$Place3', '$Place3F')");
		return $sql;
	}
	
	function PlaceRating($Email, $Place1, $Place1R, $Place2, $Place2R, $Place3, $Place3R)
	{
		$sql = mysqli_query($this->db_conn, "INSERT INTO placerating (Email, Place1, Place1R, Place2, Place2R, Place3, Place3R) VALUES ('$Email', '$Place1', '$Place1R', '$Place2', '$Place2R', '$Place3', '$Place3R')");
		return $sql;
	}
	
	function UserPref($Email, $Hill, $Sea, $Religious, $Island, $Desert, $Street, $Forest, $Heritage, $Name)
	{
		$sql = mysqli_query($this->db_conn, "INSERT INTO userpref (Email, Hill, Sea, Religious, Island, Desert, Street, Forest, Heritage, Name) VALUES ('$Email', '$Hill', '$Sea', '$Religious', '$Island', '$Desert', '$Street', '$Forest', '$Heritage', '$Name')");
		return $sql;
	}
	
	function UserCount()
	{
		$sql = mysqli_query($this->db_conn, "SELECT COUNT(*) FROM userpref");
		return $sql;
	}
	
	function RecommendOne($Email)
	{
		$sql = mysqli_query($this->db_conn, "SELECT * FROM userpref WHERE Email = '$Email'");
		return $sql;
	}
	
	function UserPreference()
	{
		$sql = mysqli_query($this->db_conn, "SELECT * FROM userpref");
		return $sql;
	}
	
	function RecommendHill()
	{
		$sql = mysqli_query($this->db_conn, "SELECT name FROM places WHERE category = 'Hill'");
		return $sql;
	}
	
	function RecommendSea()
	{
		$sql = mysqli_query($this->db_conn, "SELECT name FROM places WHERE category = 'Sea'");
		return $sql;
	}
	
	function RecommendReligious()
	{
		$sql = mysqli_query($this->db_conn, "SELECT name FROM places WHERE category = 'Religious'");
		return $sql;
	}
	
	function RecommendIsland()
	{
		$sql = mysqli_query($this->db_conn, "SELECT name FROM places WHERE category = 'Island'");
		return $sql;
	}
	
	function RecommendDesert()
	{
		$sql = mysqli_query($this->db_conn, "SELECT name FROM places WHERE category = 'Desert'");
		return $sql;
	}
	
	function RecommendStreet()
	{
		$sql = mysqli_query($this->db_conn, "SELECT name FROM places WHERE category = 'Street'");
		return $sql;
	}
	
	function RecommendForest()
	{
		$sql = mysqli_query($this->db_conn, "SELECT name FROM places WHERE category = 'Forest'");
		return $sql;
	}
	
	function RecommendHeritage()
	{
		$sql = mysqli_query($this->db_conn, "SELECT name FROM places WHERE category = 'Heritage'");
		return $sql;
	}
}

?>