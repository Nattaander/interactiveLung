<!Doctype html>
<html>
	<head>
		<meta charset=utf-8>
		<title>Employed Chart</title>
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

					$link = mysqli_connect('cs1.ucc.ie','tv3','oobeecha'); 
				if (mysqli_connect_errno()) { 
					die(' <br> Could not connect to MySQL: ' . mysqli_connect_error()); 
				} 
				//else { echo ' <br> Connection OK';
				//} 


				// Select Data Base
			   if(!mysqli_select_db($link, "mscim2014_tv3")){
			   	echo " <br> cant select db";
			   }
			  // else {
			  // 	echo "<br> selected db";
			  // }

// declare variables
		$q2c1 = 0;
		$q2c2 = 0;

		$q3c1 = 0;

		$q4c1 = 0;
		
		$q7c1 = 0;

		$rows = 0;

// now give the variables values from the table
		$result = mysqli_query($link,"SELECT * FROM cfemployed");
		while($row = mysqli_fetch_array($result)) {
			if ($row['q2'] == 1){
				$q2c1 = $q2c1 + 1;
			}
			else if ($row['q2'] == 2) { 
				$q2c2 = $q2c2 + 1;
			}


			if ($row['q3'] == 1){
				$q3c1 = $q3c1 + 1;
			}
			
			if ($row['q4'] == 1) { 
				$q4c1 = $q4c1 + 1;
			}

			if ($row['q7'] == 1) { 
				$q7c1 = $q7c1 + 1;
			}

			$rows = $rows + 1;
		}


		?>
	</head>
<!-- ............................................................................-->
	<body style=
"font: normal 16px/20px 'Helvetica Neue', Helvetica, sans-serif;
  min-width: 1500px;
  background-color: #27a7b5;">
		<h1>Results</h1>
		<h3> Students who answered the questionnaire </h3>
		<div id="canvas-holder" style="width: 20%">
			<canvas id="chart-area" width="500" height="500"/>
		</div>
		<div id="barchartDiv"style="width: 20%">
			<canvas id="canvas" height="450" width="600"></canvas>
		</div>


	<script>
//-----------------------------------------doughnut chart
		var doughnutData = [
				{
					value: <?php echo ($q2c1/$rows) * 100; ?>,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Works in medicine or science"
				},
				{
					value: <?php echo ($q2c2/$rows) * 100; ?>,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Does not work in medicine of science"
				},

			];


//-------------------------------------------------bar chart
	var number = <?php echo ($q3c1/$rows) * 100 ?>;
	var number2 = <?php echo ($q4c1/$rows) * 100 ?>;
	var number3 = <?php echo ($q7c1/$rows) * 100 ?>;

	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

	var barChartData = {
		labels : ["% heard of CF"," % yes to Q4", "% yes to Q7"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [number, number2, number3]
			},
			
		]

	}
	window.onload = function(){
		var ctx1 = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx1).Bar(barChartData, {
			responsive : true
		});

		var ctx = document.getElementById("chart-area").getContext("2d");
				window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
			

	}

	</script>
	<div id="btnDiv">
		<h3>Thank You!</h3>
		<button id="homeBtn" onclick="http://cs1.ucc.ie/~tv3/app/index.html'">Home</button>
	</div>

	</body>
	</html>
