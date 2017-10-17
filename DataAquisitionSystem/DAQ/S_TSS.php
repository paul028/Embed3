    <script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/morris-0.4.1.min.js"></script>
	<script type="text/javascript" src="js/raphael-min.js"></script>

	<center>

	<div class="card">
		<div class="card-header" data-background-color="green">
			<h2 class="title">Turbidity</h2>
		</div>
		<div class="card-content">
			<div class="title" id="Chart"> </div>
		</div>
		<div class="card-footer">
			<div class="stats">
				<h4><p class="material-icons">info</p>  Status: <i id="status">Running</i></h4>
			</div>
		</div>
	</div>

	</center>
	<script type="text/javascript">
		function drawChart() {
		var jsonData = '';
		function refreshData ()
		{
			$.ajax({
			url: "php/fetchTSS.php",
			dataType:"json",
			async: true,
			success:function(data)
			{
				chart.setData(data);
			}

			})
		}

		var chart = Morris.Line({
		element: 'Chart',
		data : jsonData,
		xkey: 'x',
		ykeys: 'y',
        lineColors: ['#ffbf00'],
		labels: ['TSS Level']
		});

		refreshData();

		var timer = setInterval(refreshData, 1000);

		$("#Chart").click(function()
		{

			if (document.getElementById('status').textContent == "Running")
			{
				clearInterval(timer);
				document.getElementById('status').textContent = "Paused";
			}
			else
			{
				timer = setInterval(refreshData, 1000);
				document.getElementById('status').textContent = "Running";
			}
		});

		}

		$(document).ready(function(){
		drawChart();
		});
	</script>

<?php require('include/footer.php');?>
