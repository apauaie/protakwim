
<?php include ('../password_protect.php');
	

	require_once('../../config/config.php');

    include("resize-class.php");

 $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //require_once 'time.php';
	date_default_timezone_set('Asia/Kuala_Lumpur');





			                    $nama= $_POST['nama'];
			                    $tarikh= $_POST['tarikh'];
                          $hijridate= $_POST['hijridate'];
			                    
			                    
			  if (isset($_POST['simpan']))   {
				  
				  $query = "INSERT INTO sambutan_hari  (nama, tarikh, hijridate,statusx) values ('$nama','$tarikh','$hijridate','active')";
			$statement = $DBH->prepare($query);
			$statement->execute();
      header("Location:tetapan_tarikh_penting.php");
				  

	  
				  
				  
			  }  
			  
			  
			  
			  
			  
			  
			  
			  
			  
             
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0">
	  
    <title>Tetapan | </title>

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
    <link href="../../plugin/jquery-ui-1.13.1/jquery-ui.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <?php include ('menu.php')?>
       

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tambah Tarikh Penting</h3>
              </div>

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

					

					   <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Keraian</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input id="nama" required="required" class="form-control" value="" name="nama"/>
                        </div>
                      </div>
                      
                      
                      
                      
                      
                      
                      <div class="form-group">

					   <label class="control-label col-md-3 col-sm-3 col-xs-3">Tarikh</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input onblur="findHijri();" id="datepicker" required="required" class="form-control"  name="tarikh"/>
                        </div>
                      </div>
                      
                      <div class="form-group">
                      
                       <label class="control-label col-md-3 col-sm-3 col-xs-3">Tarikh Hijrah</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="hijridate" required="required" class="form-control"  name="hijridate"/>
                                  </div>
                                </div>
                      
                      <!-- <p>Date: <input type="text" id="datepicker" size="30"></p> -->

                      
<!--
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
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
<!--                           <button type="button" class="btn btn-primary">Cancel</button> -->
                          <button name=simpan type="submit" class="btn btn-success">Simpan</button>
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
    <script src="../../plugin/jquery-ui-1.13.1/jquery-ui.min.js""></script>
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



$( function() {
        $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
  $( "#anim" ).on( "change", function() {
    $( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
  });
} );

function findHijri()
{
  // alert("Test");
  var tarikhs=document.getElementById('datepicker').value;
  $.ajax({
        url: 'hijridateconvert.php',
        type: 'GET',
        data: {tarikh: tarikhs},
         success: function(data){
        document.getElementById('hijridate').value=data;
    }
    
    
    
    })
  
}


	</script>
  </body>
</html>
