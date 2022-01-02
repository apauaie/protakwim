<?php
require_once('../config/config.php');

global $DBH;
//     $q=$_REQUEST["q"]; 
$searchTerm= $_GET['term'];
    
    	$query2 ="SELECT  DISTINCT lokasi FROM ceramah_list WHERE  lokasi LIKE '%$searchTerm%' ";
	
			                    $stmt2 = $DBH->prepare($query2);
			                    $query2 = $stmt2->execute();
			                    $ceramah = $stmt2->fetchAll();
			                    
			                    
			                    


    echo json_encode($ceramah);
?>