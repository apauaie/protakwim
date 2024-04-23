<?php 
  ini_set('upload_max_filesize', '50M');
   ini_set('post_max_size', '50M');
   ini_set('max_input_time', 300);
   ini_set('max_execution_time', 300);
   
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
                          $zone= $setting[0][zone];
                          $pesanan= $setting[0][pesanan];
                          $namamasjid= $setting[0][namamasjid];
                          $iqomahperiod= $setting[0][iqomahperiod];
                          $timebeforeazan= $setting[0][timebeforeazan];
                          $scrollspeed= $setting[0][scrollspeed];
                          $lokasigambarlatar= $setting[0][lokasigambarlatar];
                          $lokasigambarsolat= $setting[0][lokasigambarsolat];
                          $lokasigambarsolatjumaat= $setting[0][lokasigambarsolatjumaat];

                          


  if (isset($_POST['lalailatar'])){
    $file_name="gambarlatar-default.jpg";
    $ref="yes";
    $query = "UPDATE setting_list SET refresh='$ref',lokasigambarlatar='$file_name' WHERE 1";
    $statement = $DBH->prepare($query);
    $statement->execute();
    header("Refresh:0");

  }
  if (isset($_POST['lalaisolat'])){
    $file_name="solatnow-default.png";
    $ref="yes";
    $query = "UPDATE setting_list SET refresh='$ref',lokasigambarsolat='$file_name' WHERE 1";
    $statement = $DBH->prepare($query);
    $statement->execute();
    header("Refresh:0");

  }
  if (isset($_POST['lalaijumaat'])){
    $file_name="solatjumaat-default.png";
    $ref="yes";
    $query = "UPDATE setting_list SET refresh='$ref',lokasigambarsolatjumaat='$file_name' WHERE 1";
    $statement = $DBH->prepare($query);
    $statement->execute();
    header("Refresh:0");

  }
  
  if (isset($_POST['submit'])){
    

if(isset($_FILES['files'])){
      $errors= array();
      $file_name = $_FILES['files']['name'];
      $file_size =$_FILES['files']['size'];
      $file_tmp =$_FILES['files']['tmp_name'];
      $file_type=$_FILES['files']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['files']['name'])));
      
      $expensions= array("jpeg","jpg","png","gif");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG,GIF or PNG file.";
      }
      

      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
             // *** Include the class
    







      $ref="yes";
      $query = "UPDATE setting_list SET refresh='$ref',lokasigambarlatar='$file_name' WHERE 1";
      $statement = $DBH->prepare($query);
      $statement->execute();
         
      }else{
         echo "Error Upload";
      }
   }
   
   
   
   
   if(isset($_FILES['filesSolat'])){
      $errors= array();
      $file_name = $_FILES['filesSolat']['name'];
      $file_size =$_FILES['filesSolat']['size'];
      $file_tmp =$_FILES['filesSolat']['tmp_name'];
      $file_type=$_FILES['filesSolat']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['filesSolat']['name'])));
      
      $expensions= array("jpeg","jpg","png","gif");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG,GIF or PNG file.";
      }
      

      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
             // *** Include the class
    







      $ref="yes";
      $query = "UPDATE setting_list SET refresh='$ref',lokasigambarsolat='$file_name' WHERE 1";
      $statement = $DBH->prepare($query);
      $statement->execute();
         
      }else{
         echo "Error Upload";
      }
   }
   
   if(isset($_FILES['filesSolatJumaat'])){
      $errors= array();
      $file_name = $_FILES['filesSolatJumaat']['name'];
      $file_size =$_FILES['filesSolatJumaat']['size'];
      $file_tmp =$_FILES['filesSolatJumaat']['tmp_name'];
      $file_type=$_FILES['filesSolatJumaat']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['filesSolatJumaat']['name'])));
      
      $expensions= array("jpeg","jpg","png","gif");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG,GIF or PNG file.";
      }
      

      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
             // *** Include the class
    







      $ref="yes";
      $query = "UPDATE setting_list SET refresh='$ref',lokasigambarsolatjumaat='$file_name' WHERE 1";
      $statement = $DBH->prepare($query);
      $statement->execute();
         
      }else{
         echo "Error Upload";
      }
   }

//end file upload
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
    
    <title>Latar Belakang | </title>

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

   <?php include('menu.php');?>
   
   

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Latar Belakang</h3>
              
              </div>
                 </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-4 col-xs-12">
  <div class="x_panel">
                  <div class="x_title">
                    <h2>Gambar Latar</h2>
                  
                         
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start form for validation -->
    <form onsubmit="return confirm('Anda Pasti? Gambar sekarang akan digantikan dgn gambar lalai.');" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <button type="submit" name="lalailatar" class="btn btn-info btn-lg btn-block">Tukar Gambar Lalai</button>
      
                      <?php $urlback="uploads/".$lokasigambarlatar;?>
                   <img src="<?php echo $urlback;?>" alt="Gambar Latar" width="100%" height="200px" />

                          <div id="fine-uploader-gallery"><label>Pilih Gambar Latar:</label>
      <input style="width:100%" type="file" name="files" ></div>
    


                          <br/>
              <button type="submit" name=submit class="btn btn-success btn-lg btn-block">Muatnaik Gambar Latar</button>
                    </form>
                    <!-- end form for validations -->

                  </div>
                </div>


              </div>
              
              
               <div class="col-md-4 col-xs-12">
  <div class="x_panel">
                  <div class="x_title">
                    <h2>Gambar Semasa Solat</h2>
                  
                         
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start form for validation -->
    <form onsubmit="return confirm('Anda Pasti? Gambar sekarang akan digantikan dgn gambar lalai.');" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <button type="submit" name="lalaisolat" class="btn btn-info btn-lg btn-block">Tukar Gambar Lalai</button>
                       <?php $urlback="uploads/".$lokasigambarsolat;?>
                   <img src="<?php echo $urlback;?>" alt="Gambar Solat" width="100%" height="200px" />

                          <div id="fine-uploader-gallery"><label>Pilih Gambar Solat:</label>
      <input style="width:100%" type="file" name="filesSolat" ></div>


                          <br/>
              <button type="submit" name=submit class="btn btn-success btn-block btn-lg">Muatnaik Gambar Solat</button>
                    </form>
                    <!-- end form for validations -->

                  </div>
                </div>


              </div>
              
              <div class="col-md-4 col-xs-12">
  <div class="x_panel">
                  <div class="x_title">
                    
                    <h2>Gambar Solat Jumaat</h2>
                  
                         
                    </ul>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start form for validation -->
  <form onsubmit="return confirm('Anda Pasti? Gambar sekarang akan digantikan dgn gambar lalai.');" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
  <button type="submit" name="lalaijumaat" class="btn btn-info btn-lg btn-block">Tukar Gambar Lalai</button>
                       <?php $urlback="uploads/".$lokasigambarsolatjumaat;?>
                   <img src="<?php echo $urlback;?>" alt="Gambar Solat" width="100%" height="200px" />

                          <div id="fine-uploader-gallery"><label>Pilih Gambar Jumaat:</label>
      <input style="width:100% ;" type="file" name="filesSolatJumaat" ></div>


                          <br/>
              <button type="submit" name=submit class="btn btn-success btn-block btn-lg">Muatnaik Gambar Jumaat</button>
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
    <!-- <script src="../build/js/custom.js"></script> -->
    
    

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
    <script src="../build/js/custom.js"></script>
    
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
