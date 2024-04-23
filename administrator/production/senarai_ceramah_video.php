<?php 
	include ('../password_protect.php');
	

	require_once('../../config/config.php');

    include("resize-class.php");

 $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //require_once 'time.php';
	date_default_timezone_set('Asia/Kuala_Lumpur');

	unset($id);
    unset($penceramah);
    unset($tajuk);
    unset($lokasi);
	unset($tarikhceramah);
	unset($masaceramah);
	unset($modifiedby);
	unset($status);
	unset($remarks);
	
	
	$query2 ="SELECT  * FROM ceramah_list_video where status='active'";
	
			                    $stmt2 = $DBH->prepare($query2);
			                    $query2 = $stmt2->execute();
			                    $ceramah = $stmt2->fetchAll();

	


	
	
	
		$penceramah=$_POST['penceramah'];
    $tajuk=$_POST['tajuk'];
        $lokasi=$_POST['lokasi'];

	$tarikhceramah=$_POST['tarikhceramah'];
    $tarikhceramah=date('Y-m-d',strtotime($tarikhceramah));
    
	$masaceramah=$_POST['masaceramah'];
	$modifiedby="admin";
	$status="active";
	$remarks="";
	$idx= $_POST['id'];
	
	
	if (isset($_POST['save'])){
		
			
		          $query = "UPDATE ceramah_list SET penceramah='$penceramah', tajuk='$tajuk', lokasi='$lokasi', tarikh='$tarikh', masa='$masa', modifiedby='$modifiedby', status='$status', remarks='$remarks' WHERE id='$idx'";

$statement = $DBH->prepare($query);



$statement->execute();
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

    <title>Senarai Video | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Custom styling plus plugins -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <?php include ('menu.php');?>
  

  
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Senarai Video <small> Terkini</small> </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
	                  
                                      </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Video </h2>
                    
                                       <div class="clearfix">
	                                         <ul class="nav navbar-right panel_toolbox">
                      <li><form action=ceramah_baru_video.php><input type="submit" value="Video Baru" class="btn btn-warning"></input></form></i></a>
                      </li>
                                       </div>
                  </div>
                  <div class="x_content">
	                  

                    <div class="row">

                    <?php  $t=1;
	                    
	                    foreach($ceramah as $row){?>
                      <div class="col-md-55">
	                      
                        <div class="thumbnail">
	                        
                          
                          
                          
                          
                          <div class="image view view-first">
                            <video controls type="video/mp4"  style="width: 100%; display: block;" src="<?php 
	                            if (($row['poster'])!="") {$linkposter= "uploads/".$row['poster'];} else {$linkposter= "../../img/masjidbackground.png";} echo $linkposter;?>" alt="image" />
                            <div class="mask">
                              <p></p>
                              <div class="tools tools-bottom">
<!--                                 <a href="#"><i class="fa fa-pencil"></i></a> -->
                                <a href="#" id= "<?php echo $row['id'];?>" onclick="ceramahupdate(<?php echo $row['id'];?>);"><i class="fa fa-times"></i></a>
                                
                                <div class="pull-right">
                                        <span >
                                            <button data-toggle="modal" data-target="#myModal_<?php echo $t;?>" data-toggle="tooltip" title="Settings" data-placement="bottom" type="button" class="btn"><span class="glyphicon glyphicon-cog"></span></button>
                                        </span>
                                    </div>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <!-- <p><?php echo $row['tajuk'];?></p> -->
                            <!-- <p><?php echo $row['tarikh']." - ".$row['masa'];?></p> -->
                            <a class="btn btn-danger btn-block" href="#" id= "<?php echo $row['id'];?>" onclick="ceramahupdate(<?php echo $row['id'];?>);"><i class="fa fa-delete">Padam</i></a>
                          </div>
                        </div>
                      </div>
                      
                      
                      
                      
 <!-- Modal -->
    <div id="myModal_<?php echo $t;?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tetapan Program</h4>
                </div>
            <div class="modal-body">
                <form id="save_form" method="POST" action="modalsave.php">
	                <input hidden type=text value = '<?php echo $row['id'];?>' name=id>
                   <label for="email">Tajuk Program :</label>
                      <input type="text" id="tajuk" class="form-control" value='<?php echo $row['tajuk'];?>' name="tajuk" data-parsley-trigger="change" required />
                      
                      <label for="fullname">Nama Penceramah(jika ada) :</label>
                      <input type="text" id="fullname" class="form-control" value='<?php echo $row['penceramah'];?>' name="penceramah" />

					  <label for="email">Lokasi :</label>
                      <input type="text" id="lokasi" class="form-control" value='<?php echo $row['lokasi'];?>' name="lokasi" data-parsley-trigger="change" required />
                     

                     Tarikh Program 
                    <div class="form-group">
                        <div class='input-group date' id='myDatepicker'>
                            <input required type='text' name=tarikhceramah value='<?php echo $row['tarikh'];?>' class="form-control" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                        
                        
                        Masa Program
                    <div class="form-group">
                        <div class='input-group date' id='myTimepicker'>
                            <input type='text' name=masaceramah value='<?php echo $row['masa'];?>' class="form-control" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button id=save nama=save type="button" class="btn btn-default" 'data-dismiss'="modal">Simpan</button>
            </div>
            </div>
        </div>
    </div>
                </form>


                      <?php  $t++;
     }?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


					                           
                                    
                            
                                
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            ProTakwim <a href="">Takwim Solat 2017</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
      <script src="../../js/jquery-3.6.0.min.js"></script>
      
      <!--  load popper.js -->
      <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"
      ></script>
      
    <!-- Bootstrap -->
      
    <script src="../../js/bootstrap.min.js"></script>

    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.js"></script>
    
    <script type=text/javascript>
    
    
$(document).ready(function(){
	
	$("#save_form").on("submit", function(e) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function(data, textStatus, jqXHR) {

			location.reload();
            },
            error: function(jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });
    e.preventDefault(); //STOP default action
    e.unbind(); //unbind. to stop multiple form submit.
    });
	
	
$("button#save").click(function(){
        $("#save_form").submit();

        });
});

function ceramahupdate(id){
// 	alert(id);

        $.ajax({
            type:"POST",
            url:"delete_page_video.php",
            data:{ delete_id: id },
            success:function () {
                window.location.reload(true);
            }

        });
 
    
     }
	    </script>
  </body>
</html>
