<?php 


// declare function
function find_SQL_Version() {
  $output = shell_exec('mysql -V');
  preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', $output, $version);
  return @$version[0]?$version[0]:-1;
}

if (isset($_POST['simpan']))   {
	 // echo "test";
	 
	 $username=$_POST['username'];
	 $password=$_POST['password'];
	 $dbname=$_POST['database_name'];
	 $dbhost=$_POST['host'];
	 
$db_error=false;
// try to connect to the DB, if not display error
$con=mysqli_connect($_POST['host'],$_POST['username'],$_POST['password'],$_POST['database_name']);


if (mysqli_connect_errno()) {
  $db_error=true;
	$error_msg="Sorry, these details are not correct.
	Here is the exact error: ".mysqli_connect_error();
}

// Return name of current default database
if ($result = mysqli_query($con, "SELECT DATABASE()")) {
  $row = mysqli_fetch_row($result);
  $success_msg=  "Database detected is " . $row[0];
  mysqli_free_result($result);
}

if (!$db_error){
	
	// try to create the config file and let the user continue
	$connect_code="<?php
	define('DB_HOST','".$dbhost."');
	define('DB_NAME','".$dbname."');
	define('DB_USER','".$username."');
	define('DB_PASS','".$password."');
	?>";
	
	if(!is_writable("../config/"))
	{
	  $error_msg="<p>Sorry, I can't write to <b>config.php</b>. Please check the folder permission. Otherwise,you will have to edit/create the file (create config.php inside of config folder) yourself.Here is what you need to insert in that file:<br /><br />
	  <textarea rows='5' cols='50' onclick='this.select();'>$connect_code</textarea></p>";
	}
	else
	{
	  $configfile="../config/config.php";
	  $fp = fopen($configfile, 'wb');
	  fwrite($fp,$connect_code);
	  fclose($fp);
	  chmod($configfile, 0666);
	  
	  include($configfile);
	  $con2=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	  
	  
	  $query = '';
	  $sqlScript = file('../config/takwim_masjid.sql');
	  foreach ($sqlScript as $line)	{
		  
		  $startWith = substr(trim($line), 0 ,2);
		  $endWith = substr(trim($line), -1 ,1);
		  
		  if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
			  continue;
		  }
			  
		  $query = $query . $line;
		  if ($endWith == ';') {
			  mysqli_query($con2,$query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
			  $query= '';		
		  }
	  }
	 header("Location:init_setting.php");
	  
	  
	  
	  
	  
	}
	
}



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

	<title>Database | Check</title>

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
			
				<h1> Database Details<small> for ProTakwim</small> </h1>
		</div>
		<div class="card-body">
		  
		  
		  <div class="clearfix"></div>
		  
		  <div class="row">
			<div class="col-md-12">
			  <div class="x_panel">
				<div class="x_title">		 
				</div>
				
				
				<div class="clearfix"></div>
							<div class="row">
							 
							  <div class="col-md-12 col-xs-12">
								<div class="x_panel">
								  <div class="x_title">
									<h2></h2>
									
									<div class="clearfix"></div>
								  </div>
								  <div class="x_content">
									<br />
									<form method="post" class="form-horizontal form-label-left">
				
							 
									  
									  <div class="form-group">
				
									
				
									   <label class="control-label col-md-3 col-sm-3 col-xs-3">Database Name</label>
										<div class="col-md-9 col-sm-9 col-xs-12">
										  <input id="database_name" required="required" class="form-control" value="<?php echo $dbname;?>" name="database_name"/>
										</div>
									  </div>
									  
									  
									  <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-3">Username</label>
										<div class="col-md-9 col-sm-9 col-xs-12">
										  <input id="username" required="required" class="form-control" value="<?php echo $username;?>" name="username"/>
										</div>
									</div>
									  
									  <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-3">password</label>
										  <div class="col-md-9 col-sm-9 col-xs-12">
											<input value="<?php echo $password;?>" id="password" required="required" class="form-control" type="password" name="password"/>
										  </div>
									  </div>
									  
									  <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-3">Database Host (usually localhost)</label>
										  <div class="col-md-9 col-sm-9 col-xs-12">
											<input id="host" required="required" class="form-control" value="<?php echo $dbhost;?>" name="host"/>
										  </div>
									  </div>
									  
									  
									  
									<div><a style="color:red"><?php echo $error_msg;?></a></div>
									  
									
									 
									  
									  
				
									  <div class="ln_solid"></div>
									  
				
									
								  </div>
								</div>
				
		  <div align=right><button type=submit name=simpan class="btn btn-info">Check Database</button></div>
		  
		  </form>
		  
		  
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





