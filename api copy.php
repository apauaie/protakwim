<?php
    date_default_timezone_set('Asia/Kuala_Lumpur');
	require_once("config/config.php");

    //$zon = "kdh03";
/*
    $myfile = fopen("./text/zon.txt", "r") or die("Unable to open file!");
    $zon = fread($myfile,filesize("./text/zon.txt"));
*/
    
 $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query2 ="SELECT  * FROM setting_list";
			                    $stmt2 = $DBH->prepare($query2);
			                    $query2 = $stmt2->execute();
			                    $result2 = $stmt2->fetchAll();
			             
			                    	$zon=$result2[0]['zone'];
			                    	$refresh=$result2[0]['refresh'];
			                    	$iqomahperiod=$result2[0]['iqomahperiod'];
			                         $timebeforeazan=$result2[0]['timebeforeazan'];
			                         $scrollspeed=$result2[0]['scrollspeed'];
									 $masjidname=$result2[0]['namamasjid'];
									 $refresh=$result2[0]['refresh'];

/*
    $url = file_get_contents('http://api.azanpro.com/times/today.json?zone='.$zon.'&format=12-hour');

    $json = json_decode($url, true);


    $time = $json[prayer_times];
    $location = $json[locations];

    #echo "Waktu Subuh:".($time['subuh']);

    $kawasan = '';

    foreach($location as $x){
        $kawasan = $kawasan.$x.", ";
    }
	//add second to ensure only ran once
    $imsak = $time[imsak];
    $subuh = $time[subuh];
    $zohor = $time[zohor];
    $asar = $time[asar];
    $maghrib = $time[maghrib];
    $isyak = $time[isyak];
*/

$query = "SELECT kawasan from solat_zone WHERE code='$zon'";
			$statement = $DBH->prepare($query);
			$statement->execute(); 
			$setting = $statement->fetchALL();
			$location= $setting[0]['kawasan'];
			
    	$tday=date('d-m-Y');		                    
	$query2 ="SELECT  * FROM waktusolat where date='$tday'";
	
			                    $stmt2 = $DBH->prepare($query2);
			                    $query2 = $stmt2->execute();
			                    $solatdata = $stmt2->fetchAll();
			                    $datestamp=$solatdata[0]['datestamp'];
									$imsak= $solatdata[0]['imsak'];
/*

$subuh= $solatdata[0]['subuh'];
									  $zohor= $solatdata[0]['zohor'];
									  $syuruk= $solatdata[0]['syuruk'];
									  $asar= $solatdata[0]['asar'];
									  $maghrib= $solatdata[0]['maghrib'];
									  $isyak= $solatdata[0]['isyak'];
									  
*/
									  
									  $subuh= $solatdata[0]['subuh'];
									  $zohor= $solatdata[0]['zohor'];
									  $syuruk= $solatdata[0]['syuruk'];
									  $asar= $solatdata[0]['asar'];
									  $maghrib= $solatdata[0]['maghrib'];
									  $isyak= $solatdata[0]['isyak'];
									  $timetoazan= $timebeforeazan/1000;
    
//           $isyak="6:33:30 pm";
    
    
    $dimsak=  date('g:i:s a',strtotime($imsak));
    $dsubuh=  date('g:i:s a',strtotime($subuh));
    $dzohor=  date('g:i:s a',strtotime($zohor));
    $dasar=  date('g:i:s a',strtotime($asar));
    $dmaghrib=  date('g:i:s a',strtotime($maghrib));
    $disyak=  date('g:i:s a',strtotime($isyak));
    
    $bimsak=  date('g:i:s a',strtotime($imsak)-$timetoazan);
    $bsubuh=  date('g:i:s a',strtotime($subuh)-$timetoazan);
    $bzohor=  date('g:i:s a',strtotime($zohor)-$timetoazan);
    $basar=  date('g:i:s a',strtotime($asar)-$timetoazan);
    $bmaghrib=  date('g:i:s a',strtotime($maghrib)-$timetoazan);
    $bisyak=  date('g:i:s a',strtotime($isyak)-$timetoazan);
    


    $waktuAzan = array("subuh"=>"$subuh", "syuruk"=>"$syuruk", "zohor"=>"$zohor", "asar"=>"$asar", "maghrib"=>"$maghrib", "isyak"=>"$isyak");
?>