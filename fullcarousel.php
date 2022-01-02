<?
	session_start();
	


	require_once("config/config.php");







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

	$query ="SELECT  * FROM solat_zone where code='$zonKawasan' ";
	
			                    $stmt2 = $DBH->prepare($query);
			                    $query = $stmt2->execute();
			                    $solatzone = $stmt2->fetchAll();		                    
			                    $negeri= $solatzone[0]['negeri'];
			                    $code= $solatzone[0]['code'];
			                    $kawasan= $solatzone[0]['kawasan'];
	
	$query2 ="SELECT  * FROM ceramah_list where status='active' order by id DESC";
	
			                    $stmt2 = $DBH->prepare($query2);
			                    $query2 = $stmt2->execute();
			                    $ceramah = $stmt2->fetchAll();
	$query2 ="SELECT  count(*) as totalc FROM ceramah_list where status='active'";
	
			                    $stmt2 = $DBH->prepare($query2);
			                    $query2 = $stmt2->execute();
			                    $tot = $stmt2->fetchAll();
			                   
			                    $totalc= $tot[0]['totalc'];
			                    		                    
	$tday=date('Y-m-d');		                    
	//echo $totalc;

?>

<!DOCTYPE html>
<html>
<head>
	<title>ProTakwim</title> 
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- 		<link rel="stylesheet" href="css/bootstrap.min.js"> -->
<script type="text/javascript" src="css/bootstrap.min.js"></script>
<!-- 		<link rel="stylesheet" href="css/fade.css"> -->

<style>
	
	body {

    /*background-color: #000; */
    height: 100vh;
}

/* SECTION-1 */
.section1 {
    margin-top: 20px;
}

.slide-img {
    width: 100%;
    height: 100%;
    max-height: 100%;
}

.clock-box {
    height: 400px;
    max-height: 400px;
    padding-top: 20px;
    text-align: center;
    background-color: #222;
}

.time {
    font-size: 80px;
    font-weight: 700;
    background-color: #222;
    color: #F7BC05;
}

.day {
    font-size: 30px;
    font-weight: 500;
/*     color: #148fce; */
	color:white;
}

.kawasan {
    font-size: 20px;
    color: #fff;
    padding-top: 20px;
    padding-left: 10px;
    padding-right: 10px;
}

.btn:hover {
    color: #F7BC05; 
}

/* SECTION-2 */
.waktu-head {
    font-size: 20px;
    font-weight: 700 !important;
    text-align: center;
    text-transform: uppercase;
    color: #fff !important;
    background-color: #666 !important;
}

.waktu-body {
    font-size: 30px;
    font-weight: 700;
    text-align: center;
    background-color: #222;
    color: #148fce;
}

.panel.panel-default {
    opacity: 0.8;
}


/* SECTION-3 */
.section3 {
    text-align: center;
    font-size: 20px;
}





  
  

</style>


    <meta name="viewport" content="width=device-width, initial-scale=1">
        

   
    <script type="text/javascript" src="plugin/countdown/jquery.countdown.js"></script>
            <script type="text/javascript" src="js/myjs.js"></script>
<style>
	
html,body{height:100%;}
.carousel,.item,.active{height:100%;}
.carousel-inner{height:100%;}

</style>

</head>
<body>

<div id="mycarousel" class="carousel slide" data-pause="null" data-ride="carousel">
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
   
   
    <? foreach($ceramah as $row){?>

                     
                                   
                                   <div class="item">
                                        <img class="slide-img" src="<?
	                                        if ($row['poster']!=""){
		                                       echo 'administrator/production/uploads/'.$row['poster'];

	                                        }else {
		                                         echo "img/masjidbackground.png";
	                                        }
	                                        	                                       

	                                        
	                                        
	                                        
	                                        
	                                        ?>"  alt="image">
                                        <div style="  text-shadow:2px 2px 10px white, 1px 1px 10px white;color: black;top:0;" class="carousel-caption">
	                                        
	                                        <?
/*
		                                            setlocale(LC_TIME, "");

		                                        setlocale(LC_TIME, 'en_US');
											$masa_string = utf8_encode(strftime('%I:%M %p', strtotime($row['masa'])));
											
*/
											$ceramahdate= date('Y-m-d g:i a',strtotime($row['tarikh']." ".$row['masa']));
											
											$DateTime = new DateTime($ceramahdate);
											$IntlDateFormatter = new IntlDateFormatter(
											    'ms_MY',
											   IntlDateFormatter::NONE,
							                    IntlDateFormatter::SHORT,
							                    'Asia/Kuala_Lumpur',
							                    IntlDateFormatter::TRADITIONAL
											);
											
											
											$masa_string= $IntlDateFormatter->format($DateTime);
											
											
											
											$DateTime = new DateTime($ceramahdate);
											$IntlDateFormatter = new IntlDateFormatter(
											    'ms_MY',
											   IntlDateFormatter::FULL,
							                    IntlDateFormatter::NONE,
							                    'Asia/Kuala_Lumpur',
							                    IntlDateFormatter::TRADITIONAL
											);
											$date_string= $IntlDateFormatter->format($DateTime);
											

		                                        if ($row['displaytext']=="on") {?>
                                            
                                            <h1 style="font-size: 400%;font-weight: 1000;"><?echo $row['tajuk'];?></h1>
                                            <h2 style="font-size: 270%;"><?echo $row['penceramah'];?></h2>
<!-- // 											<h3><?echo date('l, d M Y',strtotime($row['tarikh']) );?></h3>                               -->
                                            <h3 style="font-size:180% "><?echo $row['lokasi'];?><br>

											<?echo $date_string ;?><br>
											<?echo $masa_string;?></h3>                              
                         


											<?}?>
											
											</div>
                                    </div>
                                   
                                   <?}?>
	                                 
	                                 
	                                   <div class="item active">
                                        <img class="slide-img" src="img/slide/3.png" alt="img1">
                                        <div class="carousel-caption">
                                            <h3></h3>
                                        </div>
	                                   </div>
	                                   
                           
                                   
                                   
                 </div>
	                                   </div>               
</div>
	                                   </div>
   






<script type=text/javascript>
	
	$('.carousel').carousel({
	interval: 9000,
      pause: "false"

});


	var timout= <?echo $totalc;?> * 9000+10000;

	    setTimeout(function () {
       window.location.href = "index.php"; //will redirect to your blog page (an ex: blog.html)
    },timout ); //will call the function after 2 minutes.




	


    </script>


</body>
</html>
