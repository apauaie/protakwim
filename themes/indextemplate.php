<?php
	require_once("protakwim.php");
?>
<!DOCTYPE html>
<html>

<head>
  <title>ProTakwim</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style1.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="plugin/countdown/jquery.countdown.js"></script>
  <script type="text/javascript" src="js/myjs.js"></script>
</head>

<?php $urlback="background-image: url('".$workingfolder."uploads/".$lokasigambarlatar."');"; ?>
<body style="<?php echo $urlbac;?>">
  

    

                <div id="maincontainer">
                <div id="masjidname" class="location"> <?php echo $masjidname.$test.$r.$l;?></div>
                <div id="time" class="time"></div>
                <div id="normaldate" class="day"><?php echo $tarikhhariini; ?></div>
                <div id="islamdate" class="day"><?php echo $todayhijrah; ?></div>
                <div id="kawasan" class="kawasan" hidden=""><?php echo $kawasan; ?></div>
                <div id="iqo"  class="kawasan"><?php echo $kawasan;?></div>
                <div id="iqomah"  class="time">Iqomah</div>
                <div id="azantime"  class="time">Azan</div>
                
                <div id="solatcontainer">
                <?php foreach($waktuAzan as $x => $y): ?>
                <div class="solatname"><?php echo $x; ?>
                <div class="solattime"><?php echo $y; ?></div></div>
                <?php endforeach; ?>
                </div>
                </div>
                
    
        




  <!-- AUDIO SOLAT -->
  <audio id="azan" src="audio/azanremind.mp3"></audio>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/protakwim.js"></script>

</body>

</html>