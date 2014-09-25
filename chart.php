<!doctype html>
<html>
	<head>
		<meta charset=utf-8>
		<title>Doughnut Chart</title>
		<script src="chart/Chart.js"></script>
		<link rel="stylesheet" href="style/x3dStyle.css">
		<style>
			body{ 
				padding: 0;
				margin: 0;
			}
			#canvas-holder{
				width:30%;
			}
		</style>
<!-- ............................................................................-->
		<?php 

					$link = mysqli_connect('localhost','',''); 
				if (mysqli_connect_errno()) { 
					die(' <br> Could not connect to MySQL: ' . mysqli_connect_error()); 
				} 
				//else { echo ' <br> Connection OK';
				//} 


				// Select Data Base
			   if(!mysqli_select_db($link, "test")){
			   	echo " <br> cant select db";
			   }
			  // else {
			  // 	echo "<br> selected db";
			  // }

		$v1 = 0;
		$m1 = 0;
		$ui1 = 0;
		$c1 = 0;
		$i1 = 0;
		$rows = 0;

		$result = mysqli_query($link,"SELECT * FROM usability");
		while($row = mysqli_fetch_array($result)) {
		//echo $row['visual'] . " " . $row['model'] . " " . $row['interface'] . " " . $row['control'] . " " . $row['interact'];
		$v1 = $v1 + $row['visual'];
		$m1 = $m1 + $row['model'];
		$ui1 = $ui1 + $row['interface'];
		$c1 = $c1 + $row['control'];
		$i1 = $i1 + $row['interact'];
		$rows = $rows + 1;
		}


		?>
<!-- ............................................................................-->
	</head>
	<body>
		<h1>Results</h1>
		<div id="canvas-holder">
			<canvas id="chart-area" width="500" height="500"/>
		</div>


	<script>

		var doughnutData = [
				{
					value: <?php echo $v1/$rows; ?>,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Average for Visuals"
				},
				{
					value: <?php echo $m1/$rows; ?>,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Average for Models"
				},
				{
					value: <?php echo $ui1/$rows; ?>,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Average for User Interface"
				},
				{
					value: <?php echo $c1/$rows; ?>,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Average for Control"
				},
				{
					value: <?php echo $i1/$rows; ?>,
					color: "#4D5360",
					highlight: "#616774",
					label: "Average for Interactivity"
				}

			];

			window.onload = function(){
				var ctx = document.getElementById("chart-area").getContext("2d");
				window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
			};



	</script>
	<div id="btnDiv">
		<h3>Thank You!</h3>
		<button id="homeBtn" onclick="location.href='index.html'">Home</button>
	</div>

	</body>
	</html>
