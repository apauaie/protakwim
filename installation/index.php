<?php 

// $php_version=phpversion();
// if($php_version<7)
// {
//   $error=true;
//   $php_error="PHP version is $php_version - too old!";
// }

// declare function
function find_SQL_Version() {
  $output = shell_exec('mysql -V');
  preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', $output, $version);
  return @$version[0]?$version[0]:-1;
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

	<title>Install | </title>

	<!-- Bootstrap -->
	<!-- Font Awesome -->
	<link href="../administrator/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../administrator/vendors/nprogress/nprogress.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

  </head>

  <div align=center><img height=230px src="../img/logo.png"></div><br>
  
  	<div class="container">
	  <div class="card">
		<div class="card-header">
			
				<h1> Checking Requirement<small> for ProTakwim</small> </h1>
		</div>
		<div class="card-body">
		  
		  
		  <div class="clearfix"></div>
		  
		  <div class="row">
			<div class="col-md-12">
			  <div class="x_panel">
				<div class="x_title">
					<br>
				  <h3>PHP Version (must be 7.0 or above) :    <?php 
				  
				  $error=false;	
				  $php_version=phpversion();
					  if($php_version<7)
					  {
						$error=true;
						$php_error="PHP version is $php_version - too old!";
						echo "<a style='color:red'>".$php_error."</a>";
					  } else echo "<a style='color:green'>".$php_version." -OK";?></a> </h3>
				  
				  <br>
				  <h3>mySQL Version (must be 5.0 or above) :    <?php 				$mysql_version=find_SQL_Version();
					  if($mysql_version<5)
					  {
						  
						if($mysql_version==-1) $mysql_error="MySQL version will be checked at the next step.";
						else $mysql_error="MySQL version is $mysql_version. Version 5 or newer is required.";
					  
				  
				   
					echo "<a style='color:orange'>".$mysql_error."</a>";
				  } else echo "<a style='color:green'>".$mysql_version." -OK";?></a> </h3>
				  
				  <br>
				  <h3>PHP Safe Mode :    <?php 				
					  if( ini_get("safe_mode") )
					  {
						$error=true;
						$safe_mode_error="Please switch of PHP Safe Mode";
					echo "<a style='color:orange'>".$safe_mode_error."</a>";
				  } else echo "<a style='color:green'>Not in Safe Mode -OK";?></a> </h3>
				  
				  <br>
				  <h3>Sessions Enabled :    <?php 				
					  
					  $_SESSION['myscriptname_sessions_work']=1;
					  if(empty($_SESSION['myscriptname_sessions_work']))
					  {
						$error=true;
						$session_error="Sessions must be enabled!";
					  
					echo "<a style='color:orange'>".$session_error."</a>";
				  } else echo "<a style='color:green'>Sessions is enabled -OK";?></a> </h3>
				  
						  
				  
									 
				</div>
				
				
				
		  <div align=right><a align="right" href="sqlcheck.php" class="btn btn-primary">Next Step</a></div>
		</div>
	  </div>
	  </div>
		</div>



											   
									
							
	

	<!-- jQuery -->
	<script src="../administrator/vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="../administrator/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->

	
	
  </body>
</html>





