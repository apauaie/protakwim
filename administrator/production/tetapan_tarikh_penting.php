
<?php include ('../password_protect.php');
	

	require_once('../../config/config.php');

    include("resize-class.php");

 $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //require_once 'time.php';
	date_default_timezone_set('Asia/Kuala_Lumpur');





			                    $pesanan= $_POST['pesanan'];
			                    $namamasjid= $_POST['namamasjid'];
			                    $iqomahperiod= $_POST['iqomahperiod']*1000*60;
			                    $timebeforeazan= $_POST['timebeforeazan']*1000*60;
			                    $solatperiod= $_POST['solatperiod']*1000*60;
			                    $scrollspeed= $_POST['scrollspeed'];
			                    
			                    
			  if (isset($_POST['simpan']))   {
				  
				  $query = "UPDATE setting_list SET namamasjid='$namamasjid',pesanan='$pesanan',iqomahperiod='$iqomahperiod',timebeforeazan='$timebeforeazan',solatperiod='$solatperiod', scrollspeed=$scrollspeed WHERE id='1'";
			$statement = $DBH->prepare($query);
			$statement->execute();
				  

	  
				  
				  
			  }  

          $query2 ="SELECT * FROM sambutan_hari where statusx='active' order by tarikh ASC";
                                  $stmt2 = $DBH->prepare($query2);
                                  $query2 = $stmt2->execute();
                                  $result = $stmt2->fetchAll();
                           
                                  
			  
			  
			  
			  
			  
			  
             
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

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <?php include ('menu.php')?>
       

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tetapan Tarikh Penting</h3>
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
                 
                    <form method="post" class="form-horizontal form-label-left">
                    <div class="title_right">
                        <div  class="col-md-4 col-sm-4 col-xs-12 col-md-offset-8 col-sm-offset-8 form-group pull-right top_search">
                            <a href="add_tarikh_penting.php" type="button" class="btn btn-round btn-info">Tambah Tarikh Penting</a>
                        </div>
                        </div>
                    </div>
  
                      
                      
                      <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Tarikh</th>
                            <th>Tarikh Hijrah</th>
                            <th>Status</th>
                            <th>Tindakan</th>
                          </tr>
                        </thead>
                      
                      
                        <tbody>
                          <?php foreach ($result as $key){?>
                          <tr>
                            <td><?php echo $key['nama'];?></td>
                            <td><?php echo $key['tarikh'];?></td>
                            <td><?php echo $key['hijridate'];?></td>
                            <td><?php echo $key['statusx'];?></td>
                            <td align="center">
                           
                               
                                <a href="delete_sambutan.php?del_id=<?php echo $key['id']; ?>" onClick="return confirm('Anda pasti untuk padam ?')" type="button" class="btn btn-danger btn-sm">Padam</a>
                         
                            </td>
                          </tr>
                          <?php }?>
                          
                        </tbody>
                      </table>

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
    <script src="../vendors/fastclick/lib/fastclick.js"></script>

    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    
    
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
