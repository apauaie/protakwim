<?php
		require_once('../../config/config.php');


 $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     $q=$_REQUEST["q"]; 
$searchTerm= $_GET['term'];
    
    	$query2 ="SELECT  DISTINCT lokasi FROM ceramah_list WHERE  lokasi LIKE '%$searchTerm%' ";
	
			                    $stmt2 = $DBH->prepare($query2);
			                    $query2 = $stmt2->execute();
			                    $ceramah = $stmt2->fetchAll();
			                    
			                    
			                    


    echo json_encode($ceramah);
?>