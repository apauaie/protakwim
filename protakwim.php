<?php 	
 session_start();
 require_once("config/config.php");
 $workingfolder="administrator/production/";


 $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


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
									   $timeprayerdisplay=$result2[0]['timeprayerdisplay'];
							   $lokasigambarlatar= $result2[0]['lokasigambarlatar'];
							   $lokasigambarsolat= $result2[0]['lokasigambarsolat'];
								

	$query ="SELECT  * FROM solat_zone where code='$zonKawasan' ";
	
								$stmt2 = $DBH->prepare($query);
								$query = $stmt2->execute();
								$solatzone = $stmt2->fetchAll();		                    
								$negeri= $solatzone[0]['negeri'];
								$code= $solatzone[0]['code'];
								$kawasan= $solatzone[0]['kawasan'];
	
	$query2 ="SELECT  * FROM ceramah_list where status='active'";
	
								$stmt2 = $DBH->prepare($query2);
								$query2 = $stmt2->execute();
								$ceramah = $stmt2->fetchAll();
								
  if(isset($_POST['simpan'])){
	  $zonKawasan = htmlspecialchars($_POST['zon']);
	  $pesanan = htmlspecialchars($_POST['pesanan']);
  
  }
  
	$tday=date('Y-m-d');		                    
  require 'api.php';
	date_default_timezone_set('Asia/Kuala_Lumpur');
  $DateTime= new DateTime($tday);
  $todayhijrah= $hijridate;
  $tarikhhariini= date_format($DateTime,"d F Y");
  $currenttime =  date('g:i:s a');
  $currenttime=strtotime($currenttime);
  
  
  // // Testing Code
  // $subuh="10:27 pm";
  // $dsubuh= date('g:i:s a',strtotime($subuh));
  // $locksubuh=  date('g:i:s a',strtotime($subuh)-$lockazan);
  // $waktuAzan = array("subuh"=>"$subuh", "syuruk"=>"$syuruk", "zohor"=>"$zohor", "asar"=>"$asar", "maghrib"=>"$maghrib", "isyak"=>"$isyak");
  // //end Testing Code
  
  $lesubuh=strtotime('+10 minutes',strtotime($dsubuh));
  $lelocksubuh=strtotime($locksubuh);
	
  $lezohor=strtotime('+10 minutes',strtotime($dzohor));
  $lelockzohor=strtotime($lockzohor);
  
  $leasar=strtotime('+10 minutes',strtotime($dasar));
  $lelockasar=strtotime($lockasar);
  
  $lemaghrib=strtotime('+10 minutes',strtotime($dmaghrib));
  $lelockmaghrib=strtotime($lockmaghrib);
  
  $leisyak=strtotime('+10 minutes',strtotime($disyak));
  $lelockisyak=strtotime($lockisyak);

	?>
  
  <script>
  function setlongTO() {

	setTimeout(function() {
	  window.location.href = "../../flipdown";
	}, 1800000); //30 minutes = 1800000
  }

  function setshortTO() {

	setTimeout(function() {
	  window.location.href = "../../flipdown";
	}, <?php  echo $timeprayerdisplay * 1000; ?> ); //1 minute 
  }
  </script>
<?php 
		
	if (
	(($currenttime>$lelocksubuh) && ($currenttime<$lesubuh))
	||
	(($currenttime>$lelocksyuruk) && ($currenttime<$lesyuruk))
	||
	(($currenttime>$lelockzohor) && ($currenttime<$lezohor))
	||
	(($currenttime>$lelockasar) && ($currenttime<$leasar))
	||
	(($currenttime>$lelockmaghrib) && ($currenttime<$lemaghrib))
	||
	(($currenttime>$lelockisyak) && ($currenttime<$leisyak))
	)
	{
		echo '<script>setlongTO();</script>';
		$test=".";
	}else {
		$test= "";
		echo '<script>setshortTO();</script>';
		}
	
	?>
