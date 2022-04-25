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
									 $solatperiod=$result2[0]['solatperiod'];


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
                             $hijridate=$solatdata[0]['hijridate'];
			                    $datestamp=$solatdata[0]['datestamp'];
									$imsak= $solatdata[0]['imsak'];

									  $subuh= $solatdata[0]['subuh'];
									  $zohor= $solatdata[0]['zohor'];
									  $syuruk= $solatdata[0]['syuruk'];
									  $asar= $solatdata[0]['asar'];
									  $maghrib= $solatdata[0]['maghrib'];
									  $isyak= $solatdata[0]['isyak'];
									  $timetoazan= $timebeforeazan/1000;
 									  $lockazan= 600000/1000; 
   //$subuh="1:57 pm";
    // $zohor="2:39 pm";
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
    

	$lockimsak=  date('g:i:s a',strtotime($imsak)-$lockazan);
    $locksubuh=  date('g:i:s a',strtotime($subuh)-$lockazan);
    $lockzohor=  date('g:i:s a',strtotime($zohor)-$lockazan);
    $lockasar=  date('g:i:s a',strtotime($asar)-$lockazan);
    $lockmaghrib=  date('g:i:s a',strtotime($maghrib)-$lockazan);
    $lockisyak=  date('g:i:s a',strtotime($isyak)-$lockazan);
    
    $subuh=str_replace ("am"," ",$subuh);
	$syuruk=str_replace ("am"," ",$syuruk);
    $zuhur=str_replace ("am"," ",$zohor);
    $asar=str_replace ("am"," ",$asar);
    $maghrib=str_replace ("am"," ",$maghrib);
    $isyak=str_replace ("am"," ",$isyak);
    $syuruk=str_replace ("pm"," ",$syuruk);
    $zohor=str_replace ("pm"," ",$zohor);
    $asar=str_replace ("pm"," ",$asar);
    $maghrib=str_replace ("pm"," ",$maghrib);
    $isyak=str_replace ("pm"," ",$isyak);


    // $waktuAzan = array("subuh"=>"$subuh", "zohor"=>"$zohor", "asar"=>"$asar", "maghrib"=>"$maghrib", "isyak"=>"$isyak");

    $waktuAzan = array("subuh"=>"$subuh", "syuruk"=>"$syuruk", "zohor"=>"$zohor", "asar"=>"$asar", "maghrib"=>"$maghrib", "isyak"=>"$isyak");
?>
