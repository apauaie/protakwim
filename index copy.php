<?php
	
	
	session_start();
	
	$masjidname="Masjid Taman Pulai Indah";

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
	
// echo $iqomahperiod;
		
		


	


    require 'api.php';
    //require_once 'time.php';
	date_default_timezone_set('Asia/Kuala_Lumpur');

    // Get Hijri date
    $url2 = file_get_contents("https://api.aladhan.com/gToH");
    $data = json_decode($url2, true);

    $ar1 = ($data['data']);
    $day = ($ar1['hijri']['day']);
    $month = ($ar1['hijri']['month']['en']);
    $year = ($ar1['hijri']['year']);

    $today = $day." ".$month." ".$year;

    if(isset($_POST['simpan'])){
        $zonKawasan = htmlspecialchars($_POST['zon']);
        $pesanan = htmlspecialchars($_POST['pesanan']);

        // tulis zon kawasan ke zon.txt
/*
        if(!empty($zonKawasan)){
            $myzonFile = fopen("./text/zon.txt", "w") or die("Unable to open file!");
            fwrite($myzonFile, $zonKawasan);
            fclose($myzonFile);
        }

        // Tulis pesanan ke pesanan.txt
        if(!empty($pesanan)){
            $mypesananFile = fopen("./text/pesanan.txt", "w") or die("Unable to write file!");
            fwrite($mypesananFile, $pesanan);
            fclose($mypesananFile);
        }
*/
    }


?>
<!DOCTYPE html>
<html>
<head>
	<title>Pi-PrayerTime</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="plugin/countdown/jquery.countdown.js"></script>
            <script type="text/javascript" src="js/myjs.js"></script>

</head>
<body>
    <div class="container-fluid">
        <!-- SECTION1 -->
        
        <h1 onclick="maxWin()" align="center" style="font-size: 100px;font-style:italic;font-family:serif;"><?echo $masjidname;?></h1>
        <section class="section1">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <?php for($i = 0; $i < 5; $i++): ?>
                                        <li data-target="#myCarousel" data-slide-to="$i"></li>
                                    <?php endfor ?>
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img class="slide-img" src="img/slide/7.jpg" alt="img1">
                                        <div class="carousel-caption">
                                            <h3>Masjid Pulai Indah</h3>
                                            <p>#inprogress</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img class="slide-img" src="img/slide/8.jpg" alt="img2">
                                        <div class="carousel-caption">
                                            <h3>Masjid Pulai Indah</h3>
                                            <p>#inprogress</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img class="slide-img" src="img/slide/3.png" alt="img3">
                                        <div class="carousel-caption">
                                            <h3>Masjid Pulai Indah</h3>
                                            <p>#inprogress</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img class="slide-img" src="img/slide/4.png" alt="img4">
                                        <div class="carousel-caption">
                                            <h3>Masjid Pulai Indah</h3>
                                            <p>#inprogress</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img class="slide-img" src="img/slide/5.jpg" alt="img5">
                                        <div class="carousel-caption">
                                            <h3>Masjid Pulai Indah</h3>
                                            <p>#inprogress</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="panel panel-default">
<!--
                                <div class="container-fluid">
                                    <div class="pull-left">
                                        <button data-toggle="tooltip" title="Play" data-placement="bottom" type="button" class="btn" onclick="play()"><span class="glyphicon glyphicon-play"></span></button>
                                        <button data-toggle="tooltip" title="Pause" data-placement="bottom" type="button" class="btn" onclick="stop()"><span class="glyphicon glyphicon-pause"></span></button>
                                        <button data-toggle="tooltip" title="Fullscreen" data-placement="bottom" type="button" class="btn" onclick="maxWin()"><span class="glyphicon glyphicon-fullscreen"></span></button>
                                    </div>
                                    <div class="pull-right">
                                        <span data-toggle="modal" data-target="#myModal_1">
                                            <button data-toggle="tooltip" title="Settings" data-placement="bottom" type="button" class="btn"><span class="glyphicon glyphicon-cog"></span></button>
                                        </span>
                                    </div>
                                </div>
-->
                                
                                
                                <div class="clock-box">
                                    <div id="time" class="time"></div>
                                    <div id="normaldate" class="day"><?php echo date('D,d F Y'); ?></div>
                                    <div id="islamdate" class="day"><?php echo $today; ?></div>
                                    <div id="kawasan" class="kawasan"><?php echo $kawasan; ?></div>
                                   <div id="iqo"  hidden="" class="kawasan"></div>
                                    <div id="iqomah" class="time"></div>
<!--                                     <input id="chk1" type="checkbox" checked data-toggle="toggle"> -->


                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION1 -->

        <!-- SECTION 2 -->
        <section class="section2">
            <div class="container">
                <div class="row">
                    <?php foreach($waktuAzan as $x => $y): ?>
                        <div class="col-md-2">
                            <div class="panel panel-default">
                                <div class="panel-heading waktu-head"><?php echo $x; ?></div>
                                <div style="color:yellow;" class="panel-body waktu-body"><?php echo $y; ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- END SECTION 2 -->

        <!-- SECTION 3 -->
        <section class="section3">
            <div class="container">
                <div class="well pesanan">
                    <?php echo $pesanan;?>
                </div>
            </div>
        </section>

    </div>

    <!-- MODAL SECTION -->

    <!-- Modal -->
    <div id="myModal_1" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tatapan Kawasan dan Pesanan</h4>
                </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <div class="form-group">
                        <a href="zone.php" target="_blank">Kod Zon</a>
                        <input type="text" class="form-control" placeholder="contoh: JHR02" name="zon">
                    </div>
                    <div class="form-group">
                        <a href="http://www.islam.gov.my/e-hadith" target="_blank">Pesanan</a>
                        <br>
                        <textarea name="pesanan" class="form-control" rows="8"></textarea><br>
                        <button class="btn btn-default" type="submit" name="simpan">Hantar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <!-- AUDIO SOLAT -->
    <audio id="azan" src="audio/azanremind.mp3"></audio>
<!--     <audio src="audio/Azan2.mp3" id="azan2"></audio> -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>


    
<script type="text/javascript">
	
/*
	$('#chk1').change(function() {

  showiqomah();
	
})
*/

	function timerazan(){
    document.getElementById('kawasan').style.display = 'none';
    		document.getElementById('iqo').innerHTML = "Azan";
    document.getElementById('iqo').style.display = 'block';

	document.getElementById('iqomah').style.display = 'block';

// 	var iqomah= <?echo $iqomahperiod;?>;
	var t = new Date().getTime() + 30000;
  $("#iqomah")
  .countdown(t, function(event) {
    $(this).text(
      event.strftime('%M:%S')
    );
  });
		}
		
		
	function showiqomah(){
		
				document.getElementById('iqo').innerHTML = "Iqomah";

    document.getElementById('kawasan').style.display = 'none';
    document.getElementById('iqo').style.display = 'block';

	document.getElementById('iqomah').style.display = 'block';
// 	var iqomah= <?echo $iqomahperiod;?>;
	var t = new Date().getTime() + 600000;
  $("#iqomah")
  .countdown(t, function(event) {
    $(this).text(
      event.strftime('%M:%S')
    );
  });
  play();
		}

  
   $("#iqomah")
  .on('finish.countdown', function(event) {
    document.getElementById('iqomah').style.display = 'none';
        document.getElementById('kawasan').style.display = 'block';
    document.getElementById('iqo').style.display = 'none';

  });

</script>

    <script type="text/javascript">
    $( document ).ready(function() {
      setInterval(function() {
        $('#time').load('time.php')
      }, 1000);
    });
    </script>

</body>
</html>
