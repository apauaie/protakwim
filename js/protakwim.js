var workingfolder='../../administrator/production/';
var azanglobal = 0 ;
var iqomahglobal = 0 ;
  var timetime;
	var waktunow;

	function timerazan(waktuazan) {

	  waktunow = waktuazan;

	  // document.getElementById('islamdate').style.display = 'none';
	  // document.getElementById('normaldate').style.display = 'none';
	  // document.getElementById('kawasan').style.display = 'none';
	  document.getElementById('iqo').innerHTML = "Azan";
	  document.getElementById('iqo').style.display = 'block';
	  document.getElementById('azantime').style.display = 'block';
	  document.getElementById('iqomah').style.display = 'none';

	  $.ajax({
		url: workingfolder+"gettimerstatus.php?iqomah=0&azan=1",
		success: function(data) {
		var azanglobal = data;
		var t = new Date().getTime() + parseInt(azanglobal);
		$("#azantime")
		  .countdown(t, function(event) {
			$(this).text(
			  event.strftime('%M:%S')
			);
		  });
			  
			  
		}


	  });


	}





	function showiqomah(waktu) {

	  document.getElementById('iqo').innerHTML = "Iqomah";
	  document.getElementById('iqo').style.display = 'block';
	  // document.getElementById('kawasan').style.display = 'none';

	  document.getElementById('azantime').style.display = 'none';
	  document.getElementById('iqomah').style.display = 'block';
	  // 	var iqomah= <?echo $iqomahperiod;?>;

	  $.ajax({
		url: workingfolder+"gettimerstatus.php?iqomah=1&azan=0",
		success: function(data) {
		  var iqomahglobal = data;
		  var t = new Date().getTime() + parseInt(iqomahglobal);
			$("#iqomah")
			  .countdown(t, function(event) {
				$(this).text(
				  event.strftime('%M:%S')
				);
			  });
		}


	  });

	  //     alert(iqo);

	  
	  play();


	}

	$("#azantime")
	  .on('finish.countdown', function(event) {
		document.getElementById('azantime').style.display = 'none';
		// document.getElementById('kawasan').style.display = 'none';
		document.getElementById('iqo').style.display = 'block';
		document.getElementById('iqomah').style.display = 'block';
		var todayday = new Date();
		var fridayornot = todayday.getDay();
		if ((fridayornot == 5) && (waktunow == 'zuhur')) {
		  window.open(workingfolder+'solatjumaattime.php', '_SELF');
		}


	  });

	$("#iqomah")
	  .on('finish.countdown', function(event) {
		document.getElementById('iqomah').style.display = 'none';
		document.getElementById('azantime').style.display = 'none';
		// document.getElementById('kawasan').style.display = 'block';
		document.getElementById('iqo').style.display = 'none';
		// document.getElementById('islamdate').style.display = 'block';
		// document.getElementById('normaldate').style.display = 'block';
		window.open(workingfolder+'solattime.php', '_SELF');



	  });
	  
	$(document).ready(function() {
	  setInterval(function() {
		
		$.ajax({
		  url: workingfolder+"getstatus.php",
		  success: function(data) {
			if (data == "yes") {
			  $.get(workingfolder+"refreshstatusupdate.php");
			  window.location.reload();
			}
		  }
		});

		// $.ajax({
		//   url: "../../time.php",
		//   success: function(data) {
		// 	document.getElementById("time").innerHTML=data;
		//   }
		// });
		
		$('#time').load('../../time.php')
		// console.log("clocktime");

	  }, 1000);
	});