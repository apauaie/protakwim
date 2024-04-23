<?php
  require_once("../../protakwim.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>ProTakwim</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
<style>
@font-face {
    font-family: digital7;
    src: url("../../plugin/DS-DIGIT.TTF") ;
    font-weight: normal;
    font-style: normal;


}
</style>
</head>

<?php $urlback="background-image: url('../../administrator/production/uploads/".$lokasigambarlatar."');"; ?>
<body style=   "<?php echo $urlback;?>">
    <div class="container-fluid">
        <!-- SECTION1 -->
        
        <h1 onclick="maxWin()" align="left"  style="margin-left: 20%; font-size: 50px;font-style:bold;font-family:serif;"><?php 
// 	        echo $masjidname;
	      
	        
        ?>
<!--         <img align =centre src="img/logo.png" alt="logo" width="500" height="" /> -->
        
        </h1>  
        <section class="section1">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <?php for($i = 0; $i < 5; $i++): ?>
                                        <li data-target="#myCarousel" data-slide-to="$i"></li>
                                    <?php endfor ?>
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
	                                
	                            <?php  foreach($ceramah as $row){?>

                     
                                   
                                   <div class="item">
                                        <img class="slide-img" src="<?php 
	                                        if ($row['poster']!=""){
		                                    echo '../../administrator/production/uploads/'.$row['poster'];

	                                        }else {
		                                         echo "img/masjidbackground.png";
	                                        }
	                                        	                                       

	                                        
	                                        
	                                        
	                                        
	                                        ?>"  alt="image">
                                        <div style="  text-shadow:2px 2px 10px white, 1px 1px 10px white;color: black;top:0;" class="carousel-caption">
	                                        
	                                        <?php 


		                                        if ($row['displaytext']=="on") {?>
                                            
                                            <h1 style="font-size: 400%;font-weight: 1000;"><?php echo $row['tajuk'];?></h1>
                                            <h2 style="font-size: 270%;"><?php echo $row['penceramah'];?></h2>
<!-- // 											<h3><?php echo date('l, d M Y',strtotime($row['tarikh']) );?></h3>                               -->
                                            <h3 style="font-size:180% "><?php echo $row['lokasi'];?><br>

											<?php echo $tarikhhariini ;?><br>
											<?php echo $todayhijrah;?></h3>                              
                         


											<?php }?>
											
											</div>
                                    </div>
                                   
                                   <?php }?>
	                                 
	                                 
	                                   <div class="item active">
                                        <img class="slide-img" src="../../img/slide/3.png" alt="img1">
                                        <div class="carousel-caption">
                                            <h3></h3>
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

                                <div class="clock-box">
	                                <div style="font-family: fantasy;font-size: x-large;color: white"> <?php echo $masjidname.$test.$r.$l;?></div>
                                    <div id="time"  style="text-align:right;font-family:digital7;    font-size:7em;margin:0;" class="time"></div>
                                    <div id="normaldate" class="day"><?php 

											
		                                    echo $tarikhhariini; ?></div>
                                    <div id="islamdate" class="day"><?php echo $todayhijrah; ?></div>
                                    <div id="kawasan" class="kawasan" hidden="" ><?php echo $kawasan; ?></div>
                                   <div id="iqo"  hidden="" class="kawasan"></div>
                                    <div id="iqomah" hidden="" style="color:white;font-size:7em;margin:0;"  class="time"></div>
                                    <div id="azantime" hidden=""  style="color:white;font-size:7em;margin:0;"  class="time"></div>



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
                                <div style="font-size: 50px; color:yellow;" class="panel-body waktu-body"><?php echo $y; ?></div>
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
	           
                <div class="well pesanan " style=" padding:0;bottom:0;font-size: 57px">
	                 <div class="pull-right">

                                    </div>
                                <marquee  behavior="scroll" direction="left" scrollamount="<?php echo $scrollspeed;?>"><?php  echo $pesanan;?></marquee>

                </div>
            </div>
        </section>

    </div>

    <!-- MODAL SECTION -->

    

    <!-- AUDIO SOLAT -->
    <audio id="azan" src="../../audio/azanremind.mp3"></audio>
    <!-- AUDIO SOLAT -->
      <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../../plugin/countdown/jquery.countdown.js"></script>
      <script type="text/javascript" src="../../js/myjs.js"></script>
      <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../../js/protakwim.js"></script>
      
        <script language="JavaScript" type="text/javascript">
          $(document).ready(function(){
            $('.carousel').carousel({
              interval: 1000
            })
          });    
        </script>


</body>
</html>
