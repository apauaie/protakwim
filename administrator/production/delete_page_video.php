<?php 
	

	require_once('../../config/config.php');


 $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['delete_id'];
$query = "UPDATE ceramah_list_video SET status='inactive' WHERE id='$id'";
			$statement = $DBH->prepare($query);
			$statement->execute(); 
			
			 $ref="yes";
			$query = "UPDATE setting_list SET refresh='$ref' WHERE 1";
			$statement = $DBH->prepare($query);
			$statement->execute();
			
			?>