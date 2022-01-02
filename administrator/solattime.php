<?
	
require_once('../config/config.php');

global $DBH;
 $day=date('l');
 $zuhurtime ="13:00:00";
 $endzuhurtime ="14:00:00";
if (time() >= strtotime($zuhurtime) && time() <= strtotime($endzuhurtime) && $day=='Friday') {
  header('Location: solatjumaattime.php');
die;  
}





    //require_once 'time.php';
	date_default_timezone_set('Asia/Kuala_Lumpur');

$query2 ="SELECT  * FROM setting_list ";
	
			                    $stmt2 = $DBH->prepare($query2);
			                    $query2 = $stmt2->execute();
			                    $setting = $stmt2->fetchAll();
			                    $zone= $setting[0][zone];
			                    $pesanan= $setting[0][pesanan];
			                    $namamasjid= $setting[0][namamasjid];
			                    $iqomahperiod= $setting[0][iqomahperiod];
			                    $timebeforeazan= $setting[0][timebeforeazan];
			                    $scrollspeed= $setting[0][scrollspeed];
			                    $lokasigambarlatar= $setting[0][lokasigambarlatar];
			                    $lokasigambarsolat= $setting[0][lokasigambarsolat];
			                    $solatperiod= $setting[0][solatperiod];

			                    


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Solat Now  </title>
<style>
	html,body{
    margin:0;
    height:100%;
}
img{
  display:block;
  width:100%; height:100%;
  object-fit: cover;
}
	</style>

  </head>
<img src="<?echo "uploads/".$lokasigambarsolat;?>" alt="solatnow" width="" height="" />

  		
		
	<script type="text/javascript">
	var solattime='<?echo $solatperiod;?>';
setTimeout(function(){
    window.open('../../index.php','_SELF');
},solattime);

   	</script>
  </body>
</html>
