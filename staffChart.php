<!doctype html>
<html>
	<head>
		<meta charset=utf-8>
		<title>Student Chart</title>
		<script src="chart/Chart.js"></script>
<!-- ...............................start of PHP.............................................-->
		<?php

			$link = mysqli_connect('localhost','',''); 
		if (mysqli_connect_errno()) { 
			die(' <br> Could not connect to MySQL: ' . mysqli_connect_error()); 
		} 


		// Select Data Base
	   if(!mysqli_select_db($link, "test")){
	   	echo " <br> cant select db";
	   }
			// declare student variables

					$rowStudent = 0;
					$maleStudent = 0;
					$femaleStudent = 0;
					$cfAwareStudent = 0;
					$notCFAwareStudent = 0;
					$importCFStudent = 0;
					$notimportCFStudent = 0;

			// declare employ variables
					$rowEmploy = 0;
					$maleEmploy = 0;
					$femaleEmploy = 0;
					$cfAwareEmploy = 0;
					$notCFAwareEmploy = 0;
					$importCFEmploy = 0;
					$notimportCFEmploy = 0;

			// declare unemploy variables
					$rowUnemploy = 0;
					$maleUnemploy = 0;
					$femaleUnemploy = 0;
					$cfAwareUnemploy = 0;
					$notCFAwareUnemploy = 0;
					$importCFUnemploy = 0;
					$notimportCFUnemploy = 0;

			// get variables from student table
					$resultStudent = mysqli_query($link,"SELECT * FROM cfstudent");
					while($rowStudent1 = mysqli_fetch_array($resultStudent)) {

						$rowStudent = $rowStudent + 1;

							if ($rowStudent1['q1'] == 1){
								$maleStudent = $maleStudent + 1;
							}
							else if ($rowStudent1['q1'] == 2) { 
								$femaleStudent = $femaleStudent + 1;
							}

							if ($rowStudent1['q4'] == 1){
								$cfAwareEmploy = $cfAwareEmploy + 1;
							}
							else if ($rowStudent1['q4'] == 2) { 
								$notCFAwareStudent = $notCFAwareStudent + 1;
							}
							if ($rowStudent1['q8'] == 1){
								$importCFStudent = $importCFStudent + 1;
							}
							else if ($rowStudent1['q8'] == 2) { 
								$notimportCFStudent = $notimportCFStudent + 1;
							}
						}
			// get variables from employ table
					$resultEmploy = mysqli_query($link,"SELECT * FROM cfemployed");
					while($rowEmploy1 = mysqli_fetch_array($resultEmploy)) {

						$rowEmploy = $rowEmploy + 1;

							if ($rowEmploy1['q1'] == 1){
								$maleEmploy = $maleEmploy + 1;
							}
							else if ($rowEmploy1['q1'] == 2) { 
								$femaleEmploy = $femaleEmploy + 1;
							}
							if ($rowEmploy1['q3'] == 1){
								$cfAwareUnemploy = $cfAwareUnemploy + 1;
							}
							else if ($rowEmploy1['q3'] == 2) { 
								$notCFAwareEmploy = $notCFAwareEmploy + 1;
							}
							if ($rowEmploy1['q7'] == 1){
								$importCFEmploy = $importCFEmploy + 1;
							}
							else if ($rowEmploy1['q7'] == 2) { 
								$notimportCFEmploy = $importCFEmploy + 1;
							}
						}
			// get variables from unemploy table
					$resultUnemploy = mysqli_query($link,"SELECT * FROM cfunemployed");
					while($rowUnemploy1 = mysqli_fetch_array($resultUnemploy)) {
						$rowUnemploy = $rowUnemploy + 1;

							if ($rowUnemploy1['q1'] == 1){
								$maleUnemploy = $maleUnemploy + 1;
							}
							else if ($rowUnemploy1['q1'] == 2) { 
								$femaleUnemploy = $femaleUnemploy + 1;
							}
							if ($rowUnemploy1['q4'] == 1){
								$maleUnemploy = $maleUnemploy + 1;
							}
							else if ($rowUnemploy1['q4'] == 2) { 
								$notCFAwareUnemploy = $notCFAwareUnemploy + 1;
							}
							if ($rowUnemploy1['q8'] == 1){
								$importCFUnemploy = $importCFUnemploy + 1;
							}
							else if ($rowUnemploy1['q8'] == 2) { 
								$notimportCFUnemploy = $importCFUnemploy + 1;
							}
						}

						$total = $rowStudent + $rowEmploy + $rowUnemploy;
						$totalFem = $femaleStudent + $femaleEmploy + $femaleUnemploy;
						$totalMal = $maleStudent + $maleEmploy + $maleUnemploy;
		mysqli_close($link); 
				?>
	</head>
<!-- ............................end of PHP................................................-->
	<body style=
"font: normal 16px/20px 'Helvetica Neue', Helvetica, sans-serif;
  min-width: 1500px;
  background-color: #27a7b5;">

		<div id="canvas-holder" style="width: 20%">
			<h5><?php echo $total; ?> people completed the questionnaire <br>
				Below is the a chart showing how many users there were in each questionnaire</h5>
			<canvas id="chart-area" width="500" height="500"/>
		</div>


		<div id="barchartDiv"style="width: 20%">
			<h5><?php echo $totalFem; ?> Females completed the questionnaire. <br>
			<?php echo $totalMal; ?> Males completed the questionnaire.<br>
			Below is a chart showing the percentage of Male is to Female users</h5>
			<canvas id="canvas" height="450" width="600"></canvas>
		</div>


		<div id="barchartDiv2"style="width: 20%">
			<h5>People who were unaware of CF prior to the application <br>
				Below represents the number of people who were aware of CF vs the users who were not</h5>
			<canvas id="canvas2" height="450" width="600"></canvas>
		</div>


		<div id="barchartDiv3"style="width: 20%">
			<h5>People who think CF awareness is important <br>
				Below is the number of people who thought it was important vs that it wasn't</h5>
			<canvas id="canvas3" height="450" width="600"></canvas>
		</div>


	<script>
//-----------------------------------------doughnut chart
		var doughnutData = [
				{
					value: <?php echo $rowStudent; ?>,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Number of students"
				},
				{
					value: <?php echo $rowEmploy; ?>,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Number of Employed Persons"
				},
				{
					value: <?php echo $rowUnemploy; ?>,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Number of Unemployed Persons"
				},

			];


//-------------------------------------------------bar chart sex

	var studMale = <?php echo ($maleStudent/$total) * 100; ?>;
	var studFemale = <?php echo ($femaleStudent/$total) * 100; ?>;
	var emplMale = <?php echo ($maleEmploy/$total) * 100; ?>;
	var emplFemale = <?php echo ($femaleEmploy/$total) * 100; ?>;
	var unemplyMale = <?php echo ($maleUnemploy/$total) * 100; ?>;
	var unemplyFemale = <?php echo ($femaleUnemploy/$total) * 100; ?>;

	var barChartData = {
		labels : ["students","employed","unemployed"],
		datasets : [
			{
				fillColor : "rgba(120,120,120,0.5)",
				strokeColor : "rgba(120,120,120,0.8)",
				highlightFill: "rgba(120,120,120,0.75)",
				highlightStroke: "rgba(120,120,120,1)",
				data : [studMale, emplMale, unemplyMale]
			},
			{
				fillColor : "rgba(251,287,105,0.5)",
				strokeColor : "rgba(251,287,105,0.8)",
				highlightFill : "rgba(251,287,105,0.75)",
				highlightStroke : "rgba(251,287,105,1)",
				data : [studFemale, emplFemale, unemplyFemale]
			}
			
		]

	}

//-------------------------------------------------bar chart knows about CF

	var studAware = <?php echo $cfAwareStudent; ?>;
	var studNotAware = <?php echo $notCFAwareStudent; ?>;
	var emplAware = <?php echo $cfAwareEmploy; ?>;
	var emplNotAware = <?php echo $notCFAwareEmploy; ?>;
	var unemplyAware = <?php echo $cfAwareUnemploy; ?>;
	var unemplyNotAware = <?php echo $notCFAwareUnemploy; ?>;

	var barChartData2 = {
		labels : ["students","employed","unemployed"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [studAware, emplAware, unemplyAware]
			},
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : [studNotAware, emplNotAware, unemplyNotAware]
			}
			
		]

	}

//-------------------------------------------------bar chart CF awareness

	var studCFimport = <?php echo $importCFStudent; ?>;
	var studCFnotImport = <?php echo $notimportCFStudent; ?>;
	var emplCFimport = <?php echo $importCFEmploy; ?>;
	var emplCFnotImport = <?php echo $notimportCFEmploy; ?>;
	var unemplyCFimport= <?php echo $importCFUnemploy; ?>;
	var unemplyCFnotImport = <?php echo $notimportCFUnemploy; ?>;

	var barChartData3 = {
		labels : ["students","employed","unemployed"],
		datasets : [
			{
				fillColor : "rgba(20,20,20,0.5)",
				strokeColor : "rgba(20,20,20,0.8)",
				highlightFill: "rgba(20,20,20,0.75)",
				highlightStroke: "rgba(20,20,20,1)",
				data : [studCFimport, emplCFimport, unemplyCFimport]
			},
			{
				fillColor : "rgba(51,87,15,0.5)",
				strokeColor : "rgba(51,87,15,0.8)",
				highlightFill : "rgba(51,87,15,0.75)",
				highlightStroke : "rgba(51,87,15,1)",
				data : [studCFnotImport, emplCFnotImport, unemplyCFnotImport]
			}
			
		]

	}

//-------------------------------------------------OnLoad function
	window.onload = function(){

		//doughnut
		var ctx = document.getElementById("chart-area").getContext("2d");
		window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});

		//bar chart sex
		var ctx1 = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx1).Bar(barChartData, {
			responsive : true
		});

		//bar chart knew about CF
		var ctx2 = document.getElementById("canvas2").getContext("2d");
		window.myBar = new Chart(ctx2).Bar(barChartData2, {
			responsive : true
		});

		//bar chart cf awareness
		var ctx3 = document.getElementById("canvas3").getContext("2d");
		window.myBar = new Chart(ctx3).Bar(barChartData3, {
			responsive : true
		});		

	}

	</script>	
	<div id="btnDiv">
		<button id="homeBtn" onclick="location.href='index.html'">Home</button>
	</div>

	</body>
	</html>
