<?
	
require_once('../config/config.php');

global $DBH;
$query2 ="SELECT  * FROM setting_list";
			                    $stmt2 = $DBH->prepare($query2);
			                    $query2 = $stmt2->execute();
			                    $result2 = $stmt2->fetchAll();
			                   $zonKawasan=$result2[0]['zone'];
			                         $pesanan= $result2[0]['pesanan'];
			                         $iqomahperiod=$result2[0]['iqomahperiod'];
			                         $timebeforeazan=$result2[0]['timebeforeazan'];
			                         $scrollspeed=$result2[0]['scrollspeed'];
									 $masjidname=$result2[0]['namamasjid'];
									 $refresh=$result2[0]['refresh'];
			           
if ($_GET['iqomah']=="1") echo $iqomahperiod;
else if ($_GET['azan']=="1") echo $timebeforeazan;

?>