<?php
	require_once("../../protakwim.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../../css/bootstrap.min.css">

		<link rel="stylesheet" href="./css/style.css" />

		<title> <?php echo $masjidname.$test.$r.$l;?></title>
		<style>
			
		</style>
	</head>
	<?php $urlback="background-image: url('../../administrator/production/uploads/".$lokasigambarlatar."');"; ?>
	<body style=   "<?php echo $urlback;?>">
		<div class="content">
			<div class="up">
				<div class="row">
					<!-- <div class="logo">
						<img src="./images/Logo.png" alt="Logo" />
					</div> -->
					<div class="masdjid">
						<h1> <?php echo $masjidname.$test.$r.$l;?></h1>
						<div class="date">
							<div id="normaldate" class="milady"><?php echo $tarikhhariini; ?></div>
							<div id="islamdate" class="hijri"><?php echo $todayhijrah; ?></div>
						</div>
					</div>
				</div>
					<div style="" class="clock ">
						<h2 id="time" style="text-shadow: 2px 2px #fff; padding-right:-100px;font-family:digital7;    font-size:17em;" ></h2>
						

						<!-- <p>am</p> -->
					</div>
					
				<div  class="syuruk">
					<ul>
						
						
						
						
						<li>
							<h2 hidden id="iqo" class="time">Iqomah</h2>
							<h3 hidden id="iqomah" class="time">13:00</h3>
							<h3 hidden id="azantime" class="time">00:59</h3>
						</li>
					</ul>
				</div>
				<!-- <img
					class="illustration"
					src="./images/Masjid Illustration.png"
					alt="Masjid"
				/> -->
			</div>
			
			<div class="down">
			<ul>
			<?php foreach($waktuAzan as $x => $y): ?>
			<li>
			<h2><?php echo $x; ?></h2>
			<h3><?php echo $y; ?></h3>
			</li>
			<?php endforeach; ?>
			</ul>
			</div>
			
			
		</div>
		<audio id="azan" src="../../audio/azanremind.mp3"></audio>
		<script src="./js/main.js"></script>
		<!-- AUDIO SOLAT -->
		  <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
			<script type="text/javascript" src="../../plugin/countdown/jquery.countdown.js"></script>
			<script type="text/javascript" src="../../js/myjs.js"></script>
		  <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
		  <script type="text/javascript" src="../../js/protakwim.js"></script>
		  <script>
			
		  </script>
	</body>
	
</html>
