<?php 

  date_default_timezone_set('Asia/Kuala_Lumpur');
	  require_once("../config/config.php");
  

	  
   $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
   $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
	 $namamasjid= $_POST['namamasjid'];
	 $username= $_POST['username'];
	 $password1= $_POST['password1'];
	 $password2= $_POST['password2'];
									   
						
	  if (isset($_POST['simpan']))   {
		  
		
		
	$query2 = "SELECT * FROM user_list where username='$username'";
	$statement = $DBH->prepare($query2);
	$query= $statement->execute();
	$data = $statement->fetchAll();
	$result = $DBH->prepare("SELECT FOUND_ROWS()"); 
	$result->execute();
	$row_count =$result->fetchColumn();
	if ($row_count>0){
		$error_msg="username already exist. Please select another username";
	} else {
		
		
		$query1 = "UPDATE setting_list SET namamasjid='$namamasjid' WHERE id='1'";
		$statement = $DBH->prepare($query1);
		$statement->execute();
			  
		$query2 = "INSERT INTO user_list (username,password) VALUES ('$username','$password1') ";
		$statement = $DBH->prepare($query2);
		$statement->execute();
		
		if ($query1 and $query2){
			
			header("Location:../administrator/");
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

	<title>Initial | Settings</title>

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
			
				<h1> Initial Settings<small> for ProTakwim</small> </h1>
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
				
									
				
									   <label class="control-label col-md-3 col-sm-3 col-xs-3">Organization Name</label>
										<div class="col-md-9 col-sm-9 col-xs-12">
										  <input id="namamasjid" required="required" class="form-control" value="<?php echo $namamasjid;?>" name="namamasjid"/>
										</div>
									  </div>
									  
									  
									  <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-3">Admin username</label>
										<div class="col-md-9 col-sm-9 col-xs-12">
										  <input id="username" required="required" class="form-control" value="<?php echo $username;?>" name="username"/>
										</div>
									</div>
									  
									  <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-3">Insert password</label>
										  <div class="col-md-9 col-sm-9 col-xs-12">
											<input value="<?php echo $password1;?>" id="password1" required="required" class="form-control" type="password" name="password1"/>
										  </div>
									  </div>
									  
									  <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-3">Confirm password</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
											  <input oninput="checkpassword();" value="<?php echo $password2;?>" id="password2" required="required" class="form-control" type="password" name="password2"/>
											</div>
										</div>
									  
									 
									  
									  
									  
									<div><a style="color:red"><?php echo $error_msg;?></a></div>
									  
									
									 
									  
									  
				
									  <div class="ln_solid"></div>
									  
				
									
								  </div>
								</div>
							  
		  <div  align=right><button style="display:none" id=submit type=submit name=simpan class="btn btn-info">Finish Setup</button></div>
		  
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

	<script>
		function checkpassword(){
			if ((document.getElementById('password1').value!="") && (document.getElementById('password1').value==document.getElementById('password2').value)){
				document.getElementById('submit').style.display="block";
			} else document.getElementById('submit').style.display="none";
		} 
	</script>
	
  </body>
</html>





