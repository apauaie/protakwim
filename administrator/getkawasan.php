<?
	
require_once('../config/config.php');

global $DBH;
$negeri = $_GET['negeri'];
$query = "SELECT code,kawasan from solat_zone WHERE negeri='$negeri'";
			$statement = $DBH->prepare($query);
			$statement->execute(); 
			$setting = $statement->fetchALL();
			
			
			echo json_encode($setting);

			?>