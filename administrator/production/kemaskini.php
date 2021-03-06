<?
	include ('../password_protect.php');
	

	require_once('../../config/config.php');

    include("resize-class.php");

 $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$ref="yes";
			$query = "UPDATE setting_list SET refresh='$ref' WHERE 1";
			$statement = $DBH->prepare($query);
			$statement->execute();
			
    //require_once 'time.php';
	date_default_timezone_set('Asia/Kuala_Lumpur');

	$tahunnow=date('Y');
	$tarikhmula= "01-01-".$tahunnow;
	$tarikhtamat= "31-12-".$tahunnow;
	
	$firstdate=strtotime($tarikhmula);
	$lastdate=strtotime($tarikhtamat);
	$datediff =$lastdate- $firstdate ;

	$totaldays= floor($datediff / (60 * 60 * 24));

	$query2 ="SELECT  * FROM setting_list ";
	
			                    $stmt2 = $DBH->prepare($query2);
			                    $query2 = $stmt2->execute();
			                    $setting = $stmt2->fetchAll();
			                    $zone= $setting[0][zone];
			                    $pesanan= $setting[0][pesanan];
			                    
	$query ="SELECT  * FROM solat_zone where code='$zone' ";
	
			                    $stmt2 = $DBH->prepare($query);
			                    $query = $stmt2->execute();
			                    $solatzone = $stmt2->fetchAll();		                    
			                    $negeri= $solatzone[0]['negeri'];
			                    $code= $solatzone[0]['code'];
			                    $kawasan= $solatzone[0]['kawasan'];
			                    

	$query ="Select * from waktusolat order by date_updated  limit 1";

		$stmt2 = $DBH->prepare($query);
		$query = $stmt2->execute();
		$waktusol=$stmt2->fetchAll();
		$lastupdated= $waktusol[0][date_updated];
 
	$query ="SELECT  DISTINCT negeri FROM solat_zone  ";
	
			                    $stmt2 = $DBH->prepare($query);
			                    $query = $stmt2->execute();
			                    $allnegeri = $stmt2->fetchAll();
			                    $neg=$allnegeri[0][negeri];
			                    
	$query ="SELECT  DISTINCT kawasan,code FROM solat_zone where negeri='$negeri' ";
	
			                    $stmt2 = $DBH->prepare($query);
			                    $query = $stmt2->execute();
			                    $allkawasan = $stmt2->fetchAll();	
	

			  
			  
			  $zonex=$_POST['kawasan'];
			  $pesananx=$_POST['pesanan'];
			  
			  
 

			  if ($_GET['status']=="update"){$_POST[kemaskini]="update";}
			  
			  if (isset($_POST['kemaskini']))   {
				  
				    $query ="truncate table waktusolat";
	
			                    $stmt2 = $DBH->prepare($query);
			                    $query = $stmt2->execute();
			                    
				  for($i=0; $i<=$totaldays; $i++) {
					  
					  $percent=$i/$totaldays*100;
					  
echo "<script>updateprogress($percent);</script>";
	
$currentday = date('d-m-Y',strtotime($tarikhmula."+".$i." days"));

				  
 $jsonrequest= "http://api.azanpro.com/times/date.json?zone=".$code."&start=".$currentday."&format=12-hour";
$datasolat = file_get_contents($jsonrequest); // put the contents of the file into a variable

				  $azandata=json_decode($datasolat,true);

				
				  $datenow=$azandata['prayer_times'][0]['date'];
   				  $datestamp=$azandata['prayer_times'][0]['datestamp'];
				  $imsak= $azandata['prayer_times'][0]['imsak'];
				  $subuh= $azandata['prayer_times'][0]['subuh'];
				  $zohor= $azandata['prayer_times'][0]['zohor'];
				  $syuruk= $azandata['prayer_times'][0]['syuruk'];
				  $asar= $azandata['prayer_times'][0]['asar'];
				  $maghrib= $azandata['prayer_times'][0]['maghrib'];
				  $isyak= $azandata['prayer_times'][0]['isyak'];
				  


$queryx ="INSERT INTO waktusolat(date, datestamp, imsak, subuh, syuruk, zohor, asar, maghrib,isyak) VALUES (:date, :datestamp, :imsak, :subuh, :syuruk, :zohor, :asar, :maghrib ,:isyak)";
			              
$statement = $DBH->prepare($queryx);
$statement->bindParam(':date', $datenow);
$statement->bindParam(':datestamp', $datestamp);
$statement->bindParam(':imsak', $imsak);
$statement->bindParam(':subuh', $subuh);
$statement->bindParam(':syuruk', $syuruk);
$statement->bindParam(':zohor', $zohor);
$statement->bindParam(':asar', $asar);
$statement->bindParam(':maghrib', $maghrib);
$statement->bindParam(':isyak', $isyak);
$statement->execute();


   
   }
   
    		$ref="yes";
			$query = "UPDATE setting_list SET refresh='$ref' WHERE 1";
			$statement = $DBH->prepare($query);
			$statement->execute();
			
			echo "<script>alert('Waktu Solat telah dikemaskini');</script>";
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
	  
    <title>Kemaskini  </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <?include ('menu.php')?>
       

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kemaskini</h3>
              </div>

               </div>
              

            <div class="clearfix"></div>
            
            <div class="row">
             
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form method="post" class="form-horizontal form-label-left">
					<div><?echo $kawasan.",".$negeri;?><span><?echo "<br>Kemaskini Terakhir : ".$lastupdated;?></span></div>
       <!--        
                      
                      
                      <div style="display:none" class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Negeri</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select  disabled id=negeri name="negeri" class="form-control">
                            <option>Sila Pilih</option>
                            <?foreach($allnegeri as $row){?>
                            <option value="<?echo $row['negeri'];?>" <?if ($row['negeri']==$negeri) echo "selected";?> ><?echo $row['negeri'];?></option>
                            <?}?>
                            
                            </select>
                        </div>
                      </div>
                      
                       <div style="display:none" class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kawasan</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select   disabled id=kawasan name=kawasan class="form-control">
                            <option>Sila Pilih</option>
                            <?foreach($allkawasan as $row){?>
                            <option value="<?echo $row['code'];?>" <?if ($row['kawasan']==$kawasan) echo "selected";?> ><?echo $row['kawasan'];?></option>
                            <?}?>
                          </select>
                        </div>
                      </div>
                      
                   
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Masa Sebelum Azan</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input id="azan" name="azanperiod" type="text" class="form-control" value="" />
                          <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                        </div>
                      </div>
                      
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Masa Sebelum Iqomah</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input id="iqomah" name="iqomahperiod" type="text" class="form-control" value="" />
                          <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                        </div>
                      </div>
-->
                      
                                            <div class="ln_solid"></div>

                      <div class="progress">
  <div id=progress-bar class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">

  </div>
</div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
<!--                           <button type="button" class="btn btn-primary">Cancel</button> -->
                          <button style="width:100%"  name=kemaskini type="submit"  class="btn btn-success">Kemaskini</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
              </div></div></div>

                     <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            ProTakwim <a href="">Takwim Solat</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    
    <script type="text/javascript"> 
	    function updateprogress(value){
		    var valuer='100%';
		$('.progress-bar').css('width', valuer);
	
	    }
	</script>
		
		
		
	<script type="text/javascript">
		$(function () {
    $(document).on("change", "#negeri", function () {
        $.ajax({
            url: 'getkawasan.php',
            type: 'GET',
            dataType: 'json',
            data: {negeri: $(this).val()},
             success: function(data){
            var toAppend = '';
           $.each(data,function(i,o){
           toAppend += '<option value='+o.code+'>'+o.kawasan+'</option>';
          });
		  $('#kawasan').empty();
         $('#kawasan').append(toAppend);
        }
        
        
        
        })



    });
});
	</script>
  </body>
</html>
