<?php include ('../password_protect.php');
	

	require_once('../../config/config.php');

    include("resize-class.php");

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
			                     $iqomahperiod= $setting[0][iqomahperiod];
			                    $timebeforeazan= $setting[0][timebeforeazan];
			                     $scrollscpeed= $setting[0][scrollspeed];
// 			                    echo $pesanan;
			                    
	$query ="SELECT  * FROM solat_zone where code='$zone' ";
	
			                    $stmt2 = $DBH->prepare($query);
			                    $query = $stmt2->execute();
			                    $solatzone = $stmt2->fetchAll();		                    
			                    $negeri= $solatzone[0]['negeri'];
			                    $code= $solatzone[0]['code'];
			                    $kawasan= $solatzone[0]['kawasan'];
			                    
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
			  
			  
			  if (isset($_POST['simpan']))   {
				  
				  $query = "UPDATE setting_list SET zone='$zonex' WHERE 1";
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
	  
    <title>Tetapan | Zone </title>

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

  <?php include ('menu.php')?>
       

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tetapan Zon</h3>
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

             
                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Negeri</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select id=negeri name="negeri" class="form-control">
                            <option>Sila Pilih</option>
                            <?php foreach($allnegeri as $row){?>
                            <option value="<?php echo $row['negeri'];?>" <?php if ($row['negeri']==$negeri) echo "selected";?> ><?php echo $row['negeri'];?></option>
                            <?php }?>
                            
                            </select>
                        </div>
                      </div>
                      
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Kawasan</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select id=kawasan name=kawasan class="form-control">
                            <option>Sila Pilih</option>
                            <?php foreach($allkawasan as $row){?>
                            <option value="<?php echo $row['code'];?>" <?php if ($row['kawasan']==$kawasan) echo "selected";?> ><?php echo $row['kawasan'];?></option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                      
                      
                      
                      
                      

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
<!--                           <button type="button" class="btn btn-primary">Cancel</button> -->
                          <button style="width:100%" name=simpan type="submit" class="btn btn-success">Simpan</button>
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
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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
    <script src="../build/js/custom.js"></script>
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
