
<? 
require_once('../config/config.php');

global $DBH;

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