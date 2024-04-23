
<?php  
	require_once('../../config/config.php');


 $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //require_once 'time.php';
	date_default_timezone_set('Asia/Kuala_Lumpur');

	
	
	
    $penceramah=$_POST['penceramah'];
    $tajuk=$_POST['tajuk'];
    $lokasi=$_POST['lokasi'];

	$tarikhceramah=$_POST['tarikhceramah'];
    
	$masaceramah=$_POST['masaceramah'];
	$modifiedby="admin";
	$status="active";
	$remarks="";
	$idx= $_POST['id'];
	
	
		
			
		          $query = "UPDATE ceramah_list SET penceramah='$penceramah', tajuk='$tajuk', lokasi='$lokasi', tarikh='$tarikhceramah', masa='$masaceramah', modifiedby='$modifiedby', status='$status', remarks='$remarks' WHERE id='$idx'";

$statement = $DBH->prepare($query);



$statement->execute();





?>