<?php
	
	
	session_start();
	


	require_once("config/config.php");

	global $DBH;




	$query2 ="SELECT  * FROM setting_list";
    $stmt2 = $DBH->prepare($query2);
    $query2 = $stmt2->execute();
    $result2 = $stmt2->fetchAll();
			             
	$id_tema= $result2[0]['tema_id'];
	$query2 ="SELECT  * FROM tema_list  where id_tema='$id_tema'";
	
	$stmt2 = $DBH->prepare($query2);
	$query2 = $stmt2->execute();
	$result2 = $stmt2->fetchAll();
	$filename= $result2[0]['filename_tema'];
	// echo $filename;
	header("Location: ".$filename);
						
			                    

?>
