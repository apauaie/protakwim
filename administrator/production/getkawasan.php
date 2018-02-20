<?
	
require_once('../../config/config.php');


 $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$negeri = $_GET['negeri'];
$query = "SELECT code,kawasan from solat_zone WHERE negeri='$negeri'";
			$statement = $DBH->prepare($query);
			$statement->execute(); 
			$setting = $statement->fetchALL();
			
			
			echo json_encode($setting);

			?>