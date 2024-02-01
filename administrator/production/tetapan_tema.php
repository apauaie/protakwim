<?php 
	
	include ('../password_protect.php');
	

	require_once('../../config/config.php');


 $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //require_once 'time.php';
	date_default_timezone_set('Asia/Kuala_Lumpur');

$query2 ="SELECT  * FROM setting_list ";
	
			                    $stmt2 = $DBH->prepare($query2);
			                    $query2 = $stmt2->execute();
			                    $setting = $stmt2->fetchAll();
			                    $zone= $setting[0]['zone'];
                          $theme= $setting[0]['theme'];
			                    $pesanan= $setting[0]['pesanan'];
			                    $namamasjid= $setting[0]['namamasjid'];
			                    $iqomahperiod= $setting[0]['iqomahperiod'];
			                    $timebeforeazan= $setting[0]['timebeforeazan'];
			                    $scrollspeed= $setting[0]['scrollspeed'];
			                    $lokasigambarlatar= $setting[0]['lokasigambarlatar'];
			                    $lokasigambarsolat= $setting[0]['lokasigambarsolat'];
			                    $lokasigambarsolatjumaat= $setting[0]['lokasigambarsolatjumaat'];

$query2 ="SELECT  * FROM tema_list ";
                          
                          $stmt2 = $DBH->prepare($query2);
                          $query2 = $stmt2->execute();
                          $themes = $stmt2->fetchAll();
			                    


	if (isset($_POST['submit'])){
		
    $nama_tema= $_POST['nama_tema'];
 $query = "UPDATE setting_list SET theme='$nama_tema' WHERE id='1'";
 $statement = $DBH->prepare($query);
 $statement->execute();
     
 header("Refresh:0");

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
	  
    <title>Tema ProTakwim | </title>

      <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="../vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="../vendors/cropper/dist/cropper.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    
  <link href="plugins/fileuploader/src/jquery.fileuploader.min.css" media="all" rel="stylesheet">

  </head>
<style>
  
  .broder-selected{
    border-color: green;
  }
  .broder-notselected{
    border-color: red;
  }
</style>
   <?php include('menu.php');?>
   
   

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tema</h3>
              
              </div>
                 </div>
                 <div class="clearfix"></div>
                 <div class="row">
                   
                 <?php  foreach ($themes as $row){
                 
                 $urltheme="../../themes/".$row['lokasi'];
                 ?>
                 
                
              <div class="col-md-4 col-xs-12">
  <div class="x_panel <?php  if ($theme==$row['lokasi']) echo "broder-selected"; else echo "broder-notselected";?>">
                  <div class="x_title ">
                    <div class="bg-light clearfix">
                        <div class="pull-left"> <h2><?php echo $row['nama_tema'];?></h2></div>
                        <div class="pull-right">  <a target ="_blank" href="<?php echo $urltheme;?>"> <i  class="fa fa-eye fa-2x float-right"></i></a></div>
                    </div>
               
                  
                     
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content ">

                    <!-- start form for validation -->
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
			
                      <?php $urlback="../../themes/".$row['lokasi']."/images/thumbnail.png";?>
                   <img src="<?php echo $urlback;?>" alt="Gambar Tema" width="100%" height="180px" />
                   <input hidden name="nama_tema" value="<?php  echo $row['lokasi'];?>">
                          <br/>
						  <button type="submit" name=submit class="btn btn-success btn-lg btn-block">Pilih Tema</button>
                    </form>
                    <!-- end form for validations -->

                  </div>
            </div>
              </div>
              <?php }?>
              
             

</div></div></div>

                     <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            2017 ProTakwim <a href="www.protakwim.org">Takwim Solat</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
      <script type="text/javascript" src="../../plugin/autocomplete/js/bootstrap.min.js"></script>

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
    <script src="../build/js/custom.js"></script>
    
    

    <!-- bootstrap-daterangepicker -->
      
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="../vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper -->
    <!-- <script src="../vendors/cropper/dist/cropper.min.js"></script> -->

    <!-- Custom Theme Scripts -->
    <!-- <script src="../build/js/custom.min.js"></script> -->
    
	<script>

    $('#myDatepicker').datetimepicker({
        format: 'DD-MM-YYYY'
    });
    
    $('#myTimepicker').datetimepicker({
        format: 'hh:mm A'
    });



$(function() {
    $( "#lokasi" ).autocomplete({
      source: 'getlocation.php'
    });
  }); 
</script>



  </body>
</html>
