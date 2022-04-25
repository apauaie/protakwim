<?php 
	session_start();
	

/*

	if(empty($_SESSION['admin_username'])){
		header('Location: ../index.php');
		exit;
	} 
*/
	require_once("config/config.php");



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
									 $timeperimage=$result2[0]['time_per_image'];
									 
									 
	$query ="SELECT  * FROM solat_zone where code='$zonKawasan' ";
	
								$stmt2 = $DBH->prepare($query);
								$query = $stmt2->execute();
								$solatzone = $stmt2->fetchAll();		                    
								$negeri= $solatzone[0]['negeri'];
								$code= $solatzone[0]['code'];
								$kawasan= $solatzone[0]['kawasan'];
	
	
	$countfirst=0;
	$totalc=0;
	
	function getDuration($file){
	   $dur = shell_exec("ffmpeg -i \"".$file."\" 2>&1");
	   // echo $dur;
	   if(preg_match("/: Invalid /", $dur)){
		  return false;
	   }
	   preg_match("/Duration: (.{2}):(.{2}):(.{2})/", $dur, $duration);
	   if(!isset($duration[1])){
		  return false;
	   }
	   $hours = $duration[1];
	   $minutes = $duration[2];
	   $seconds = $duration[3];
	   return $seconds + ($minutes*60) + ($hours*60*60);
	}
	
	
	
	
	$query2 ="SELECT  * FROM ceramah_list_video where status='active' order by id DESC";
	
								$stmt2 = $DBH->prepare($query2);
								$query2 = $stmt2->execute();
								$ceramah = $stmt2->fetchAll();
								foreach ($ceramah as $row){
									$senarai_ceramah[]=$row['poster'];
									$file='/var/www/html/administrator/production/uploads/'.$row['poster'];
										
									 $totalc+=getDuration($file);
									 
								}
							
								if ($totalc==0) header("Location:index.php");
								$js_array = json_encode($senarai_ceramah);
								echo "<script>var senarai_ceramah = ". $js_array . ";\n</script>";
								
								
								
								
								 
								 
	$query2 ="SELECT  count(*) as totalc FROM ceramah_list_video where status='active'";
	
								$stmt2 = $DBH->prepare($query2);
								$query2 = $stmt2->execute();
								$tot = $stmt2->fetchAll();
							   
								// $totalc= $tot[0]['totalc'];
							 
	// $timeperimage= 10000;						    		                    
	$tday=date('Y-m-d');		                    
	
	
	
	require 'api.php';
		//require_once 'time.php';
	date_default_timezone_set('Asia/Kuala_Lumpur');
	
	
	$DateTime= new DateTime($tday);

	$currenttime =  date('g:i:s a');
	
	$currenttime=strtotime($currenttime);
	// strtotime($subuh);
		// $test+=$lesubuh;
	   // $r=$lesubuh;

		
		$lesubuh=strtotime('+1 minutes',strtotime($dsubuh));
		//$lezohor=strtotime($zohor);
		$lelocksubuh=strtotime($locksubuh);
		
		$lezohor=strtotime('+1 minutes',strtotime($dzohor));
		//$lezohor=strtotime($zohor);
		$lelockzohor=strtotime($lockzohor);
		
		$leasar=strtotime('+1 minutes',strtotime($dasar));
		//$leasar=strtotime($asar);
		$lelockasar=strtotime($lockasar);
		
		$lemaghrib=strtotime('+1 minutes',strtotime($dmaghrib));
		
	   // $lemaghrib=strtotime($maghrib);
		$lelockmaghrib=strtotime($lockmaghrib);
		
		$leisyak=strtotime('+1 minutes',strtotime($disyak));
	   // $leisyak=strtotime($isyak);
		$lelockisyak=strtotime($lockisyak);
	 //$l=" ".$lezohor;
	   // $r=" ".$lelockzohor;
		
		
		
		
		

		

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title>Video Carousel Protakwim</title>
	<!-- Font Awesome -->

	<!-- MDB -->
	<link rel="stylesheet" href="plugin/mdb/css/mdb.min.css" />
	<!-- Custom styles -->
	<!-- <link rel="stylesheet" href="plugin/mdb/css/style.css" /> -->
	<link rel="stylesheet" href="css/transition.css" />

</head>
<body>
	<!--Main Navigation-->
<header>
  <style>
	video {
	  width: 100%;
	  height: 100%;
	  object-fit: cover;
	  position: absolute;
	  top: 0;
	  left: 0;
	}

	  
	 
  </style>

  

  <video muted  playsinline  poster="" id="backgroundvid"> 
  <source  src="<?php echo "administrator/production/uploads/".$senarai_ceramah[0];?>" type='video/mp4; codecs="avc1.4D401E, mp4a.40.2"'>
  <p>Fallback content to cover incompatibility issues</p>
  </video>
	
	
	
	  
	  
	<!-- MDB -->
		<script src="js/jquery-3.6.0.min.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="plugin/mdb/js/mdb.min.js"></script>
	<!-- Custom scripts -->
	<!-- <script type="text/javascript" src="plugin/mdb/js/script.js"></script> -->
		
		<script type=text/javascript>
			var count=1;
			
			var v = document.getElementById('backgroundvid');
			v.play();
			v.addEventListener('ended', function () { 
				console.log('ended'); 
					// console.log(senarai_ceramah[count++]);
					var url=encodeURI("administrator/production/uploads/"+senarai_ceramah[count++])
					console.log(url);
					v.src=url;
					v.play();
			},false);
			
		
			
			$(document).ready(function() { 
				
			var timout= <?php echo $totalc*1000;?>;
			   // alert(timout);
				setTimeout(function () {
			   window.location.href = "index.php"; //will redirect to your blog page (an ex: blog.html)
			},timout ); //will call the function after finish video minutes.
			
			setInterval(checktime, 10000);
			
		
			})
		
			function formatAMPM(date) {
			  var hours = date.getHours();
			  var minutes = date.getMinutes();
			  var ampm = hours >= 12 ? 'pm' : 'am';
			  hours = hours % 12;
			  hours = hours ? hours : 12; // the hour '0' should be '12'
			  minutes = minutes < 10 ? '0'+ minutes : minutes;
			  var strTime = hours + ':' + minutes 
			  return strTime;
			}
			
			function isInRange(value, range) {
			  return value >= range[0] && value <= range[1];
			}
			
			
			function checktime()
			{
				var current = new Date();
				
				var currentt= formatAMPM(current);
				console.log(currentt);
				
				// console.log(<?php echo $lesubuh;?>);
				
				var lelocksubuh=new Date(<?php echo $lelocksubuh;?>*1000);
				
				var lesubuh=new Date(<?php echo $lesubuh;?>*1000);
				var lelockzohor=new Date(<?php echo $lelockzohor;?>*1000);
				var lezohor=new Date(<?php echo $lezohor;?>*1000);
				var lelockasar=new Date(<?php echo $lelockasar;?>*1000);
				var leasar=new Date(<?php echo $leasar;?>*1000);
				var lelockmaghrib=new Date(<?php echo $lelockmaghrib;?>*1000);
				var lemaghrib=new Date(<?php echo $lemaghrib;?>*1000);
				var lelockisyak=new Date(<?php echo $lelockisyak;?>*1000);
				var leisyak=new Date(<?php echo $leisyak;?>*1000);
				console.log(lelockzohor);
				console.log(lezohor);
				var range=[formatAMPM(lelocksubuh),formatAMPM(lesubuh)];
				if (isInRange(currentt, range))
				{
					console.log("inSubuhRage");
					window.location.href = "index.php"; //will redirect to your blog page (an ex: blog.html)
		
				}
				
				
				var range=[formatAMPM(lelockzohor),formatAMPM(lezohor)];
				if (isInRange(currentt, range))
				{
					console.log("inZohorRage");
					window.location.href = "index.php"; //will redirect to your blog page (an ex: blog.html)
		
				}
				
				
				var range=[formatAMPM(lelockasar),formatAMPM(leasar)];
				if (isInRange(currentt, range))
				{
					console.log("inAsarRage");
					window.location.href = "index.php"; //will redirect to your blog page (an ex: blog.html)
		
				}
				var range=[formatAMPM(lelockmaghrib),formatAMPM(lemaghrib)];
				if (isInRange(currentt, range))
				{
					console.log("inMaghribRage");
					window.location.href = "index.php"; //will redirect to your blog page (an ex: blog.html)
		
				}
				var range=[formatAMPM(lelockisyak),formatAMPM(leisyak)];
				if (isInRange(currentt, range))
				{
					console.log("inIsyakRage");
					window.location.href = "index.php"; //will redirect to your blog page (an ex: blog.html)
		
				}
			}
		
		
		
			
		
		
			</script>

</body>
</html>

