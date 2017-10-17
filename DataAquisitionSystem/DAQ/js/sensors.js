
$(document).ready(function(){

	  function fetchTemperature()
      {
           $.ajax({
                url:"php/selectTemperature.php",
                method:"GET",
				cache: false,
				timeout:1000,
				success:function(data){
                     if(data >= 0 && data <= 44)
				{
					$("#temperatureDiv").removeClass("w3-black w3-red w3-green w3-orange w3-white w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large").addClass("w3-green w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large");
					$('#temperatureData').html(data+' Celsius');
					$('#temperatureFooter').html('Status: Normal');

				}
				else if(data >= 45 && data <= 70)
				{
					$("#temperatureDiv").removeClass("w3-black w3-red w3-green w3-orange w3-white w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large").addClass("w3-orange w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large");
					$('#temperatureData').html(data+' Celsius');
					$('#temperatureFooter').html('Status: Warning');
					var notif = new Audio('sounds/alert.wav');
					notif.play();

				}
				else if(data >= 71 && data <=200 )
				{

					$("#temperatureDiv").removeClass("w3-black w3-red w3-green w3-orange w3-white w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large").addClass("w3-red w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large");
					$('#temperatureData').html(data+' Celsius');
					$('#temperatureFooter').html('Status: Critical');
					var notif = new Audio('sounds/beep.wav');
					notif.play();
				}
				else
				{
					$("#temperatureDiv").removeClass("w3-black w3-red w3-green w3-orange w3-white w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large").addClass("w3-white w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large");
					$('#temperatureData').html('Warning, data out of range.');
					var notif = new Audio('sounds/beep.wav');
					notif.play();
				}
                }
           });
      }
	  function fetchPH()
      {
           $.ajax({
                url:"php/selectPH.php",
                method:"GET",
				cache: false,
				timeout:1000,
				success:function(data){
				if(data >= 0 && data <= 14)
				{
					document.getElementById("phDiv").style.background= "linear-gradient(60deg, #66bb6a, #43a047)";
					$('#phData').html(data+' <small>pH</small>');
					$('#phFooter').html('Status: Normal');

				}
				else if(data >= 6.1 && data <= 8)
				{
					document.getElementById("phDiv").style.background = "linear-gradient(60deg, #ffa726, #fb8c00)";
					$('#phData').html(data+' <small>pH</small>');
					$('#phFooter').html('Status: Warning');

					var notif = new Audio('sounds/alert.wav');
					notif.play();

				}
				else if(data >= 8.1 && data <=14 )
				{
					document.getElementById("phDiv").style.background = "linear-gradient(60deg, #ef5350, #e53935)";
					$('#phData').html(data+' <small>pH</small>');
					var notif = new Audio('sounds/beep.wav');
					$('#phFooter').html('Status: Critical');
					notif.play();
				}
				else
				{
					$("#phDiv").removeClass("w3-black w3-red w3-green w3-orange w3-white w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large").addClass("w3-white w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large");
					$('#phData').html('Warning, data out of range.');
					var notif = new Audio('sounds/beep.wav');
					notif.play();
				}
				}
           });

      }
	  function fetchTSS()
      {
           $.ajax({
                url:"php/selectTSS.php",
                method:"GET",
				cache: false,
				timeout:1000,
				success:function(data){
					if(data >= 0 && data <= 200)
					{
						$("#tssDiv").removeClass("w3-black w3-red w3-green w3-orange w3-white w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large").addClass("w3-green w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large");
						$('#tssData').html(data+' <small>mg/L</small>');
						$('#tssFooter').html('Status: Normal');

					}
					else if(data >= 201 && data <= 500)
					{
						$("#tssDiv").removeClass("w3-black w3-red w3-green w3-orange w3-white w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large").addClass("w3-orange w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large");
						$('#tssData').html(data+' <small>mg/L</small>');
						$('#tssFooter').html('Status: Warning');
						var notif = new Audio('sounds/alert.wav');
						notif.play();

					}
					else if(data >= 501 && data <= 1000 )
					{

						$("#tssDiv").removeClass("w3-black w3-red w3-green w3-orange w3-white w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large").addClass("w3-red w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large");
						$('#tssData').html(data+' <small>mg/L</small>');
						var notif = new Audio('sounds/beep.wav');
						$('#tssFooter').html('Status: Critical');
						notif.play();
					}
					else
					{
						$("#tssDiv").removeClass("w3-black w3-red w3-green w3-orange w3-white w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large").addClass("w3-white w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large");
						$('#tssData').html('Warning, data out of range.');
						var notif = new Audio('sounds/beep.wav');
						notif.play();
					}
                }
           });
      }

	  fetchPH();
	  fetchTSS();
	  fetchTemperature();

	  setInterval(function(){
			fetchPH();
			fetchTSS();
			fetchTemperature();
		}, 1000);
 });
