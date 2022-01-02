<?
	
require_once('../config/config.php');

global $DBH;
$query2 ="SELECT  refresh FROM setting_list";
			                    $stmt2 = $DBH->prepare($query2);
			                    $query2 = $stmt2->execute();
			                    $result2 = $stmt2->fetchAll();
								$refresh=$result2[0]['refresh'];

			           
			           
echo $refresh;

?>