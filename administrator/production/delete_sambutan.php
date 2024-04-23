<?php 
	

require_once('../../config/config.php');


 $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['del_id'];
$query = "UPDATE sambutan_hari SET statusx='inactive' WHERE id='$id'";
			$statement = $DBH->prepare($query);
			$statement->execute(); 
			header("Location:tetapan_tarikh_penting.php");
			
			?>