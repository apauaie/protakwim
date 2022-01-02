<?
	
require_once('../config/config.php');

global $DBH;
			$ref="no";
			$query = "UPDATE setting_list SET refresh='$ref' WHERE 1";
			$statement = $DBH->prepare($query);
			$statement->execute();
		
			      

?>