<?php
	require_once 'api.php';
    echo '<script src="js/myjs.js"></script>';


    // Display date in H:M:S
    date_default_timezone_set('Asia/Kuala_Lumpur');

//     $displayTime =  date("g:i:s");
$displayTime =  date("g:i");
    //$displayDate = date('D,d F Y');
    $checkDate = date("g:i:s a");
        $refresh=  date('g:i:s a',strtotime("00:00:00"));

    echo $displayTime;
    switch($checkDate){
	    
	     case "$refresh":
	     	echo '<script>refresh()</script>';
            break;
        case "$dsubuh":
            echo '<script>showiqomah("subuh")</script>';
            break;
        case "$dzohor":
            echo '<script>showiqomah("zuhur")</script>';
            break;
        case "$dasar":
            echo '<script>showiqomah("asar")</script>';
            break;
        case "$dmaghrib":
            echo '<script>showiqomah("maghrib")</script>';
            break;
        case "$disyak":
            echo '<script>showiqomah("isyak")</script>';
            break;
            
            
       case "$bsubuh":
            echo '<script>timerazan("subuh")</script>';
            break;
        case "$bzohor":
            echo '<script>timerazan("zuhur")</script>';
            break;
        case "$basar":
            echo '<script>timerazan("asar")</script>';
            break;
        case "$bmaghrib":
            echo '<script>timerazan("maghrib")</script>';
            break;
        case "$bisyak":
            echo '<script>timerazan("isyak")</script>';
            break;
    }
?>
