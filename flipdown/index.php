<!DOCTYPE html>

<?php 
  require_once("../config/config.php");



 $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




 $timenow=date("Y-m-d");
  $query2 ="SELECT * FROM sambutan_hari where tarikh > CURDATE()  AND statusx='active' order by tarikh ASC limit 1";
  // echo $query2;
                          $stmt2 = $DBH->prepare($query2);
                          $query2 = $stmt2->execute();
                          $result2 = $stmt2->fetchAll();
                   
                             $nama=$result2[0]['nama'];
                               $tarikh= $result2[0]['tarikh'];
                               $todayhijrah= $result2[0]['hijridate'];
                               $status=$result2[0]['statusx'];
                               
 $tarikhformat=date('d M Y', strtotime($tarikh));   
 $timen=date("Ymd", strtotime($tarikh)); 
 
                           
if (empty($nama)){
  header("location:../fullcarousel.php");
}

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ProTakwim Tarikh Penting</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="css/flipdown/flipdown.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/flipdown/flipdown.js"></script>
    <link rel="stylesheet" href="../css/transition.css" />

    <!-- <script type="text/javascript" src="js/main.js"></script> -->
  </head>
  <body>
    <div class="example">
      <h1 style="font-size:120px"><?php echo $nama;?></h1>
      <div id="flipdown" class="flipdown"></div>
      <br>
      <h1><?php echo $tarikhformat;?></h1> 
      <h1><?php echo $todayhijrah;?></h1> 
    </div>
 
  <script>
  
  // $(window).load(function() {
      console.log( "ready!" );
      // Unix timestamp (in seconds) to count down to
      
      var tarikhtest = Math.floor(new Date('<?php echo $tarikh;?>').getTime() / 1000)
      
      // Set up FlipDown
      var flipdown = new FlipDown(tarikhtest)
      
        // Start the countdown
        .start()
      
        // Do something when the countdown ends
        .ifEnded(() => {
          console.log('The countdown has ended!');
        });
      
      // Toggle theme
      var interval = setTimeout(() => {
        let body = document.body;
        body.classList.toggle('light-theme');
        body.querySelector('#flipdown').classList.toggle('flipdown__theme-dark');
        body.querySelector('#flipdown').classList.toggle('flipdown__theme-light');
      }, 6000);
  // })

    setTimeout(function () {
    window.location.href = "../fullcarousel.php"; 
     }, 12000); //30 minutes = 1800000
    
  </script>
  </body>
</html>
