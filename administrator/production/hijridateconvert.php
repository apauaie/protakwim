<?php 

 $timen=$_GET['tarikh'];
 $url="https://hijrah.mfrapps.com/api/hijrah-api.php?tarikh=".$timen;
 // echo $url;
 $content = file_get_contents($url, false, $context); 
 $xml=simplexml_load_string($content);
 
 $dayhijrah= $xml->hijrah->day;
 $monthhijrah= $xml->hijrah->month;
 $yearhijrah= $xml->hijrah->year;
 
 
 $todayhijrah= $dayhijrah." ".$monthhijrah." ".$yearhijrah;
 
 echo $todayhijrah;
 ?>