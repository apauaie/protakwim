<?
	
	include ('password_protect.php');
	

require_once('../config/config.php');

global $DBH;


    //require_once 'time.php';
	date_default_timezone_set('Asia/Kuala_Lumpur');


	$penceramah=$_POST['penceramah'];
    $tajuk=$_POST['tajuk'];
        $lokasi=$_POST['lokasi'];

	$tarikhceramah=$_POST['tarikhceramah'];
    $tarikhceramah=date('Y-m-d',strtotime($tarikhceramah));
    
	$masaceramah=$_POST['masaceramah'];
	$modifiedby="admin";
	$status="active";
	$remarks="";



	if (isset($_POST['submit'])){
		
			if (isset($_FILES['files'])) $_POST['textstatus']="off"; else $_POST['textstatus']="on";
	$displaytext=$_POST['textstatus'];
		
		  $query ="INSERT INTO `ceramah_list`(`penceramah`, `tajuk`, `lokasi`, `tarikh`, `masa`, `modifiedby`, `status`, `remarks`, `displaytext`) VALUES (:penceramah,:tajuk,:lokasi,:tarikhceramah,:masaceramah,:modifiedby,:status,:remarks,:displaytext)";
			              
$displaytext="on";

$statement = $DBH->prepare($query);
$statement->bindParam(':penceramah', $penceramah);
$statement->bindParam(':tajuk', $tajuk);
$statement->bindParam(':lokasi', $lokasi);
$statement->bindParam(':masaceramah', $masaceramah);
$statement->bindParam(':tarikhceramah', $tarikhceramah);
$statement->bindParam(':modifiedby', $modifiedby);
$statement->bindParam(':remarks', $remarks);
$statement->bindParam(':status', $status);
$statement->bindParam(':displaytext', $displaytext);


$statement->execute();
$lastid = $DBH->lastInsertId();
			   

if(isset($_FILES['files'])){
      $errors= array();
      $file_name = $_FILES['files']['name'];
      $file_size =$_FILES['files']['size'];
      $file_tmp =$_FILES['files']['tmp_name'];
      $file_type=$_FILES['files']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['files']['name'])));
      
      $expensions= array("jpeg","jpg","png","pdf");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG,PDF or PNG file.";
      }
      

      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
             // *** Include the class
    





//          echo "Success";
          $query = "UPDATE ceramah_list SET displaytext='off' , poster='$file_name' WHERE id='$lastid'";
			$statement = $DBH->prepare($query);
			$statement->execute();

			$ref="yes";
			$query = "UPDATE setting_list SET refresh='$ref' WHERE 1";
			$statement = $DBH->prepare($query);
			$statement->execute();
         
      }else{
         //print_r($errors);
      }
   }
//end file upload




// setTimeout(function() { alert('Terima Kasih'); }, 100);


echo "<script>



window.location.href = 'senarai_ceramah.php';

</script>";

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
	  
    <title>New Talk | </title>

      <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="vendors/cropper/dist/cropper.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    
  <link href="plugins/fileuploader/src/jquery.fileuploader.min.css" media="all" rel="stylesheet">

<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!--   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
  <script type="text/javascript" src="../../plugin/autocomplete/js/bootstrap.min.js"></script>
  </head>

   <?include('menu.php');?>
   
   

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Maklumat Aktiviti</h3>
              
              </div>
                 </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-6 col-xs-12">
  <div class="x_panel">
                  <div class="x_title">
                    <h2>Program <small>Baru</small></h2>
                  
                         
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start form for validation -->
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
			<div hidden="">
                      
                      <label for="email">Tajuk Program :</label>
                      <input type="text" id="tajuk" class="form-control" name="tajuk" data-parsley-trigger="change"  />
                      
                      <label for="fullname">Nama Penceramah(jika ada) :</label>
                      <input type="text" id="fullname" class="form-control" name="penceramah" />

					  <label for="email">Lokasi :</label>
                      <input type="text" id="lokasi" class="form-control" name="lokasi" data-parsley-trigger="change"  />
                     

                     Tarikh Program 
                    <div class="form-group">
                        <div class='input-group date' id='myDatepicker'>
                            <input  type='text' name=tarikhceramah class="form-control" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                        
                        
                        Masa Program
                    <div class="form-group">
                        <div class='input-group date' id='myTimepicker'>
                            <input type='text' name=masaceramah class="form-control" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

<!--
					<div class="checkbox">
                            <label>
                              <input name=textstatus hidden type="checkbox" class="flat" > Sembunyi Teks
                            </label>
                          </div>
-->
			</div>

                          <div id="fine-uploader-gallery"><label>Poster Program:</label>
			<input style="width:100%" type="file" name="files" ></div>

                          <br/>
						  <button type="submit" name=submit class="btn btn-success btn-lg">Submit</button>
                    </form>
                    <!-- end form for validations -->

                  </div>
                </div>


              </div>
</div></div></div>

                     <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            2017 ProTakwim <a href="www.takwim-solat.org">Takwim Solat</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    
    

    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper -->
    <script src="vendors/cropper/dist/cropper.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    
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
