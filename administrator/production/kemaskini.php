<?php 
  include ('../password_protect.php');
  

  require_once('../../config/config.php');

	include("resize-class.php");

 $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$ref="yes";
	  $query = "UPDATE setting_list SET refresh='$ref' WHERE 1";
	  $statement = $DBH->prepare($query);
	  $statement->execute();
	  
	//require_once 'time.php';
  date_default_timezone_set('Asia/Kuala_Lumpur');

  $tahunnow=date('Y');
  $tarikhmula= "01-01-".$tahunnow;
  $tarikhtamat= "31-12-".$tahunnow;
  
  $firstdate=strtotime($tarikhmula);
  $lastdate=strtotime($tarikhtamat);
  $datediff =$lastdate- $firstdate ;

  $totaldays= floor($datediff / (60 * 60 * 24));

  $query2 ="SELECT  * FROM setting_list ";
  
						  $stmt2 = $DBH->prepare($query2);
						  $query2 = $stmt2->execute();
						  $setting = $stmt2->fetchAll();
						  $zone= $setting[0]['zone'];
						  $pesanan= $setting[0]['pesanan'];
						  
  $query ="SELECT  * FROM solat_zone where code='$zone' ";
  
						  $stmt2 = $DBH->prepare($query);
						  $query = $stmt2->execute();
						  $solatzone = $stmt2->fetchAll();		                    
						  $negeri= $solatzone[0]['negeri'];
						  $code= $solatzone[0]['code'];
						  $kawasan= $solatzone[0]['kawasan'];
						  

  $query ="select * from waktusolat order by date_updated  limit 1";

	$stmt2 = $DBH->prepare($query);
	$query = $stmt2->execute();
	$waktusol=$stmt2->fetchAll();
	$lastupdated= $waktusol[0]['date_updated'];
 
  $query ="SELECT  DISTINCT negeri FROM solat_zone  ";
  
						  $stmt2 = $DBH->prepare($query);
						  $query = $stmt2->execute();
						  $allnegeri = $stmt2->fetchAll();
						  $neg=$allnegeri[0]['negeri'];
						  
  $query ="SELECT  DISTINCT kawasan,code FROM solat_zone where negeri='$negeri' ";
  
						  $stmt2 = $DBH->prepare($query);
						  $query = $stmt2->execute();
						  $allkawasan = $stmt2->fetchAll();	
  

		
		
		$zonex=$_POST['kawasan'];
		$pesananx=$_POST['pesanan'];
		
		
 

		if ($_GET['status']=="update"){$_POST['kemaskini']="update";}else {}
		
		
		if (isset($_POST['kemaskinifile'])) {
  
		
		if(isset($_FILES['filesUpdate'])){
			$errors= array();
			$file_name = $_FILES['filesUpdate']['name'];
			$file_size =$_FILES['filesUpdate']['size'];
			$file_tmp =$_FILES['filesUpdate']['tmp_name'];
			$file_type=$_FILES['filesUpdate']['type'];
			$file_ext=strtolower(end(explode('.',$_FILES['filesUpdate']['name'])));
			
			$expensions= array("json");
			
			if(in_array($file_ext,$expensions)=== false){
			   $errors[]="extension tidak dibenarkan. Sila gunakan fail JSON";
			}
			
		
			
			if(empty($errors)==true){
			   move_uploaded_file($file_tmp,"uploads/".$file_name);
			  
			  $query ="truncate table waktusolat";
				$stmt2 = $DBH->prepare($query);
				$query = $stmt2->execute();

			  
			  $jsondata = file_get_contents('uploads/'.$file_name);
			  $array = json_decode($jsondata);
			  foreach ($array as $line)	{
	 
				$datenow=$line->date;
				$datestamp=$line->datestamp;
				$imsak= $line->imsak;
				$subuh= $line->subuh;
				$zohor= $line->zohor;
				$syuruk= $line->syuruk;
				$asar= $line->asar;
				$maghrib= $line->maghrib;
				$isyak= $line->isyak;
				
				$queryx ="INSERT INTO waktusolat(date, datestamp, imsak, subuh, syuruk, zohor, asar, maghrib,isyak) VALUES (:date, :datestamp, :imsak, :subuh, :syuruk, :zohor, :asar, :maghrib ,:isyak)";                 
				$statement = $DBH->prepare($queryx);
				$statement->bindParam(':date', $datenow);
				$statement->bindParam(':datestamp', $datestamp);
				$statement->bindParam(':imsak', $imsak);
				$statement->bindParam(':subuh', $subuh);
				$statement->bindParam(':syuruk', $syuruk);
				$statement->bindParam(':zohor', $zohor);
				$statement->bindParam(':asar', $asar);
				$statement->bindParam(':maghrib', $maghrib);
				$statement->bindParam(':isyak', $isyak);
				$statement->execute();
				
				
			  }
		
		
		$ref="yes";
		$query = "UPDATE setting_list SET refresh='$ref' WHERE 1";
		$statement = $DBH->prepare($query);
		$statement->execute();
		
		echo "<script>alert('Waktu Solat telah dikemaskini');</script>";
		
		   
			   
			}else{
			  // echo "<script>alert('Error Uploading');</script>";
			  
				foreach($errors as $error)
				  {
					
					echo "<script>alert('".$error."');</script>";
					
				  }
			}
		 }
	   }
 
   
   function myStrtotime($date_string)
   {
	  $convertDate = array('jan'=>'jan','feb'=>'feb','mac'=>'march','apr'=>'apr','mei'=>'may','jun'=>'jun','jul'=>'jul','ogos'=>'aug','sep'=>'sep','okt'=>'oct','nov'=>'nov','dis'=> 'dec');
	  return strtotime(strtr(strtolower($date_string), $convertDate));
   }
   
   function getDurationDate($month, $year)
   {
	 $month = str_pad($month,2,'0',STR_PAD_LEFT);
	 $startdate = $year.'-'.$month.'-'.'01';
	 $enddate = $year.'-'.$month.'-'.date("t", strtotime(date("F", mktime(0, 0, 0, $month, 10))));
   
	 return array(
	   'start' => $startdate,
	   'end' => $enddate
	 );
   }
   
   // Function to convert the time
   function convertTime($time)
   {
	   // replace separator
	   $time = str_replace(".", ":", $time);
	   // convert 24h to 12h
	   $newtime = date('g:i', strtotime($time));
	   // include a.m. or p.m. prefix
	   $newtime .= explode(':', $time)[0] <= 12 ? ' am' : ' pm';
   
	   return $newtime;
   }
   
   
		   
		if (isset($_POST['kemaskini']))   {

 
			  
		  
			$query ="truncate table waktusolat";
  
						  $stmt2 = $DBH->prepare($query);
						  $query = $stmt2->execute();
		  
		  
						  
		  // for($i=0; $i<=$totaldays; $i++) {//3 -$totaldays
		  //   
		  //   $percent=$i/$totaldays*100;
		  //   
echo "<script>updateprogress($percent);</script>";
  
// $currentday = date('d-m-Y',strtotime($tarikhmula."+".$i." days"));
// $currentday = date('Y-m-d',strtotime($tarikhmula."+".$i." days"));

		  
  $url = "https://www.e-solat.gov.my/index.php?r=esolatApi/takwimsolat&period=duration&zone=".$code;
  
	  # data for POST request
		 $postdata = http_build_query(
		  array(
			  'datestart' => date('Y')."-01-01",
			  'dateend' => date('Y')."-12-31",
		  )
	  );
	  
	  # cURL also have more options and customizable
	  $ch = curl_init(); # initialize curl object
	  curl_setopt($ch, CURLOPT_URL, $url); # set url
	  curl_setopt($ch, CURLOPT_POST, 1); # set option for POST data
	  curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata); # set post data array
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); # receive server response
	  $result = curl_exec($ch); # execute curl, fetch webpage content
	  $httpstatus = curl_getinfo($ch, CURLINFO_HTTP_CODE); # receive http response status
	  curl_close($ch);  # close curl
  
	  $arrData = array();
	  $arrData['data'] = array();
	  $arrData['httpstatus'] = $httpstatus;
	  $waktusolat = json_decode($result, true);
	  
	  if(count($waktusolat['prayerTime']) > 0) {
		foreach ($waktusolat['prayerTime'] as $waktu) {
		  $arrData['data'][] = array(
			'hijri' => $waktu['hijri'],
			'date' => date("d-m-Y", myStrtotime($waktu['date'])),
			'day' => $waktu['day'],
			'imsak' => convertTime($waktu['imsak']),
			'subuh' => convertTime($waktu['fajr']),
			'syuruk' => convertTime($waktu['syuruk']),
			'zohor' => convertTime($waktu['dhuhr']),
			'asar' => convertTime($waktu['asr']),
			'maghrib' => convertTime($waktu['maghrib']),
			'isyak' => convertTime($waktu['isha']),
		  );
		  
		  
		  
		  $datenow=date("d-m-Y", myStrtotime($waktu['date']));
		  $hijridate=$waktu['hijri'];
		  $date=date("d-m-Y", myStrtotime($waktu['date']));
		  $datestamp=strtotime(date("d-m-Y", myStrtotime($waktu['date'])));
		  $imsak= convertTime($waktu['imsak']);
		  $subuh= convertTime($waktu['fajr']);
		  $zohor= convertTime($waktu['dhuhr']);
		  $syuruk= convertTime($waktu['syuruk']);
		  $asar= convertTime($waktu['asr']);
		  $maghrib= convertTime($waktu['maghrib']);
		  $isyak= convertTime($waktu['isha']);
					 
		   
		   $hijriyear=substr($hijridate,0,4);
		   $hijrimonth=substr($hijridate,5,2);
		   $hijriday=substr($hijridate,8,2);
		   
		   if ($hijrimonth=='01') $hijribulan= "Muharram";
		   else if ($hijrimonth=='02') $hijribulan= "Safar";
		   else if ($hijrimonth=='03') $hijribulan= "Rabiulawal";
		   else if ($hijrimonth=='04') $hijribulan= "Rabiulakhir";
		   else if ($hijrimonth=='05') $hijribulan= "Jamadilawal";
		   else if ($hijrimonth=='06') $hijribulan= "Jamadilakhir";
		   else if ($hijrimonth=='07') $hijribulan= "Rejab";
		   else if ($hijrimonth=='08') $hijribulan= "Syaaban";
		   else if ($hijrimonth=='09') $hijribulan= "Ramadan";
		   else if ($hijrimonth=='10') $hijribulan= "Syawal";
		   else if ($hijrimonth=='11') $hijribulan= "Zulkaedah";
		   else if ($hijrimonth=='12') $hijribulan= "Zulhijjah";
		   
		   $hijridate=$hijriday."-".$hijribulan."-".$hijriyear;
		   
		   $queryx ="INSERT INTO waktusolat(date,hijridate, datestamp, imsak, subuh, syuruk, zohor, asar, maghrib,isyak) VALUES (:date,:hijridate, :datestamp, :imsak, :subuh, :syuruk, :zohor, :asar, :maghrib ,:isyak)";
		   
		   $zohor=str_replace ("am","pm",$zohor);                         
		   $statement = $DBH->prepare($queryx);
		   $statement->bindParam(':date', $datenow);
		   $statement->bindParam(':hijridate', $hijridate);
		   $statement->bindParam(':datestamp', $datestamp);
		   $statement->bindParam(':imsak', $imsak);
		   $statement->bindParam(':subuh', $subuh);
		   $statement->bindParam(':syuruk', $syuruk);
		   $statement->bindParam(':zohor', $zohor);
		   $statement->bindParam(':asar', $asar);
		   $statement->bindParam(':maghrib', $maghrib);
		   $statement->bindParam(':isyak', $isyak);
		   $statement->execute();   
		   
		   
		  
		  
		}
	  }      
	  echo $i;
	  
	  
		  
		  
		  
		  
//           
// $jsonrequest= "http://api.azanpro.com/times/date.json?zone=".$code."&start=".$currentday."&format=12-hour";
//  
// $datasolat = file_get_contents($jsonrequest); // put the contents of the file into a variable
// 
// 
// 				  $azandata=json_decode($datasolat,true);
// 				  $datenow=$azandata['prayer_times'][0]['date'];
//    			  $datestamp=$azandata['prayer_times'][0]['datestamp'];
// 				  $imsak= $azandata['prayer_times'][0]['imsak'];
// 				  $subuh= $azandata['prayer_times'][0]['subuh'];
// 				  $zohor= $azandata['prayer_times'][0]['zohor'];
// 				  $syuruk= $azandata['prayer_times'][0]['syuruk'];
// 				  $asar= $azandata['prayer_times'][0]['asar'];
// 				  $maghrib= $azandata['prayer_times'][0]['maghrib'];
// 				  $isyak= $azandata['prayer_times'][0]['isyak'];
// 				  
// 
// 
// $queryx ="INSERT INTO waktusolat(date, datestamp, imsak, subuh, syuruk, zohor, asar, maghrib,isyak) VALUES (:date, :datestamp, :imsak, :subuh, :syuruk, :zohor, :asar, :maghrib ,:isyak)";
// 			              
// $statement = $DBH->prepare($queryx);
// $statement->bindParam(':date', $datenow);
// $statement->bindParam(':datestamp', $datestamp);
// $statement->bindParam(':imsak', $imsak);
// $statement->bindParam(':subuh', $subuh);
// $statement->bindParam(':syuruk', $syuruk);
// $statement->bindParam(':zohor', $zohor);
// $statement->bindParam(':asar', $asar);
// $statement->bindParam(':maghrib', $maghrib);
// $statement->bindParam(':isyak', $isyak);
// $statement->execute();


   
   
   
		$ref="yes";
	  $query = "UPDATE setting_list SET refresh='$ref' WHERE 1";
	  $statement = $DBH->prepare($query);
	  $statement->execute();
	  
	  echo "<script>alert('Waktu Solat telah dikemaskini');</script>";
		}               
?>


<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Kemaskini  </title>

	<!-- Bootstrap -->
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
	<!-- Select2 -->
	<link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
	<!-- Switchery -->
	<link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	<!-- starrr -->
	<link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <?php include ('menu.php')?>
	   

		<!-- page content -->
		<div class="right_col" role="main">
		  <div class="">
			<div class="page-title">
			  <div class="title_left">
				<h3>Kemaskini</h3>
			  </div>

			   </div>
			  

			<div class="clearfix"></div>
			
			<div class="row">
			 
			 
			 
			 
			  <div class="col-md-6 col-xs-12">
				<div class="x_panel">
				  <div class="x_title">
					<h2>Kemaskini Online</h2>
					
					<div class="clearfix"></div>
				  </div>
				  <div class="x_content">
					<br />
					<form id=update method="post" class="form-horizontal form-label-left">
		  <div><?php echo $kawasan.",".$negeri;?><span><?php echo "<br>Kemaskini Terakhir : ".$lastupdated;?></span></div>
	   <!--        
					  
					  
					  <div style="display:none" class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Negeri</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
						  <select  disabled id=negeri name="negeri" class="form-control">
							<option>Sila Pilih</option>
							<?php foreach($allnegeri as $row){?>
							<option value="<?php echo $row['negeri'];?>" <?php if ($row['negeri']==$negeri) echo "selected";?> ><?php echo $row['negeri'];?></option>
							<?php }?>
							
							</select>
						</div>
					  </div>
					  
					   <div style="display:none" class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Kawasan</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
						  <select   disabled id=kawasan name=kawasan class="form-control">
							<option>Sila Pilih</option>
							<?php foreach($allkawasan as $row){?>
							<option value="<?php echo $row['code'];?>" <?php if ($row['kawasan']==$kawasan) echo "selected";?> ><?php echo $row['kawasan'];?></option>
							<?php }?>
						  </select>
						</div>
					  </div>
					  
				   
						<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Masa Sebelum Azan</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
						  <input id="azan" name="azanperiod" type="text" class="form-control" value="" />
						  <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
						</div>
					  </div>
					  
						<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Masa Sebelum Iqomah</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
						  <input id="iqomah" name="iqomahperiod" type="text" class="form-control" value="" />
						  <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
						</div>
					  </div>
-->
					  
											<div class="ln_solid"></div>

					  <div class="progress">
						<div id=progress-bar class="progress-bar progress-bar-striped active" role="progressbar"
						aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
					  
						</div>
					  </div>

					  <div class="ln_solid"></div>
					  <div class="form-group">
						<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
<!--                           <button type="button" class="btn btn-primary">Cancel</button> -->
							<input type=hidden value=1 name=kemaskini></input>
						  <input style="width:100%"  onclick=testconfirm(); class="btn btn-success" value="Kemaskini Online"></input>
						</div>
					  </div>

					</form>
				  </div>
				</div>
			  </div>
			  
			  
			  
			  
							
			  
			  
			  
			  </div>
			  
			  <div class="clearfix"></div>
										
										<div class="row">
										 
										  <div class="col-md-6 col-xs-12">
											<div class="x_panel">
											  <div class="x_title">
												<h2>Kemaskini File</h2>
												
												<div class="clearfix"></div>
											  </div>
											  <div class="x_content">
												<br />
												<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">                                     
												  
																		<div class="form-group">
												  <input required style="width:100%" type="file" name="filesUpdate" ></div>
												  
							
												 
													<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
													   <input type=hidden value=1 name=kemaskinifile></input>
													  <input style="width:100%" type="submit"  class="btn btn-success" value="Muatnaik dan Kemaskini."></input>
													</div>
												  </div>
							
												</form>
											  </div>
											</div>
										  </div>
			  
			  
			  
			  
			  
			</div>
		  </div>

					 <!-- /page content -->

		<!-- footer content -->
		<footer>
		  <div class="pull-right">
			ProTakwim <a href="">Takwim Solat</a>
		  </div>
		  <div class="clearfix"></div>
		</footer>
		<!-- /footer content -->
	  </div>
	</div>

	<!-- jQuery -->
	<script src="../vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="../vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="../vendors/nprogress/nprogress.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="../vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="../vendors/moment/min/moment.min.js"></script>
	<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="../vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="../vendors/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="../vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="../vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="../vendors/starrr/dist/starrr.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="../build/js/custom.js"></script>
	
	<script type="text/javascript"> 
	  function updateprogress(value){
		var valuer='100%';
	$('.progress-bar').css('width', valuer);
  
	  }
  </script>
	
	
	
  <script type="text/javascript">
	$(function () {
	$(document).on("change", "#negeri", function () {
		$.ajax({
			url: 'getkawasan.php',
			type: 'GET',
			dataType: 'json',
			data: {negeri: $(this).val()},
			 success: function(data){
			var toAppend = '';
		   $.each(data,function(i,o){
		   toAppend += '<option value='+o.code+'>'+o.kawasan+'</option>';
		  });
	  $('#kawasan').empty();
		 $('#kawasan').append(toAppend);
		}
		
		
		
		})



	});
});

function testconfirm()
{
  
  if (confirm('Adakah anda pasti? Sekiranya anda terus mengemaskini tanpa ada internet, semua waktu solat masjid akan hilang. Sila pastikan anda telah memasang network internet pada unit ProTakwim.')){
   document.getElementById("update").submit();

}else{

}
  
}
  </script>
  </body>
</html>
