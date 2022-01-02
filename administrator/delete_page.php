<?
	

require_once('../config/config.php');

global $DBH;

$id = $_POST['delete_id'];
$query = "UPDATE ceramah_list SET status='inactive' WHERE id='$id'";
			$statement = $DBH->prepare($query);
			$statement->execute(); 
			
			 $ref="yes";
			$query = "UPDATE setting_list SET refresh='$ref' WHERE 1";
			$statement = $DBH->prepare($query);
			$statement->execute();
			
			?>