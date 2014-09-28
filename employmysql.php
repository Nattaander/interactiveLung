<meta charset=utf-8>
<?php 
		//get form stuff and make into variables
	echo "got form ok";
	//q1
		if ($_POST['sex'] == '1'){
			$q1 = 1;
		}

		else if ($_POST['sex'] == '2'){
			$q1 = 2;
		}
		echo $q1;
	//q2
		if ($_POST['work'] == '1'){
			$q2 = 1;
		}
		else if ($_POST['work'] == '2'){
			$q2 = 2;
		}
		
	//q3

		if ($_POST['aware'] == '1'){
			$q3 = 1;
		}
		else if ($_POST['aware'] == '2'){
			$q3 = 2;
		}

	//q4

		if ($_POST['personCF'] == '1'){
			$q4 = 1;
		}
		else if ($_POST['personCF'] == '2'){
			$q4 = 2;
		}

	//q5

		if ($_POST['webapp'] == '1'){
			$q5 = 1;
		}
		else if ($_POST['webapp'] == '2'){
			$q5 = 2;
		}
		
	//q6

		$q6 = ($_POST['webappfeed']);
		
	//q7

		if ($_POST['cfawareimport'] == '1'){
			$q7 = 1;
		}
		else if ($_POST['cfawareimport'] == '2'){
			$q7 = 2;
		}

	//q8
		$q8 = ($_POST['why']);
		
		
	//q9
		if ($_POST['greataware'] == '1'){
			$q9 = 1;
		}
		else if ($_POST['greataware'] == '2'){
			$q9 = 2;
		}

	//q10

		$q10 = ($_POST['comments']);


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
   //else {
   //	echo "<br> selected db";
  //}


   //put into db
    $sqlAddToDB = "INSERT INTO cfemployed(q1, q2, q3, q4, q5, q6, q7, q8, q9, q10) VALUES ($q1, $q2, $q3, $q4, $q5, '$q6', $q7, '$q8', $q9, '$q10')";
	$insertQuery = mysqli_query($link, $sqlAddToDB);

	if(!$insertQuery){
		echo "failed to insert". mysql_error();
	}
	else {
		echo "inserted ok";
	}


mysqli_close($link); 

//echo file_get_contents("chart.html");
header("Location: employChart.php");
?> 
